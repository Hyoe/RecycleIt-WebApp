$(document).ready(function()
{
  /* validation */
  $("#register-form").validate({
    rules:
    {
      username: {
        required: true,
        minlength: 3
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
      confirm_password: {
        required: true,
        equalTo: '#password'
      },

    },
    messages:
    {
      username: "Username must have a minimum of 3 characters",
      email: "Please enter a valid email address",
      password:{
        required: "Please provide a password",
        minlength: "Password must have a minimum of 3 characters"
      },

      confirm_password:{
        required: "Please retype your password",
        equalTo: "Passwords do not match!"
      }
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm()
  {
    var data = $("#register-form").serialize();

    $.ajax({

      type : 'POST',
      url  : '../includes/register.php',
      data : data,
      beforeSend: function()
      {
        $("#error").fadeOut();
        $("#register-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; SENDING ...');
      },

      success : function(data)


      {
        if(data.indexOf("usernametaken") > -1) {

          $("#error").fadeIn(1000, function(){


            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry username already taken!</div>');

            $("#register-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; CREATE ACCOUNT');

          });
        }
        else if(data.indexOf("emailtaken") > -1) {

          $("#error").fadeIn(1000, function(){

            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken!</div>');

            $("#register-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; CREATE ACCOUNT');

          });
        }


        else if(data.indexOf("bothgone") > -1) {

          $("#error").fadeIn(1000, function(){

            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry username and email address already taken!</div>');

            $("#register-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; CREATE ACCOUNT');

          });
        }

        else if(data.indexOf("registered") > -1)
        {
          $("#register-submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Signing Up ...');
          setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("success.php"); }); ',2000);
        }
        else {
          $("#error").fadeIn(1000, function(){

            $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Database down, try again later!</div>');

            $("#register-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; CREATE ACCOUNT');

          });
        }

      }
    });
    return false;
  }
  /* form submit */

});