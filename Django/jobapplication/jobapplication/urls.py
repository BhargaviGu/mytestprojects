from django.contrib import admin
from django.urls import path
from django.conf.urls import url

from django.urls import path, include

#changehere
urlpatterns = [
    url(r'^admin/', admin.site.urls),   
	 url(r'^jobapplication_Start/', include('jobapplication_Start.urls')),
	 
	 #path(r'^jobapplication_Start/', jobapplication_Start.urls)
	 #url(r'^index/', TemplateView),
	  #(r'^index/', TemplateView.as_view(template_name="index.html")),
	  
]
 