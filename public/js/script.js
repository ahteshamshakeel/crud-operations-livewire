
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                  Livewire.dispatch('deleteconfirmed');
                }
            });

        })


        window.addEventListener('cardeleted', event => {
            Swal.fire('Deleted!' , 'Your car has been deleetd' , 'success');

        });



        document.addEventListener('DOMContentLoaded', function () {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right"
            };

            window.addEventListener('success', function (event) {
                toastr.success(event.detail[0].message);
            });

            window.addEventListener('error', function (event) {
                toastr.error(event.detail[0].message);
            });
        });

