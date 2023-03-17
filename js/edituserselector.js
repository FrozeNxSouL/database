$('document').ready(function() {

    var address_state = true;
    var phone_state = true;

    $('#inputphonenum').on('blur', function() {
        var phone = $('#inputphonenum').val();
        if (phone === '') {
            phone_state = false;
            return;
        }
        $.ajax({
            url: 'user.php',
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
            url: 'user.php',
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
            url: 'user.php',
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
            url: 'user.php',
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
            url: 'user.php',
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

    $('#user_save').on("click", function(e) {
        var name = $("#inputName").val();
        var email = $("#sign-up-email").val();
        var phone = $("#inputphonenum").val();
        var address = $("#inputaddress").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        var postal = $("#inputpostal").val();
        if ((phone_state == false ) || (address_state == false)) {
            e.preventDefault();
            $("#errorinput").text("Check your form again!");
        } 
        else {
            $.ajax({
                url: 'user.php',
                type: 'post',
                data: {
                    'user-update': 1,
                    'email': email,
                    'name': name,
                    'postal': postal,
                    'phonenum' : phone,
                    'address' : address,
                    'subdis' : subdis,
                    'dis' : dis,
                    'provice' : provice
                },
                success: function(response) {
                    if (response == 'Empty') {
                        $("#errorinput").text("Empty input");
                    } 
                    else if (response == 'user_saved') {
                        $("#errorinput").text('');
                        success_alert('user.php','Saved');
                    } 
                }
            })
        }
    });

});
