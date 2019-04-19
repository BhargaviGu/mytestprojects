;(function($) {

  $.ajax({
    type: "POST",
    url: url+"/quick/getindexdata",
    data: {},
    dataType: 'json',
    success: function(response){
      if(response.status==='success'){
        console.log(response);
        $('.program_name').html(response.client_data.program_name);

        for(var i=0;i<response.obj_data.length;i++){

          var escaped_text = escape(response.obj_data[i]['obj_text']);
          
          switch(response.obj_data[i]['objective_type']){
            case 'RANGE':
                  var tab = window.location.href.split('?tab=')[1];
                  var dynamic_id  = tab +'_trow'+i;

                  var rangewidget = document.querySelector('.range-objective').cloneNode(true);
                  rangewidget.classList.remove('range-objective');
                  rangewidget.classList.add(dynamic_id);

                  if (response.obj_data[i]['obj_text'] === response.supplier_dict['Commitment %']) {

                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                        $('#Process .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/commitment/normallt');");

                  }else if ( response.obj_data[i]['obj_text'].indexOf(response.buyer_dict['Commitment Pending (> 48 hours)']) > -1) {

                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                        $('#Process .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/commitment_pending"+"?tab=Process"+"');");

                  }else if ( response.obj_data[i]['obj_text'] === response.supplier_dict['Progress Update %'] && response.user_role != 'buyer') {

                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                        $('#Process .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/po/details?tab=Process"+"');");

                  }else if ( response.obj_data[i]['obj_text'] === response.buyer_dict['Progress Update %'] && response.user_role == 'buyer') {

                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                        $('#Process .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/progress_update"+"?tab=Process"+"');");


                  }else if (response.obj_data[i]['obj_text'] === response.buyer_dict['otd_prediction'] && response.user_role == "buyer") {

                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                        $('#Prediction .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/subobjectives/"+response.obj_data[i]['id']+"?tab=Prediction&kpi_name=otd_prediction');");

                  } else if (response.obj_data[i]['obj_text'] === response.supplier_dict['otd_prediction'] && response.user_role == "supplier") {
                      if ( tab === 'Home') {
                          $('#Home .objGraphDiv').append(rangewidget);
                      }else{
                           $('#Prediction .objGraphDiv').append(rangewidget);
                      }

			                $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/subobjectives/"+response.obj_data[i]['id']+"?tab=Prediction&kpi_name=otd_prediction');");

                  }else if (response.obj_data[i]['obj_text'] === response.buyer_dict['otd'] && response.user_role == "buyer") {

                      if ( tab === 'Home') {
                          $('#Home .objGraphDiv').append(rangewidget);  
                      }else{
                          $('#Performance .objGraphDiv').append(rangewidget);
                      }

                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/subobjectives/"+response.obj_data[i]['id']+"?tab=Performance&kpi_name=otd');");

                  }else {
                      if ( tab === 'Home') {
                        $('#Home .objGraphDiv').append(rangewidget);  
                      }else{
                        $('#Performance .objGraphDiv').append(rangewidget);
                      }
                      $('.'+dynamic_id).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/subobjectives/"+response.obj_data[i]['id']+"?tab=Performance&kpi_name=otd');");
                  }

                  $('.'+dynamic_id).children('.header').find('.name').html(response.obj_data[i]['obj_text']);
                  $('.'+dynamic_id).children('.content').children('.marginDiv').children('#chart-container3').attr('id', dynamic_id);
                  
                  if ( response.obj_data[i]['obj_text'] === response.buyer_dict['otd_prediction'] ) {
                      $('.'+dynamic_id).children('.content').children('.marginDiv').children('.achieved').html('Prediction: '+response.obj_data[i]['seg_obj_achvd_value']+'%');         
                  }else{
                      $('.'+dynamic_id).children('.content').children('.marginDiv').children('.achieved').html('Achieved: '+response.obj_data[i]['seg_obj_achvd_value']+'%');
                  }

                  if ( response.obj_data[i]['obj_text'].indexOf(response.buyer_dict['Commitment Pending (> 48 hours)']) > -1) {
                              
                      var achieved_value = parseInt(response.obj_data[i]['seg_obj_achvd_value']);
                      if ( achieved_value >= parseInt(response.obj_data[i]['seg_bad_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_bad_end_percentage'])) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#67bb6b'});

                      }else if ( achieved_value >= parseInt(response.obj_data[i]['seg_good_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_good_end_percentage']) ) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#ffb302'});

                      }else if ( achieved_value >= parseInt(response.obj_data[i]['seg_vgood_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_vgood_end_percentage']) ) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#de463e'});
                      }
                      drawRangeNewTypeObj(response.obj_data[i], dynamic_id);

                  } else {

                      var achieved_value = parseInt(response.obj_data[i]['seg_obj_achvd_value']);
                      if ( achieved_value >= parseInt(response.obj_data[i]['seg_bad_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_bad_end_percentage'])) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#de463e'});

                      }else if ( achieved_value >= parseInt(response.obj_data[i]['seg_good_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_good_end_percentage']) ) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#ffb302'});

                      }else if ( achieved_value >= parseInt(response.obj_data[i]['seg_vgood_start_percentage']) && achieved_value <= parseInt(response.obj_data[i]['seg_vgood_end_percentage']) ) {
                        $('.'+dynamic_id).children('.header').children('.legend').find('.icon').css({'background': '#67bb6b'});
                      }
                      drawRangeTypeObj(response.obj_data[i], dynamic_id);
                  }
                break;

            case 'QUANTITY':
                var tab = window.location.href.split('?tab=')[1];
                var qtywidget = document.querySelector('.qtynew-objective').cloneNode(true);
                qtywidget.classList.remove('qtynew-objective');
                qtywidget.classList.add('qtyobj'+i);
                var percentage = parseInt(response.obj_data[i]['qty_current_ach_no'])/parseInt(response.obj_data[i]['qty_highest_ach_no'])*100;
                var data = '';
                if (response.user_role == "buyer") {
                     if (response.obj_data[i]['obj_text'] === response.buyer_dict['delays'] ){

                          $('#Performance .objGraphDiv').append(qtywidget);
                          $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/subobjectives/"+response.obj_data[i]['id']+"?tab=Performance&kpi_name=delays"+"');");
                          data = JSON.parse(response.buyer_delay_data);

                      }else if ( response.obj_data[i]['obj_text'] === response.buyer_dict['schedule'] ) {

                          $('#Performance .objGraphDiv').append(qtywidget);
                          $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/subobjectives/"+response.obj_data[i]['id']+"?tab=Performance&kpi_name=schedule"+"');");

                          data = JSON.parse(response.buyer_schedule_data);

                      }else if ( response.obj_data[i]['obj_text'] === response.buyer_dict['Commitment Approval'] ){

                          $('#Process .objGraphDiv').append(qtywidget);
                          $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/commitment?tab=approval');");
                          data = JSON.parse(response.buyer_commitment_approval);

                      }else if (response.obj_data[i]['obj_text'] === response.buyer_dict['items_at_risk'] ) {

                          $('#Prediction .objGraphDiv').append(qtywidget);
                          $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/subobjectives/"+response.obj_data[i]['id']+"?tab=Prediction&kpi_name=items_at_risk');");
                          data = JSON.parse(response.items_at_risk);
                          $color = response.items_at_risk_color;
                          $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': $color});

                      }else if (response.obj_data[i]['obj_text'] === response.buyer_dict['Pending GRN'] ) {

                          $('#Process .objGraphDiv').append(qtywidget);
                          $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/buyer/pending_grn/"+response.obj_data[i]['id']+"?tab=Process"+"');");
                          data = JSON.parse(response.pending_grn);
                          $color = response.pending_grn_color;
                          $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': $color});
                      }
                }else{

                    if(response.obj_data[i]['obj_text'] == response.supplier_dict['schedule'] ){        
                        $('#Performance .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/schedules/lineitems?tab=Performance"+"');");
                        data = JSON.parse(response.supplier_schedule_data);

                    }else if (response.obj_data[i]['obj_text'] === response.supplier_dict['item_to_start'] ) {
                        $('#Performance .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/itemstostart/lineitems?tab=Performance"+"');");
                        data = JSON.parse(response.supplier_item_to_start_data);

                    }else if ( response.obj_data[i]['obj_text'] === response.supplier_dict['delays'] ) {
                        $('#Performance .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/delay/poitems?tab=Performance"+"');");
                        data = JSON.parse(response.supplier_delays_data);

                    }else if ( response.obj_data[i]['obj_text'] === response.supplier_dict['items_at_risk'] ){
                        $('#Prediction .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/subobjectives/"+response.obj_data[i]['id']+"?tab=Prediction&kpi_name=items_at_risk');");
                        data = JSON.parse(response.items_at_risk);
                        $color = response.items_at_risk_color;
                        $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': $color});

                    }else if (response.obj_data[i]['obj_text'] === response.supplier_dict['Pending Payment']) {
                        $('#Process .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/sup/pending_payment/"+response.obj_data[i]['id']+"?tab=Process"+"');");
                    }
                    else if (response.obj_data[i]['obj_text'] === response.supplier_dict['Pending GRN'] ) {

                        $('#Process .objGraphDiv').append(qtywidget);
                        $('.qtyobj'+i).attr('onclick',"ga('send', 'event', 'Objectives', 'click','"+escaped_text+"'); window.location.assign('"+apiurl+"/sup/pending_grn/"+response.obj_data[i]['id']+"?tab=Process"+"');");
                        data = JSON.parse(response.pending_grn);
                        $color = response.pending_grn_color;
                        $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': $color});
                    }
                }

                if ( response.obj_data[i]['obj_text'] != response.supplier_dict['Pending GRN'] && response.obj_data[i]['obj_text'] != response.supplier_dict['Pending Payment'] && response.obj_data[i]['obj_text'] != response.supplier_dict['items_at_risk'] ) {

                      if (percentage > parseInt(data['max_value'])) {
                        $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': 'RED'});
                      } else if (percentage >= parseInt(data['min_value']) && percentage <= parseInt(data['max_value']) ){
                        $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': 'ORANGE'});
                      }else if (percentage < parseInt(data['min_value'])) {
                        $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').css({'background': 'GREEN'});
                      }
                }
                $('.qtyobj'+i).children('.contents').find('.name').children('.text').html(response.obj_data[i]['obj_text']);
                $('.qtyobj'+i).children('.contents').find('.points').children('.numberCircle').html(response.obj_data[i]['qty_current_ach_no']);
              break;
          }     
        }
      }
    }
   });

}(jQuery));
