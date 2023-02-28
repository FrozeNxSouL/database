$('document').ready(function() {

    $('#submitlogin').on("click", function(e) {
        var loginemail = $("#exampleInputEmail1").val();
        var loginpassword = $("#exampleInputPassword1").val();
        var xhr = new XMLHttpRequest();
        var sendings = {email: loginemail, password: loginpassword}
        if (loginemail == ' ' || loginpassword == ' ' ) {
            e.preventDefault();
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
                        $("#errorinput1").text("Wrong email!");
                    } 
                    else if (response == 'wrongpw') {
                        $("#errorinput1").text("Wrong password!");
                    } 
                    else if (response == 'correct') {
                        alert('LOGIN');  
                        xhr.open("POST", "index.php", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.send(JSON.stringify(sendings));
                        login();
                    } 
                }
            })
        }
    });

});
