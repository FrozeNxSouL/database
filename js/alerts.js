function success_alert() {
    Swal.fire(
        'Good job!',
        'Your data has been saved.',
        'success'
    ).then(function() {
        document.location.href = window.location.href;
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
    deleteConfirm(id);
})

function deleteConfirm(id) {
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
                            document.location.href = window.location.href;
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
