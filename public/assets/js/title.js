"use strict";

var baseURL = 'https://cs3.austincc.edu/~u1245319/';

function validEmail(email) {
    var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate() {
    var errorMessage = ""
    if($("#titleText").val() == "") {
        errorMessage += "The title field cannot be empty.<br>"
    }
    if($("#favoriteDrink").val() == "") {
        errorMessage += "The favorite drink field cannot be empty.<br>"
    }
    if($("#petName").val() == "") {
        errorMessage += "The pet name field cannot be empty.<br>"
    }
    if($("#fakePlace").val() == "") {
        errorMessage += "The fictional location field cannot be empty.<br>"
    }
    if($("#realPlace").val() == "") {
        errorMessage += "The real location field cannot be empty.<br>"
    }
    if($("#email").val() == "") {
        errorMessage += "The email field cannot be empty.<br>"
    }
    if(($("#fakePlace").val() == $("#realPlace").val()) && ($("#realPlace").val() != "")) {
        errorMessage += "The fictional location and real location cannot be the same.<br>"
    }
    if(!validEmail($("#email").val())) {
        errorMessage += "You must enter a valid email.<br>"
    }
    return errorMessage;
}

function clearForm() {
    $("#titleText").val('');
    $("#favoriteDrink").val('');
    $("#petName").val('');
    $("#fakePlace").val('');
    $("#realPlace").val('');
    $("#email").val('');
    $("#msg").html('');
}

function sendData(title, favDrink, petName, fakePlace, realPlace){
    $.ajax({
        url: 'title/process',
        type: 'POST',
        data: {title: title, favoriteDrink: favDrink, petName: petName, fakePlace: fakePlace, realPlace: realPlace},
        success: function(val) {
            if(val != "error"){
                clearForm();
                if(val >= 30){
                    $("#msg").html("That's a heck of a title!");
                } else {
                    $("#msg").html("That's a cute little title.");
                }
            } else {
                $("#msg").html("Processing Error: "+val);
            }
        },
        error: function() {
            $("#msg").html("Server Error");
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
            sendData($("#titleText").val(), $("#favoriteDrink").val(), $("#petName").val(), $("#fakePlace").val(), $("#realPlace").val());
            return true;
        } else {
            $("#msg").html(msg);
            return false;
        }
    });
});
