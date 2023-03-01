$('document').ready(function() {

    $('#submitlogin').on("click", function(e) {
        var loginemail = $("#exampleInputEmail1").val();
        var loginpassword = $("#exampleInputPassword1").val();
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
                        alert('CONNECTED'); 
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
                        login();
                    } 
                }
            })
        }
    });

});
