$('document').ready(function() {
    document.querySelector('#submitlogin').disabled = true;
    $("#exampleInputEmail1").on('blur', function(e) {
        var email = $("#exampleInputEmail1").val();
        if (email == '') {
            e.preventDefault();
            $("#errorinput1").text('maybe you got the wrong door');
            document.querySelector('#submitlogin').disabled = true;
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
                    // $('#email').parent().removeClass();
                    // $('#email').parent().addClass('form_error');
                    $("#errorinput1").text('');
                } 
                else if (response == "not_taken") {
                    $("#errorinput1").text('maybe you got the wrong door');
                    // $('#email').parent().removeClass();
                    // $('#email').parent().addClass('form_success');
                    // $("#errorinput").text("Email available");
                }
            }
        })
    });

    $('#exampleInputPassword1').on('blur', function(e) {
        var loginemail = $("#exampleInputEmail1").val();
        var loginpassword = $("#exampleInputPassword1").val();
        if (loginemail == ' ' || loginpassword == ' ' ) {
            e.preventDefault();
            document.querySelector('#submitlogin').disabled = true;
            $("#errorinput1").text("Check your form again!");
        } 
        else {
            $.ajax({
                url: 'index.php',
                type: 'post',
                data: {
                    'search': 1,
                    'acc': loginemail,
                    'acc_password': loginpassword
                },
                success: function(response) {
                    if (response == 'noacc') {
                        $("#errorinput1").text("check your email!");
                    } 
                    else if (response == 'wrongpw') {
                        $("#errorinput1").text("Wrong password!");
                    } 
                    else if (response == 'correct') {
                        $("#errorinput1").text('');
                        document.querySelector('#submitlogin').disabled = false;
                        // var femail = $("#exampleInputEmail1").val();
                        // // let http = new XMLHttpRequest()
                        // // http.open('POST', 'Index.php',true);
                        // // // console.log(femail);
                        // // http.send(femail);
                        // var xhr = new XMLHttpRequest();
                        // var sendings = JSON.parse(femail); 
                        // console.log(sendings);
                        // xhr.open("get", "Index.php");
                        // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        // xhr.send();
                    } 
                }
            })
        }
    });

});

//little bug need to fixed
