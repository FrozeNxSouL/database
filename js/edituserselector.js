$('document').ready(function() {

    var phone_state = false;

    $('#inputphonenum').on('blur', function() {
        var phone = $('#inputphonenum').val();
        if (phone == '') {
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
                    $("#errorinput").text("เบอร์เป็นเลขครับพรี่");
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

    $('#save').on("click", function(e) {
        var name = $("#inputName").val();
        var email = $("#sign-up-email").val();
        var phone = $("#inputphonenum").val();
        var address = $("#inputaddress").val();
        var subdis = $("#inputsubdis").val();
        var dis = $("#inputdis").val();
        var provice = $("#inputprovice").val();
        if (phone_state == false) {
            e.preventDefault();
            $("#errorinput").text("Check your form again!");
        } else {
            $.ajax({
                url: 'user.php',
                type: 'post',
                data: {
                    'update': 1,
                    'email': email,
                    'name': name,

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
                        window.location.href='user.php';
                    } 
                }
            })
        }
    });

});
