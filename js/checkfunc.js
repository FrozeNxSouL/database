$('document').ready(function() {

    var phone_state = false;
    var email_state = false;
    var address_state = false;

    $('#inputphonenum').on('blur', function() {
        var phone = $('#inputphonenum').val();
        if (phone == '') {
            phone_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'phone_check': 1,
                'phonenum': phone
            },
            success: function(response) {
                if (response == 'errorletter') {
                    phone_state = false;
                    $("#errorinput").text("Phone number is Number");
                } 
                else if (response == "error") {
                    phone_state = false;
                    $("#errorinput").text("10 letter for phone number");
                }
                else if (response == "pass") {
                    phone_state = true;
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#sign-up-email").on('blur', function() {
        var email = $("#sign-up-email").val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $("#errorinput").text("Sorry... Email already taken");
                } 
                else if (response == "not_taken") {
                    email_state = true;
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#inputsubdis").on('blur', function() {
        var postal = $("#inputpostal").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if ((postal === '') || (subdis === '') || (dis === '') || (provice === '')) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal,
                'subdis' : subdis,
                'dis' : dis,
                'provice' : provice
            },
            success: function(response) {
                if (response == 'error') {
                    address_state = false;
                    $("#errorinput").text("5 Number for Postal Number");
                } 
                else if (response == "errorletter") {
                    address_state = false;
                    $("#errorinput").text('Postal Number is Number');
                }
                else if (response == 'wad') {
                    address_state = false;
                    $("#errorinput").text("Address Not found");
                } 
                else if (response == "not_unfound") {
                    address_state = true;
                    $("#errorinput").text('');
                }
                
            }
        })
    });

    $("#inputdis").on('blur', function() {
        var postal = $("#inputpostal").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if ((postal === '') || (subdis === '') || (dis === '') || (provice === '')) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal,
                'subdis' : subdis,
                'dis' : dis,
                'provice' : provice
            },
            success: function(response) {
                if (response == 'error') {
                    address_state = false;
                    $("#errorinput").text("5 Number for Postal Number");
                } 
                else if (response == "errorletter") {
                    address_state = false;
                    $("#errorinput").text('Postal Number is Number');
                }
                else if (response == 'wad') {
                    address_state = false;
                    $("#errorinput").text("Address Not found");
                } 
                else if (response == "not_unfound") {
                    address_state = true;
                    $("#errorinput").text('');
                }
                
            }
        })
    });

    $("#inputprovice").on('blur', function() {
        var postal = $("#inputpostal").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if ((postal === '') || (subdis === '') || (dis === '') || (provice === '')) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal,
                'subdis' : subdis,
                'dis' : dis,
                'provice' : provice
            },
            success: function(response) {
                if (response == 'error') {
                    address_state = false;
                    $("#errorinput").text("5 Number for Postal Number");
                } 
                else if (response == "errorletter") {
                    address_state = false;
                    $("#errorinput").text('Postal Number is Number');
                }
                else if (response == 'wad') {
                    address_state = false;
                    $("#errorinput").text("Address Not found");
                } 
                else if (response == "not_unfound") {
                    address_state = true;
                    $("#errorinput").text('');
                }
                
            }
        })
    });

    $("#inputpostal").on('blur', function() {
        var postal = $("#inputpostal").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if ((postal === '') || (subdis === '') || (dis === '') || (provice === '')) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal,
                'subdis' : subdis,
                'dis' : dis,
                'provice' : provice
            },
            success: function(response) {
                if (response == 'error') {
                    address_state = false;
                    $("#errorinput").text("5 Number for Postal Number");
                } 
                else if (response == "errorletter") {
                    address_state = false;
                    $("#errorinput").text('Postal Number is Number');
                }
                else if (response == 'wad') {
                    address_state = false;
                    $("#errorinput").text("Address Not found");
                } 
                else if (response == "not_unfound") {
                    address_state = true;
                    $("#errorinput").text('');
                }
                
            }
        })
    });


    $('#submitsignin').on('click', function() {
        var phone = $('#inputphonenum').val();
        if (phone == '') {
            phone_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'phone_check': 1,
                'phonenum': phone
            },
            success: function(response) {
                if (response == 'errorletter') {
                    phone_state = false;
                    $("#errorinput").text("Phone number is Number");
                } 
                else if (response == "error") {
                    phone_state = false;
                    $("#errorinput").text("10 letter for phone number");
                }
                else if (response == "pass") {
                    phone_state = true;
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#submitsignin").on('click', function() {
        var email = $("#sign-up-email").val();
        if (phone_state = false) {
            email_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $("#errorinput").text("Sorry... Email already taken");
                } 
                else if (response == "not_taken") {
                    email_state = true;
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#submitsignin").on('click', function() {
        var postal = $("#inputpostal").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if (email_state = false) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal,
                'subdis' : subdis,
                'dis' : dis,
                'provice' : provice
            },
            success: function(response) {
                if (response == 'error') {
                    address_state = false;
                    $("#errorinput").text("5 Number for Postal Number");
                } 
                else if (response == "errorletter") {
                    address_state = false;
                    $("#errorinput").text('Postal Number is Number');
                }
                else if (response == 'wad') {
                    address_state = false;
                    $("#errorinput").text("Address Not found");
                } 
                else if (response == "not_unfound") {
                    address_state = true;
                    $("#errorinput").text('');
                }
                
            }
        })
    });

    $('#submitsignin').on("click", function(e) {
        var name = $("#inputName").val();
        var email = $("#sign-up-email").val();
        var password = $("#sign-up-pw").val();
        var phone = $("#inputphonenum").val();
        var address = $("#inputaddress").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        var postal = $("#inputpostal").val();
        if ((phone_state == false )|| (email_state == false) || (address_state == false)) {
            e.preventDefault();
            return;
        } else {
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'name': name,
                    'password': password,
                    'phonenum' : phone,
                    'address' : address,
                    'subdis' : subdis,
                    'dis' : dis,
                    'provice' : provice,
                    'postal' : postal
                },
                success: function(response) {
                    if (response == 'Empty') {
                        $("#errorinput").text("Empty input");
                    } 
                    else if (response == 'Error') {
                        $("#errorinput").text("Try again");
                    } 
                    else if (response == 'Saved') {
                        $("#errorinput").text('');
                        success_alert();
                    } 
                }
            })
        }
    });

});
