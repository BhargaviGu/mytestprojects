!function(){var e="",h="MTD",a="",u=$(".modal-body .btn-primary").attr("data-value");function _(h,u,_,e,c){$.ajax({url:apiurl+"/quick/getMisData",type:"POST",data:{kpi_name:u,duration:h,compare_line:_,kpi_id:e},dataType:"json",success:function(e){if("success"==e.status){console.log(e),"N"==e.data.kpi_list_data.baw_flag?$(".button-demo").hide():$(".button-demo").show();var a=new Date,t=month_array[a.getMonth()],n="",o="",i="",s="",r="";if("otd_prediction"==u||"otd"==u?(s="Value",r="%"):s="stages_updated"==u?"No. of Stages":"No. of Line Items","MTD"==h)o=[t,String(a.getFullYear()).slice(2)].join("-"),n=e.data.kpi_list_data.kpi_original_name.toUpperCase()+" ("+o+")",i="Month's";else{var d="";Object.keys(qtd_array).forEach(function(e){-1<qtd_array[e].indexOf(t)&&(d=qtd_array[e][0]+"-"+qtd_array[e][2])}),qtd_date=d+", "+String(a.getFullYear()).slice(2),n=e.data.kpi_list_data.kpi_original_name.toUpperCase()+" ("+qtd_date+")",i="Quarter's"}var l=e.data.mis;if(0==l.best_mis.length&&0==l.last_mis.length&&0==l.user_mis.length){$(".noData").html('<div class="alert alert-info" style="margin: 70px 0;">No Data Found to Display</div>')}else $(".noData").html(""),function(e,a,t,n,o,i,s){var r,d,l=e.mis,h=[],u=[],_=[],c="",m=[];$("h4.kpi_name").text(a);for(var p=0;p<e.date_array.length;p++)h.push({label:("0"+new Date(e.date_array[p]).getDate()).slice(-2)});for(var p=0;p<l.user_mis.length;p++)""==c&&(c=l.user_mis[p].objective_type),"QUANTITY"==l.user_mis[p].objective_type?u.push({value:l.user_mis[p].qty_current_ach_no}):u.push({value:l.user_mis[p].seg_obj_achvd_value});if("Y"==e.kpi_list_data.baw_flag)for(var p=0;p<l.best_mis.length;p++)"QUANTITY"==l.best_mis[p].objective_type?m.push({value:l.best_mis[p].qty_current_ach_no}):m.push({value:l.best_mis[p].seg_obj_achvd_value});for(var p=0;p<l.last_mis.length;p++)"QUANTITY"==l.last_mis[p].objective_type?_.push({value:l.last_mis[p].qty_current_ach_no}):_.push({value:l.last_mis[p].seg_obj_achvd_value});e.date_array.length>l.user_mis.length&&(u.length=0,u=function(e,a,t){for(var n=[],o=0;o<e.length;o++){for(var i=e[o],s=[],r=0;r<a.length;r++){if(a[r].day==i){s.push(!0);break}s.push(!1)}-1<s.indexOf(!0)?"QUANTITY"==t?n.push({value:a[r].qty_current_ach_no}):n.push({value:a[r].seg_obj_achvd_value}):n.push({value:"0"})}return n}(e.date_array,l.user_mis,c));"Y"==e.kpi_list_data.baw_flag&&e.date_array.length>l.best_mis.length&&(m.length=0,m=function(e,a,t){for(var n=[],o=0;o<e.length;o++){for(var i=e[o],s=[],r=0;r<a.length;r++){if(a[r].day==i){s.push(!0);break}s.push(!1)}-1<s.indexOf(!0)?"QUANTITY"==t?n.push({value:a[r].qty_current_ach_no}):n.push({value:a[r].seg_obj_achvd_value}):n.push({value:"0"})}return n}(e.date_array,l.best_mis,c));e.last_month_date_array.length>l.last_mis.length&&(_.length=0,_=function(e,a,t){for(var n=[],o=0;o<e.length;o++){for(var i=e[o],s=[],r=0;r<a.length;r++){if(a[r].day==i){s.push(!0);break}s.push(!1)}-1<s.indexOf(!0)?"QUANTITY"==t?n.push({value:a[r].qty_current_ach_no}):n.push({value:a[r].seg_obj_achvd_value}):n.push({value:"0"})}return n}(e.last_month_date_array,l.last_mis,c));"Y"==e.kpi_list_data.baw_flag?(r=[{seriesname:"Current Performance",data:u},{seriesname:t+" Performance",data:m},{seriesname:"Last "+n+" Performance",data:_}],d="#0075c2,#1aaf5d,#f97d10"):(r=[{seriesname:"Current Performance",data:u},{seriesname:"Last "+n+" Performance",data:_}],d="#0075c2,#f97d10");new FusionCharts({type:"msline",renderAt:"msline",width:"100%",height:"400",dataFormat:"json",dataSource:{chart:{captionFontSize:"15",subcaptionFontBold:"0",paletteColors:d,bgcolor:"#ffffff",showBorder:"0",showShadow:"1",showCanvasBorder:"0",usePlotGradientColor:"0",legendBorderAlpha:"0",legendShadow:"0",showAxisLines:"0",showAlternateHGridColor:"0",divlineThickness:"1",divLineIsDashed:"1",divLineDashLen:"1",divLineGapLen:"1",xAxisName:"Days",showValues:"0",legendItemFontSize:"13",legendIconScale:"1",canvasborderthickness:"1",linethickness:"3",toolTipColor:"#ffffff",toolTipBorderThickness:"0",toolTipBgColor:"#000000",toolTipBgAlpha:"80",toolTipBorderRadius:"2",toolTipPadding:"5",plottooltext:"<div style='padding: 8px; font-size: 12px'><b>"+o+" : $value "+i+"</b></div>",legendIconBorderThickness:"4",drawCustomLegendIcon:"1",legendIconAlpha:"100",legendIconStartAngle:"40",legendIconSides:"5",yAxisMaxValue:"100"},categories:[{category:h,stepSkipped:!1,appliedSmartLabel:!0}],dataset:r},events:{chartClick:function(e,a){1!=window.legendClick?(window.legendClick=!1,window.location.href=s):window.legendClick=!1},legendItemClicked:function(e){window.legendClick=!0}}}).render();$(".modal-body .content-div").show(),setTimeout(function(e){$(".modal-body .loader").hide()},500)}(e.data,n,_,i,s,r,c)}}})}kpi_display_name="",window.legendClick=!1,month_array=["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"],qtd_array={q1:["JAN","FEB","MAR"],q2:["APR","MAY","JUN"],q3:["JUL","AUG","SEP"],q4:["OCT","NOV","DEC"]},$(".PAGE_DASHBOARD-overview").prev(".row").removeClass("clearfix"),$(document).on("click",".info-card",function(){var e,a=parseInt($(this).attr("data-active-for-mis")),t=$(this).attr("data-url"),n=$(this).attr("data-kpi-name"),o=($(this).find(".text").text(),$(this).attr("data-kpi-id")),i=$(this).attr("data-value"),s=$(this).attr("data-count"),r=$(this).attr("data-type"),d=$(this).attr("data-color");if(a)if($(".modal-body #msline").html(""),$(".modal-body .content-div").hide(),$(".modal-body .loader").show(),$("#misModal").modal({backdrop:"static",keyboard:!1}),$(".button-demo").find(".hidden_url").val(t),$(".button-demo").find(".hidden_kpi_id").val(o),""!=n&&""!=u&&""!=o?_(h,n,u,o,t):$(".modal-body .loader").hide(),$(".progress-main-div").css("background-color","DangerClass"==(e=d)?"#eca6b1":"ModerateClass"==e?"#f5d095":"#c6ea98"),"Range"===r)$(".progress-main-div").css("width",i+"%"),$(".modal-footer").find(".info").html(i+"%");else{var l=parseInt(i)/parseInt(s)*100;$(".progress-main-div").css("width",l+"%"),$(".modal-footer").find(".info").html(i),$(".modal-footer").find(".info").append('<span class="denom">/'+s+"</span>")}else window.location.href=t}),$(document).on("click",".button-demo .btn",function(){$(".button-demo").find(".btn-primary").addClass("btn-default"),$(".button-demo").find(".btn-primary").removeClass("btn-primary"),$(this).addClass("btn-primary"),$(this).removeClass("btn-default"),u=$(this).attr("data-value"),e=$(".button-demo").find(".hidden_url").val(),a=$(".button-demo").find(".hidden_kpi_id").val(),$("#msline").html(""),$(".modal-body .loader").show(),_(h,"",u,a,e)})}();