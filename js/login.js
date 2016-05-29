$(document).ready(function()
{
  /* validation */
  $("#login-form").validate({
    rules:
    {
      username: {
        required: true,
        minlength: 3
      },
      passwordLogin: {
        required: true,
        minlength: 3,
        maxlength: 20,
      },
    },
    messages:
    {
      username: "Username must have a minimum of 3 characters",
      email: "Please enter a valid email address",
      passwordLogin:{
        required: "Please provide a password",
        minlength: "Password must have a minimum of 3 characters"
      },
    },
    submitHandler: submitForm
  });
  /* validation */

  /* form submit */
  function submitForm()
  {
    var data = $("#login-form").serialize();

    $.ajax({

      type : 'POST',
      url  : '../includes/login.php',
      data : data,
      beforeSend: function()
      {
        $("#error").fadeOut();
        $("#login-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; SENDING ...');
      },

      success : function(data)


      {
        if(data.indexOf("Wrong username/email and/or password!") > -1) {

          $("#error").fadeIn(1000, function(){


            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Wrong username/email and/or password!</div>');

            $("#login-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; LOG IN');

          });
        }

        else if(data.indexOf("registered") > -1)
        {
          $("#login-submit").html('<img src="../images/default.gif" /> &nbsp; SIGNING IN ...');
          setTimeout(function(){ window.location.replace('/includes/search.php'); }, 1200);
          /*
          $("#login-submit").html('<img src="../images/default.gif" /> &nbsp; SIGNING IN ...');
          setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("../index.php"); }); ',1000);
          */
        }
        else {
          $("#error").fadeIn(1000, function(){

            $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Database down, try again later!</div>');

            $("#login-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; LOG IN');

          });
        }

      }
    });
    return false;
  }
  /* form submit */

});