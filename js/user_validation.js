$('document').ready(function() {

    var address_state = false;
    var phone_state = false;

    $('#edit_cus_phone').on('click', function() {
        var phone = $('#edit_cus_phone').val();
        if (phone === '') {
            phone_state = false;
            return;
        }
        $.ajax({
            url: 'edit-user.php',
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

    $('#save-edit').on('click', function() {
        var phone = $('#edit_cus_phone').val();
        if (phone === '') {
            phone_state = false;
            return;
        }
        $.ajax({
            url: 'edit-user.php',
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
    
    // $("#edit_cus_subdistrict").on('click', function() {
    //     var postal = $("#edit_cus_zip").val();
    //     var subdis = $("#edit_cus_subdistrict").val();
    //     var dis = $("#edit_cus_district").val();
    //     var provice = $("#edit_cus_provice").val();
    //     if (phone_state = false) {
    //         address_state = false;
    //         return;
    //     }
    //     $.ajax({
    //         url: 'edit-user.php',
    //         type: 'post',
    //         data: {
    //             'postal_check': 1,
    //             'postal': postal,
    //             'subdis' : subdis,
    //             'dis' : dis,
    //             'provice' : provice
    //         },
    //         success: function(response) {
    //             if (response == 'error') {
    //                 address_state = false;
    //                 $("#errorinput").text("5 Number for Postal Number");
    //             } 
    //             else if (response == "errorletter") {
    //                 address_state = false;
    //                 $("#errorinput").text('Postal Number is Number');
    //             }
    //             else if (response == 'wad') {
    //                 address_state = false;
    //                 $("#errorinput").text("Address Not found");
    //             } 
    //             else if (response == "not_unfound") {
    //                 address_state = true;
    //                 $("#errorinput").text('');
    //             }
                
    //         }
    //     })
    // });
    // $("#edit_cus_district").on('click', function() {
    //     var postal = $("#edit_cus_zip").val();
    //     var subdis = $("#edit_cus_subdistrict").val();
    //     var dis = $("#edit_cus_district").val();
    //     var provice = $("#edit_cus_provice").val();
    //     if (phone_state = false) {
    //         address_state = false;
    //         return;
    //     }
    //     $.ajax({
    //         url: 'edit-user.php',
    //         type: 'post',
    //         data: {
    //             'postal_check': 1,
    //             'postal': postal,
    //             'subdis' : subdis,
    //             'dis' : dis,
    //             'provice' : provice
    //         },
    //         success: function(response) {
    //             if (response == 'error') {
    //                 address_state = false;
    //                 $("#errorinput").text("5 Number for Postal Number");
    //             } 
    //             else if (response == "errorletter") {
    //                 address_state = false;
    //                 $("#errorinput").text('Postal Number is Number');
    //             }
    //             else if (response == 'wad') {
    //                 address_state = false;
    //                 $("#errorinput").text("Address Not found");
    //             } 
    //             else if (response == "not_unfound") {
    //                 address_state = true;
    //                 $("#errorinput").text('');
    //             }
                
    //         }
    //     })
    // });
    // $("#edit_cus_provice").on('click', function() {
    //     var postal = $("#edit_cus_zip").val();
    //     var subdis = $("#edit_cus_subdistrict").val();
    //     var dis = $("#edit_cus_district").val();
    //     var provice = $("#edit_cus_provice").val();
    //     if (phone_state = false) {
    //         address_state = false;
    //         return;
    //     }
    //     $.ajax({
    //         url: 'edit-user.php',
    //         type: 'post',
    //         data: {
    //             'postal_check': 1,
    //             'postal': postal,
    //             'subdis' : subdis,
    //             'dis' : dis,
    //             'provice' : provice
    //         },
    //         success: function(response) {
    //             if (response == 'error') {
    //                 address_state = false;
    //                 $("#errorinput").text("5 Number for Postal Number");
    //             } 
    //             else if (response == "errorletter") {
    //                 address_state = false;
    //                 $("#errorinput").text('Postal Number is Number');
    //             }
    //             else if (response == 'wad') {
    //                 address_state = false;
    //                 $("#errorinput").text("Address Not found");
    //             } 
    //             else if (response == "not_unfound") {
    //                 address_state = true;
    //                 $("#errorinput").text('');
    //             }
                
    //         }
    //     })
    // });

        // $("#edit_cus_zip").on('click', function() {
    //     var postal = $("#edit_cus_zip").val();
    //     var subdis = $("#edit_cus_subdistrict").val();
    //     var dis = $("#edit_cus_district").val();
    //     var provice = $("#edit_cus_provice").val();
    //     if (phone_state = false) {
    //         address_state = false;
    //         return;
    //     }
    //     $.ajax({
    //         url: 'edit-user.php',
    //         type: 'post',
    //         data: {
    //             'postal_check': 1,
    //             'postal': postal,
    //             'subdis' : subdis,
    //             'dis' : dis,
    //             'provice' : provice
    //         },
    //         success: function(response) {
    //             if (response == 'error') {
    //                 address_state = false;
    //                 $("#errorinput").text("5 Number for Postal Number");
    //             } 
    //             else if (response == "errorletter") {
    //                 address_state = false;
    //                 $("#errorinput").text('Postal Number is Number');
    //             }
    //             else if (response == 'wad') {
    //                 address_state = false;
    //                 $("#errorinput").text("Address Not found");
    //             } 
    //             else if (response == "not_unfound") {
    //                 address_state = true;
    //                 $("#errorinput").text('');
    //             }
                
    //         }
    //     })
    // });

    $("#save-edit").on('click', function() {
        var postal = $("#edit_cus_zip").val();
        var subdis = $("#edit_cus_subdistrict").val();
        var dis = $("#edit_cus_district").val();
        var provice = $("#edit_cus_provice").val();
        if (phone_state == false) {
            address_state = false;
            return;
        }
        $.ajax({
            url: 'edit-user.php',
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

    $('#save-edit').on("click", function(e) {
        var name = $("#edit_cus_name").val();
        var email = $("#edit_cus_email").val();
        var phone = $("#edit_cus_phone").val();
        var address = $("#edit_cus_address").val();
        var subdis = $("#edit_cus_subdistrict").val();
        var dis = $("#edit_cus_district").val();
        var provice = $("#edit_cus_provice").val();
        var postal = $("#edit_cus_zip").val();
        var role = $("#edit_cus_role").val();
        if ((phone_state == false ) || (address_state == false)) {
            e.preventDefault();
            return;
        } else {
            $.ajax({
                url: 'edit-user-info.php',
                type: 'post',
                data: {
                    'admin_update': 1,
                    'email': email,
                    'name': name,
                    'postal': postal,
                    'phonenum' : phone,
                    'address' : address,
                    'subdis' : subdis,
                    'dis' : dis,
                    'provice' : provice,
                    'role':role
                },
                success: function(response) {
                        $("#errorinput").text('');
                        alert('SAVED');                 
                        window.location.href='edit-user.php';
                }
            })
        }
    });

});
