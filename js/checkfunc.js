$('document').ready(function() {

    var phone_state = false;
    var email_state = false;

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
                    $("#errorinput").text("เบอร์เป็นเลขครับพรี่");
                } 
                else if (response == "error") {
                    phone_state = false;
                    $("#errorinput").text("10 letter for phone number");
                }
                else if (response == "pass") {
                    phone_state = true;
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
                    // $('#email').parent().removeClass();
                    // $('#email').parent().addClass('form_error');
                    $("#errorinput").text("Sorry... Email already taken");
                } 
                else if (response == "not_taken") {
                    email_state = true;
                    // $('#email').parent().removeClass();
                    // $('#email').parent().addClass('form_success');
                    // $("#errorinput").text("Email available");
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
        if (phone_state == false || email_state == false) {
            e.preventDefault();
            $("#errorinput").text("Check your form again!");
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
                    'provice' : provice
                },
                success: function(response) {
                    if (response == 'Empty') {
                        $("#errorinput").text("Empty input");
                    } 
                    else if (response == 'Error') {
                        $("#errorinput").text("Try again");
                    } 
                    else if (response == 'Saved') {
                        alert('SAVED');                 
                        login();
                    } 
                }
            })
        }
    });

});
