function clearForm() {
    $('#contactName').val('');
    $('#email').val('');
    $('#confirmEmail').val('');
    $('#subject').val('');
    $('#messageText').val('');
    $("#msg").html('');
}

function validate() {
    var errorMessage = "";

   var name = $('#contactName').val().trim();
   var email = $('#email').val().trim();
   var confirmEmail = $('#confirmEmail').val().trim();
   var subject = $('#subject').val().trim();
   var messageText = $('#messageText').val().trim();

   $('#contactName').val(name);
   $('#email').val(email);
   $('#confirmEmail').val(confirmEmail);
   $('#subject').val(subject);
   $('#messageText').val(messageText);

   if (name === "") {
       errorMessage += "Name cannot be empty.<br>";
   }

   if (email === "") {
       errorMessage += "Must provide an email.<br>";
   }

   if (confirmEmail === "") {
       errorMessage += "Please confirm your email.<br>";
   }

   if (email != confirmEmail) {
       errorMessage += "Email and Confirmation Email must match.<br>";
   }

   if (subject === "") {
       errorMessage += "Must provide a subject.<br>";
   }

   if (messageText === "") {
       errorMessage += "Message text cannot be empty.<br>";
   }

   return errorMessage;
}

function sendData(name, email, subject, messageText){
    $.ajax({
        url: 'contact/emailInput',
        type: 'POST',
        data: {name: name, email: email, subject: subject, messageText: messageText},
        success: function(val) {
            if(val === "okay"){
                clearForm();
                $("#msg").html("Sent!");
            } else {
                $("#msg").html("Processing Error.");
            }
        },
        error: function() {
            $("#msg").html("Server Error.");
        }
    });
    return;
}

$(document).ready(function () {
    $("#clear").click(function () {
        clearForm();
    });

    $("#submit").click(function () {
        var msg = validate();
        if(msg === ""){
            sendData($('#contactName').val(), $('#email').val(), $('#subject').val(), $('#messageText').val());
            return true;
        } else {
            $("#msg").html(msg);
            return false;
        }
    });
});
