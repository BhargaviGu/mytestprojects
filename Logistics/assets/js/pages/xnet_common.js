var month_array = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var $body = $('body');
var $overlay = $('.overlay');

function getDateFormat(date_string){

    var _date = new Date(date_string);
    var month = month_array[_date.getMonth()];
    var new_date = [_date.getDate(), month, _date.getFullYear()].join('-');

    return new_date;
}


function showDateValidation(msg){
    $('.cmtDateNotif').notify({
  
        type : "inverse",

        closable : true,

        fadeOut: { enabled: true, delay: 4000 },

        message: { html: "<span>"+msg+"</span>", 
                  text: false
                },
    }).show();
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 500) {
        $('.scroll-to-top-div .btn').show();
    }else{
        $('.scroll-to-top-div .btn').hide();  
    }
});

$('.scroll-to-top-div .btn').click(function () {
    
    $('body,html').animate({
        scrollTop: 0
    }, 800);

    return false;
});


function getTodayDate() {
        
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    } 
    if(mm<10) {
        mm = '0'+mm
    } 
    return today = yyyy + '-' + mm + '-' + dd;
}

var rcssescape = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g;
var fcssescape = function( ch, asCodePoint ) {
        if ( asCodePoint ) {

                // U+0000 NULL becomes U+FFFD REPLACEMENT CHARACTER
                if ( ch === "\0" ) {
                        return "\uFFFD";
                }

                // Control characters and (dependent upon position) numbers get escaped as code points
                return ch.slice( 0, -1 ) + "\\" + ch.charCodeAt( ch.length - 1 ).toString( 16 ) + " ";
        }

        // Other potentially-special ASCII characters get backslash-escaped
        return "\\" + ch;
    }

window.escapeSelector = function( sel ) {
        return (sel + "").replace( rcssescape, fcssescape );
    }; 


$(document).ready(function() {   

    /************************************
    |  Header Related JS Start          |
    ************************************/

    var item = $('.item'), //Cache your DOM selector
        visible = 3, //Set the number of items that will be visible
        index = 0, //Starting index
        item_width  = window.innerWidth/4;

    if ( window.innerWidth < 768) {
        var width = item_width*3;
    } else if (window.innerWidth > 768 && window.innerWidth < 1400 ) {
        var width = 195;
    } else {
        var width = 190*3;
    }

    if (window.innerWidth <= 768 && window.innerWidth > 320) {
        visible = 3;
        $('.item').css({'width': item_width+'px'});

        if (window.innerWidth >= 414 ) {
            $('.item img').css({'margin-left': '20px'});
        }
    }
    /*if (window.innerWidth > 768) {
        visible = 5;
    }*/

    var itemIndex = $('.active').parent('.item').index()/visible;

    if (itemIndex >= 1 && itemIndex < 2) {
        index = parseInt(itemIndex);
        item.animate({'left':'-='+width+'px'});
    } else if ( itemIndex >= 2 && itemIndex < 3) {
        index = parseInt(itemIndex);
        item.animate({'left':'-='+width*2+'px'});
    } else if ( itemIndex >= 3 && itemIndex < 4) {
        index = parseInt(itemIndex);
        item.animate({'left':'-='+width*3+'px'});        
    } else {
        item.animate({'left':'-='+0+'px'});
    }
    

    var endIndex = ( item.length / visible ) - 1; //End index
    
    $('button#arrowR').click(function(){
        if(index < endIndex ){
          index++;
          item.animate({'left':'-='+width+'px'});
        }
    });
    
    $('button#arrowL').click(function(){
        if(index > 0){
          index--;            
          item.animate({'left':'+='+width+'px'});
        }
    });
});


function hideRightSidebar() {
    $('.right-sidebar').css({'margin-left': '-320px'});
    $('.right-sidebar').removeClass('open');
    $('.right-sidebar').addClass('closed');
    $('.overlay').hide();
}


function showRightSidebar() {
    $('.right-sidebar').css({'margin-left': '0px'});
    $('.right-sidebar').removeClass('closed');
    $('.right-sidebar').addClass('open');
    $('.overlay').show();
}


$(document).on('click', '.PAGE_FILTER img', function () {
    if ($('.right-sidebar').hasClass('closed')) {
        showRightSidebar();
    }else{
        hideRightSidebar();
    }
});

$(document).on('click', '.overlay', function () {
    hideRightSidebar();
});

$(document).on('click', '#rightsidebar .card-header', function () {
    $(this).next('.collapse').toggle();
    var icon = $(this).find('i');
    if(icon.text() == 'keyboard_arrow_down'){
        icon.text('keyboard_arrow_right');
    }else{
        icon.text('keyboard_arrow_down');
    }
});

$(function() {
    var session_lifetime = lifetimeValue;
    // Set idle time
    $( document ).idleTimer( parseInt(session_lifetime)*60*1000 );
});

$(function() {
    $( document ).on( "idle.idleTimer", function(event, elem, obj){
        window.location.href = apiurl + "/vault/logout";
    });
});


$(document).on('click', '.notification', function() {

    ga('send', 'event', '.notifications', 'click');

    var check = $(this).attr('data-attr');
    var date = $(this).attr('date-info');
    var id = $(this).attr('data-id');

    $.ajax({
      url: apiurl+"/quick/getNotificationInfo",
      type: "POST",
      dataType: "json",
      data: {'check': check, 'date': date, 'id': id},

      success: function(response){
        if (response.status == "success") {
	  if( response.url != '#'){
	      document.location.href = apiurl+'/'+response.url;
	  } else {
	  	location.reload();
	  }
        }
      }
    });
});
