function deleteMethod(id) {
    swal({
        title: 'Eliminar producto',
        text: '¿Realmente desea eliminar el producto?',
        icon: "warning",
        buttons: ["Calcelar", `Eliminar`],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: `/products/${id}`,
                    type: 'POST',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr("content"),
                        '_method': 'DELETE',
                    },
                    success: function (result) {
                        console.log(result);
                        swal(`producto eliminado correctamente`, {
                            icon: "success",
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
}