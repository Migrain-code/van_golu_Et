$(document).on('click', '.delete-btn', function () {
    let model = $(this).data('model')
    let content = $(this).data('content')
    let title = $(this).data('title')
    let id = $(this).data('object-id')

    Swal.fire({
        title: 'İşlemi Yapmak İstiyormusun',
        text: content,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, Sil!",
        cancelButtonText: "Hayır, Silme"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: ajax_urls.deleteFeatured,
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'id': id,
                    'model': model,
                    'content': content,
                    'title': title
                },
                dataType: "JSON",
                success: function (res) {
                    Swal.fire({
                        title: "Deleted!",
                        icon: res.status,
                        text: res.message,
                    })
                    if ($('#datatable').length > 0 && $.fn.DataTable.isDataTable('#datatable')) {
                        $('#datatable').DataTable().ajax.reload();
                        if ($('#datatablePersonal').length > 0 && $.fn.DataTable.isDataTable('#datatablePersonal')) {
                            console.log('tablea girdi');
                            $('#datatablePersonal').DataTable().ajax.reload();
                        }
                    }
                    else{
                        if ($('#datatablePersonal').length > 0 && $.fn.DataTable.isDataTable('#datatablePersonal')) {
                            $('#datatablePersonal').DataTable().ajax.reload();
                        } else{
                            window.location.reload();
                        }
                    }
                }
            });
        }
    });

});

$(document).on('change', '[name="city_id"]', function () {

    let id = $(this).val();
    var district = $('[name="district_id"]');
    district.empty();
            $.ajax({
                url: ajax_urls.getDistrictUrl,
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'id': id,
                },
                dataType: "JSON",
                success: function (res) {
                    $.each(res, function (index, item) {
                        district.append('<option value="' + item.id + '">' + item.name + '</option>');
                    });
                }
            });
});


$(document).on('click', '[data-kt-customer-table-select="delete_selected"]', function () {

    const allCheckboxes = document.querySelectorAll('tbody .delete[type="checkbox"]');
    let count = 0;
    let model = "";
    let title = "";
    let values = [];
    allCheckboxes.forEach(c => {
        if (c.checked) {
            count++;
            model = c.dataset.model;
            title = c.dataset.title;
            values.push(c.value);
        }
    });


    Swal.fire({
        title: 'İşlemi Yapmak İstiyormusun',
        text: title + " Silmek İstiyormusunuz. Silinecek kayıt sayısı " + count,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, Sil!",
        cancelButtonText: "Hayır, Silme"
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: ajax_urls.deleteAllFeatured,
                type: "POST",
                data: {
                    "_token": csrf_token,
                    'ids': values,
                    'model': model,
                    'title': title
                },
                dataType: "JSON",
                success: function (res) {
                    Swal.fire({
                        title: "Deleted!",
                        icon: res.status,
                        text: res.message,
                    })
                    if ($.fn.DataTable.isDataTable('#datatable')) {
                        $('#datatable').DataTable().ajax.reload();
                        if ($('#datatablePersonal').length > 0 && $.fn.DataTable.isDataTable('#datatablePersonal')) {
                            $('#datatablePersonal').DataTable().ajax.reload();
                        }
                    } else{
                        if ($('#datatablePersonal').length > 0 && $.fn.DataTable.isDataTable('#datatablePersonal')) {
                            $('#datatablePersonal').DataTable().ajax.reload();
                        }
                        else{
                            window.location.reload();
                        }
                    }
                }
            });
        }
    });

})


$(document).on('change', '.ajax-switch', function () {
    let model = $(this).data('model')
    let column = $(this).data('column')
    let id = $(this).val()
    let value = $(this).is(':checked') ? 1 : 0

    $.ajax({
        url: ajax_urls.updateFeaturedUrl,
        type: "POST",
        data: {
            "_token": csrf_token,
            'id': id,
            'value': value,
            'model': model,
            'column': column,
        },
        success: function (res) {
            /*Swal.fire({
                icon: res.status,
                text: res.text ? res.text : res.message,
            })*/
        }
    });
})
