$(document).ready(function() {

  jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
  }, "Please enter only letters without space.");

  $("#form-login").validate({

    errorElement: "span",

    rules: {

      username: {
        required: true,
        minlength: 5,
        maxlength:25
      },
      password: {
        required: true,
        minlength: 6,
        maxlength:12
      }
    },
    messages: {

      username: {
        required: "Username is required."
      },

      password: {
        required: "Please provide a password.",
        minlength: "Your password must be at least 5 characters long",
        maxlength: "Password can not be more than 25 characters"
      }
      

    },

    errorPlacement: function(error, element) {
      error.appendTo(element.parent());
    }

  });

  $("#form-signup").validate({

    errorElement: "span",

    rules: {

      username: {
        required: true,
        minlength: 5,
        maxlength:25,
        lettersonly: true
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6,
        maxlength:12
      },
      cpassword: {
        equalTo: "#password"
      }
    },

    messages: {

      username: {
        required: "Username is required.."
      },

      password: {
        required: "Please provide a password.",
        minlength: "Your password must be at least 6 characters long",
        maxlength: "Password can not be more than 12 characters"
      },

      cpassword: {
        equalTo: "Password is not matching!"
      },

      email: {
        email: "Please enter a valid e-mail"
      }
    },
			
    errorPlacement: function(error, element) {
      error.appendTo(element.parent());
    }

  });
  
  $("#form-add-edit").validate({

    errorElement: "span",

    rules: {

      title: {
        required: true,
        minlength: 5,
        maxlength:255
      }
    },

    messages: {

      title: {
        required: "Please provide a task.",
        minlength: "Your task must be at least 5 characters long",
        maxlength: "Password can not be more than 255 characters"
      }
    },
			
    errorPlacement: function(error, element) {
      error.appendTo(element.parent());
    }

  });
});