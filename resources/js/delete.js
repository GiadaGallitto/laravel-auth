const deleteForms = document.querySelectorAll('form.form-delete');

deleteForms.forEach((formEl) => {
    formEl.addEventListener('submit', function (event) {
        event.preventDefault();
        const formElName = formEl.getAttribute('data-element-name');
        var doubleconfirm = event.target.classList.contains('double-confirm');
        Swal.fire({
            title: 'Are you sure about delete this element?',
            text: "Please confirm your request!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, confirm !'
        }).then((result) => {
            if (result.value) {

                if (doubleconfirm) {

                    Swal.fire({
                        title: 'Confirm request',
                        html: "Please type <b>CONFIRM</b>",
                        input: 'text',
                        type: 'warning',
                        inputPlaceholder: 'CONFIRM',
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        cancelButtonText: 'Cancel',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm: (txt) => {
                            return (txt.toUpperCase() == "CONFIRM");
                        },

                    }).then((result) => {
                        if (result.value) this.submit();
                    })
                } else {
                    this.submit();
                }
            }
        });
    });
});