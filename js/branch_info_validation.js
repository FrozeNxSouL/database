$('document').ready(function() {

    var phone_state = true;
    var address_state = true;


$('#edit_branch_phone').on('click', function() {
    var phone = $('#edit_branch_phone').val();
    if (phone == '') {
        phone_state = false;
        return;
    }
    $.ajax({
        url: 'edit-branch-info.php',
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

$("#edit_branch_subdistrict").on('click', function() {
    var postal = $("#edit_branch_postal").val();
    var subdis = $("#edit_branch_subdistrict").val();
    var dis = $("#edit_branch_district").val();
    var provice = $("#edit_branch_province").val();
    if (phone_state == false) {
        address_state = false;
        return;
    }
    $.ajax({
        url: 'edit-branch-info.php',
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

$("#edit_branch_district").on('click', function() {
    var postal = $("#edit_branch_postal").val();
    var subdis = $("#edit_branch_subdistrict").val();
    var dis = $("#edit_branch_district").val();
    var provice = $("#edit_branch_province").val();
    if (phone_state == false) {
        address_state = false;
        return;
    }
    $.ajax({
        url: 'edit-branch-info.php',
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

$("#edit_branch_province").on('click', function() {
    var postal = $("#edit_branch_postal").val();
    var subdis = $("#edit_branch_subdistrict").val();
    var dis = $("#edit_branch_district").val();
    var provice = $("#edit_branch_province").val();
    if (phone_state == false) {
        address_state = false;
        return;
    }
    $.ajax({
        url: 'edit-branch-info.php',
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

$("#edit_branch_postal").on('click', function() {
    var postal = $("#edit_branch_postal").val();
    var subdis = $("#edit_branch_subdistrict").val();
    var dis = $("#edit_branch_district").val();
    var provice = $("#edit_branch_province").val();
    if (phone_state == false) {
        address_state = false;
        return;
    }
    $.ajax({
        url: 'edit-branch-info.php',
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

$("#update").on("click", function(e) {
    var id = $("#edit_branch_id").val();
    var name = $("#edit_branch_name").val();
    var phone = $("#edit_branch_phone").val();
    var address = $("#edit_branch_address").val();
    var subdis = $("#edit_branch_subdistrict").val();
    var dis = $("#edit_branch_district").val();
    var provice = $("#edit_branch_province").val();
    var postal = $("#edit_branch_postal").val();
    if ((phone_state == false ) || (address_state == false)) {
        e.preventDefault();
        return;
    } else {
        $.ajax({
            url: 'edit-branch-info.php',
            type: 'post',
            data: {
                'save_edit': 1,
                'branchID': id,
                'branchName': name,
                'branch_phone' : phone,
                'branch_address' : address,
                'branch_subdistrict' : subdis,
                'branch_district' : dis,
                'branch_province' : provice,
                'branch_postal' : postal
            },
            success: function(response) {
                $("#errorinput").text('');
                success_alert('edit-branch.php','Saved');         
                
            }
        })
    }
});


});