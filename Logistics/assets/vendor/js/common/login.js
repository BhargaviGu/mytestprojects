;(function($) {
  "use strict";
  
  var mobilenumber = $(".mobileNumber"),
      password = $(".password"),
      confirmpassword = $(".confirmpassword"),
      register = $(".register"),
      otppassword = $(".otppassword"),
      signin = $(".signin"),
      loginform = $(".loginForm"),
      errormsgdiv = $(".errormsg"),
      passworddiv = $(".passworddiv"),
      confirmpassworddiv= $(".confirmpassworddiv"),
      mobilenodiv = $(".mobilenodiv"),
      submitdiv = $(".submitdiv"),
      otpdiv = $(".otpdiv"),
      forgotpassworddiv = $(".forgotpassworddiv"),
      btnlogin = $(".btn-login"),
      forgotpassword = $(".forgotpassword"),
      bottomlogodiv = $(".bottom-logo"),
      usecase = "login",
      login = {},
      errormsgs = "",
      sessionerror = $("#sessionerror"),
      client_id = $("#client_id"),
      loader = $(".loader");
  
  //handling disabling the session of error
 /* setTimeout(function(){
    sessionerror.fadeOut("slow");
    sessionerror.empty();
    sessionerror.fadeIn("slow");
  }, 3000);*/

  //login validations checking
  login.checkMobileNoValidation=function(mobileNO){
      if(mobileNO.length===10){
          return true;
      }else{
          errormsgs+="*Enter a valid 10 digit mobile number without leading zeroes or country code";
          return false;
      }
  }

  login.checkPasswordValidation=function(pass){
      if(pass.length!==0){
          return true;
      }else{
          errormsgs.length!==0 ? errormsgs+="<br>*Password cannot be empty": errormsgs+="*Password cannot be empty";
          return false; 
      }
  }

  login.showPopupForLicenseAgrement = function(data){
      $('#license_aggrement_modal').find('.license_content').html(data);
      $('#license_aggrement_modal').modal({
         backdrop: 'static',
         keyboard: false 
      });
  }

  $(document).on('click', '.license_close_btn', function(){
      $('#license_aggrement_modal').modal('hide');
      window.location.reload(1);
  });

  $(document).on('click', '.license_accept_btn', function(){
      $('#license_aggrement_modal').modal('hide');
      $.ajax({
          type: "POST",
          url: url + "/quick/updateLicense_aggrement",
          data: {'mobileNumber': mobilenumber.val()},
          dataType: 'json',
          success: function(response) {
              if(response.status==="success"){
                  passworddiv.fadeIn("slow");
                  confirmpassworddiv.fadeIn("slow");
                  btnlogin.html('REGISTER');
              }else{
                  errormsgdiv.html('Something went wrong !');
                  window.location.reload(1);
              }
          }
      });
  });

  $(document).on('click', '.license_checkbox', function(){
      if ($(this).is(':checked')) {
          $('.license_accept_btn').removeAttr('disabled');
      }else{
          $('.license_accept_btn').attr('disabled', true);
      }
  });
  
  //Custom Mobile number Validation 
  $(".mobileNumber").on('keypress', function(e){
    var searchSpecial = '$Backspace$Del$Home$Tab$Left$Right$Up$Down$End$';
    if (searchSpecial.indexOf('$' + e.key + '$') < 0) {
      var theEvent = e.htmlEvent || window.event;
      var key = '';
      if (typeof theEvent == 'undefined') {
        key = e.charCode;
      }else{
        key = theEvent.keyCode || theEvent.which;  
      }
      var code = key;
      key = String.fromCharCode(key);
      var regex = /[0-9]/;
      if (!regex.test(key)) {
        if (typeof theEvent == 'undefined') {
            if (code != 118) {
              if(e.preventDefault)
                e.preventDefault();
            }
        }else{
          if (code != 17 || code != 91) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault)
              theEvent.preventDefault();
          }
        }
      }
    }
  });

  
  //handling click events for login,register,forgotpassword 
  register.on("click",function(){
    register.removeClass("inactive").addClass("active");
    signin.removeClass("active").addClass("inactive");
    passworddiv.fadeOut("slow");
    forgotpassworddiv.fadeOut("slow");
    btnlogin.html('CONTINUE');
    bottomlogodiv.css('padding-top','60px');
    usecase="register";
    errormsgdiv.empty();  
    submitdiv.css("padding-top","15px");
  });

  signin.on("click",function(){
    signin.removeClass("inactive").addClass("active");
    register.removeClass("active").addClass("inactive");
    passworddiv.fadeIn("slow");
    forgotpassworddiv.fadeIn("slow");
    btnlogin.html('LOGIN');
    bottomlogodiv.css('padding-top','0px');
    usecase="login";
    errormsgdiv.empty();
    submitdiv.css("padding-top","5px");
  });

  forgotpassword.on("click",function(){
    signin.addClass("inactive").removeClass("active");
    register.addClass("inactive").removeClass("active");
    forgotpassworddiv.fadeOut("slow");
    passworddiv.fadeOut("slow");
    btnlogin.html('CONTINUE');
    bottomlogodiv.css('padding-top','60px');
    usecase="forgotpassword";
    errormsgdiv.empty();
    submitdiv.css("padding-top","15px");
  });

  btnlogin.on("click",function(event){
    errormsgs="";
    switch(usecase){

      case "login": 
                    event.preventDefault();
                    if(login.checkMobileNoValidation(mobilenumber.val()) && 
                       login.checkPasswordValidation(password.val())
                      ){
                      loginform.submit();
                    }else{
                      errormsgdiv.html(errormsgs);
                    }
                    break;                    
      case "register":
                    event.preventDefault();
                    if(login.checkMobileNoValidation(mobilenumber.val())){
                      //make ajax call to to check for registration mobile No checking
                      if(btnlogin.html()==="CONTINUE"){
                        $.ajax({
                          type: "POST",
                          url: url + "/quick/checkMobileNoforRegistration",
                          data: $('#loginForm').serialize(),
                          dataType: 'json',
                          success: function(response) {
                            if(response.status==="success"){
                              mobilenodiv.fadeOut("slow");
                              otpdiv.fadeIn("slow");
                              btnlogin.html('CONFIRM OTP');
                              errormsgdiv.empty();
                            }else{
                              errormsgdiv.html('User Not Found or User Already Registered');
                            }
                          }
                        });
                        
                      }else if(btnlogin.html()==="CONFIRM OTP"){
                        $.ajax({
                          type: "POST",
                          url: url + "/quick/checkOTPforRegistration",
                          data: {
                            'mobileNumber': mobilenumber.val(),
                            'otppassword': otppassword.val(),
                            'client_id': client_id.val()
                          },
                          dataType: 'json',
                          success: function(response) {
                            if(response.status==="success"){
                              console.log(response);
                              otpdiv.fadeOut("slow");
                              errormsgdiv.empty();
                              login.showPopupForLicenseAgrement(response.data[0]['text']);
                              /*passworddiv.fadeIn("slow");
                              confirmpassworddiv.fadeIn("slow");
                              btnlogin.html('REGISTER');*/
                            
                            }else{
                              
                              errormsgdiv.html('Invalid OTP');
                              setTimeout(function() {
                                window.location.reload(1);
                              }, 1000);

                            }
                          }
                        });
                      }else if(btnlogin.html()==="REGISTER"){
                        $.ajax({
                          type: "POST",
                          url: url + "/quick/registeruser",
                          data: {
                            'mobileNumber': mobilenumber.val(),
                            'otppassword': otppassword.val(),
                            'client_id': client_id.val(),
                            'password': password.val(),
                            'confirmpassword': confirmpassword.val()
                          },
                          dataType: 'json',
                          success: function(response) {
                            if(response.status==="success"){
                              errormsgdiv.css('color', 'green');
                              errormsgdiv.html("Registered Successfully");

                            }else{
                              errormsgdiv.html("Tryagain Later");
                            }
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 1000);
                          }
                        });
                      }

                    }else{
                      errormsgdiv.html(errormsgs); 
                    }
                    break;
      case "forgotpassword":
                    event.preventDefault();
                    if(login.checkMobileNoValidation(mobilenumber.val())){
                      if(btnlogin.html()==="CONTINUE"){
                        $.ajax({
                          type: "POST",
                          url: url + "/quick/checkmobilenumbervalid",
                          data: {
                            'client_id': client_id.val(),
                            'mobileNumber': mobilenumber.val(),
                            'type': "checkValid"
                          },
                          dataType: 'json',
                          success: function(response) {
                            if(response.status==="success"){
                              mobilenodiv.fadeOut("slow");
                              otpdiv.fadeIn("slow");
                              btnlogin.html('CONFIRM OTP');
                              errormsgdiv.empty();
                            }else{
                              errormsgdiv.html('Invalid Mobile No or User does not Exist');
                            }
                          }
                        });
                      }else if(btnlogin.html()==="CONFIRM OTP"){
                        $.ajax({
                          type: "POST",
                          url: url + '/quick/otppasswordcheckforforgotpassword',
                          data: {
                            'client_id': $('#client_id').val(),
                            'mobileNumber': $('#mobileNumber').val(),
                            'otppassword': $('#otppassword').val()
                          },
                          dataType: 'json',
                          success: function(response) {
                            if(response.status === 'success') {
                              otpdiv.fadeOut("slow");
                              passworddiv.fadeIn("slow");
                              confirmpassworddiv.fadeIn("slow");
                              btnlogin.html('UPDATE PASSWORD');
                              errormsgdiv.empty();  
                            
                            }else{
                              errormsgdiv.html('Invalid OTP');
                              setTimeout(function() {
                                window.location.reload(1);
                              }, 1000);
                            } 
                          }
                        });
                      }else if(btnlogin.html()==="UPDATE PASSWORD"){
                        $.ajax({
                          type: "POST",
                          url: url + "/quick/UpdatePassword",
                          data: $('#loginForm').serialize(),
                          dataType: 'json',
                          success: function(response) {
                            if(response.status==="success"){
                              errormsgdiv.css('color', 'green');
                              errormsgdiv.html("Updated Successfully");

                            }else{
                              errormsgdiv.html("Tryagain Later");
                            }
                            setTimeout(function() {
                                    window.location.reload(1);
                            },1000);
                          }
                        });
                      }
                    }
                    break;
      default: 
                    break;
    }

  });

})(jQuery);