$('document').ready(function() {


    $('#inputphonenum').on('blur', function() {
        var phone = $('#inputphonenum').val();
        if (phone === '') {
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
                    $("#errorinput").text("เบอร์เป็นเลขครับพรี่");
                } 
                else if (response == "error") {
                    $("#errorinput").text("10 letter for phone number");
                }
                else if (response == "pass") {
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
        var subdis = $("#inputsubdis").val();
        if (subdis == '') {
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'subdis_check': 1,
                'subdis': subdis
            },
            success: function(response) {
                if (response == 'unfound') {
                    $("#errorinput").text("มาจากบ้านไหนนิ");
                } 
                else if (response == "not_unfound") {
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#inputdis").on('blur', function() {
        var dis = $("#inputdis").val();
        if (dis == '') {
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'dis_check': 1,
                'dis': dis
            },
            success: function(response) {
                if (response == 'unfound') {
                    $("#errorinput").text("ข้นไส");
                } 
                else if (response == "not_unfound") {
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#inputprovice").on('blur', function() {
        var provice = $("#inputprovice").val();
        if (provice == '') {
            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'provice_check': 1,
                'provice': provice
            },
            success: function(response) {
                if (response == 'unfound') {
                    $("#errorinput").text("มีที่อยู่มั้ยนิ");
                } 
                else if (response == "not_unfound") {
                    $("#errorinput").text('');
                }
            }
        })
    });

    $("#inputpostal").on('blur', function() {
        var postal = $("#inputpostal").val();
        if (postal === '') {

            return;
        }
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'postal_check': 1,
                'postal': postal
            },
            success: function(response) {
                if (response == 'error') {
                    $("#errorinput").text("ต้องมีเลข 5 ตัวครับ");
                } 
                else if (response == "errorletter") {
                    $("#errorinput").text('รหัสเป็นเลขครับพรี่');
                }
                else if (response == "unfound") {
                    $("#errorinput").text('อยู่ในป่าหรือไงครับ');
                }
                else if (response == "not_unfound") {
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
        var postal = $("#inputpostal").val();
        if ((name === '') || (address === '') || (phone === '') || (postal === '')) {
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
                
                    else if (response == 'Saved') {
                        alert('SAVED');                 
                        window.location.href='user.php';
                    } 
                }
            })
        }
    });

});
