import scrapy
import MySQLdb
import re
import md5
import json
from datetime import datetime
import sys
reload(sys)  # Reload does the trick!
sys.setdefaultencoding('UTF8')

def get_cursor():
   conn  = MySQLdb.connect(db = 'qwe', host = 'localhost', user = 'qwe', passwd = '123', use_unicode = True, charset = 'utf8mb4')
   cursor = conn.cursor()
   return conn, cursor


class Flipkart(scrapy.Spider):
   name ="flipkart"
   start_urls = ['https://www.flipkart.com/men/shirts/pr?sid=2oq,s9b,mg4&otracker=nmenu_sub_Men_0_Shirts']
   def parse(self, response):
       #import pdb;pdb.set_trace()
       urls = response.xpath('//a[@class="_3dqZjq"]//@href').extract()
       for url in urls:
           url = "https://www.flipkart.com" + url
           #x = re.findall("levi-s", url)
           yield scrapy.Request(url, callback = self.parse_next)
       navs = response.xpath('//nav[@class="_1ypTlJ"]//a/@href').extract()
       for nav in navs:
           nav = "https://www.flipkart.com" + nav
           yield scrapy.Request(nav, callback = self.parse)


   def parse_next(self, response):
       product_id = ''.join(re.findall('pid=\w+',response.text)[0]).replace('pid=','')
       print product_id
       product_url = response.url
       print product_url
       brand_name = ' '.join(response.xpath('//span[@class="_2J4LW6"]//text()').extract()).strip()
       print brand_name
       product_name = ' '.join(response.xpath('//span[@class="_35KyD6"]//text()').extract()).replace('u','')
       print product_name
       price = ' '.join(response.xpath('//div[@class="_2i1QSc"]//text()').extract())
       print price
       rating = ' '.join(response.xpath('//div[@class="hGSR34 bqXGTW"]//text()').extract())
       print rating
       total_text =''.join(response.xpath('//span[@class="_38sUEc"]//text()').extract())
       ratings_count, reviews_count = re.findall('(\d+) .* and (\d+) *.', total_text)[0]
       print ratings_count
       print reviews_count
       """product_details = ', '.join(response.xpath('//div[@class="_29BZlt"]//text()').extract())
       print product_details
       review_text = ',\n '.join(response.xpath('//div[@class="qwjRop _2675cp"]//text()').extract()).replace('READ MORE','')

       print review_text
       review_id = md5.md5(review_text).hexdigest()
       print review_id"""

       product_details_nodes = response.xpath('//div[@class="_2GNeiG _2t27J6"]/div[@class="row"]')
       pd_dict = {}
       for pdn in product_details_nodes:
           pd_header = ''.join(pdn.xpath('./div[1]//text()').extract()).strip()
           pd_value = ''.join(pdn.xpath('./div[2]//text()').extract()).strip()
           if pd_header and pd_value:
               pd_dict.update({pd_header:pd_value})
       '''if x:
         levis_brand = ' '.join(response.xpath('//span[@class="_2J4LW6"]//text()').extract()).strip()
         print levis_brand'''
       conn,cursor = get_cursor()
       #import pdb;pdb.set_trace()
       meta = 'insert into flipkart_meta1(product_id, product_url, brand_name, product_name, price, rating, ratings_count, reviews_count, product_details, created_at, modified_at) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,now(),now()) on duplicate key update modified_at = now()'
       values = (product_id, product_url, brand_name, product_name, price, rating, ratings_count, reviews_count, MySQLdb.escape_string(json.dumps(pd_dict)))
       cursor.execute(meta, values)
       reviews = 'insert into flipkart_reviews1(product_id, product_url, review_text, review_id, created_at, modified_at) values(%s,%s,%s,%s,now(),now()) on duplicate key update modified_at = now()'
       review_nodes = response.xpath('//div[@class="qwjRop _2675cp"]')
       for eachnod in review_nodes:
           review_text = ''.join(eachnod.xpath('.//div//div[not(img)]//text()[not(@img)]').extract()).strip()
           review_id = md5.md5(review_text.encode('ascii', 'ignore')).hexdigest()
           cursor.execute(reviews, (product_id, product_url, review_text, review_id))
           conn.commit()
           conn.close()
