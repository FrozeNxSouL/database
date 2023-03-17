function success_alert(page,notice) {
    Swal.fire(
        'Good job!',
        notice,
        'success'
    ).then(function() {
        document.location.href = page;
    });
    
}
function fail_alert() {
    Swal.fire(
        'Error!',
        'Adding data failed',
        'error'
    ).then(function() {
        document.location.href = window.location.href;
    });
}

$(".delete-btn").click(function(e) {
    var id = $(this).data('id');
    e.preventDefault();
    console.log(window.location.href);
    if (window.location.href == 'http://localhost/project/Project/user.php') {
        deleteConfirm(id,'index.php');
    }
    else {
        deleteConfirm(id,window.location.href);
    }
})

function deleteConfirm(id,page) {
    Swal.fire({
        title: 'Are you sure?',
        text: "It will be deleted permanently!",
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                        url: window.location.href,
                        type: 'GET',
                        data: 'delete=' + id,
                    })
                    .done(function() {
                        Swal.fire({
                            title: 'success',
                            text: 'Data deleted successfully!',
                            icon: 'success',
                        }).then(() => {
                            document.location.href = page;
                        })
                    })
                    .fail(function() {
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                        window.location.reload();
                    });
            });
        },
    });
}
