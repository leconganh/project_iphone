$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


jQuery(document).ready(function ($) {
    var update_id;

    function GetURLParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    };


    function showCategory() {
        $.ajax({
            url: 'admin/show_category?page=' + GetURLParameter('page'),
            type: 'get',
            dataType: 'json',
            success: function (result) {
                $('#category-crud').empty()
                result.data.forEach(row => {
                    var status = (row.status == 1) ? 'Hiển thị' : 'Không hiển thị'
                    var object = `<tr>
		                        <td>` + row.id + `</td>
		                        <td>` + row.name + `</td>
		                        <td>` + row.slug + `</td>
		                        <td>` + status + `
		                        </td>
		                        <td>
		                        	<button class="btn btn-primary edit" title="Sửa ` + row.name + `"data-toggle="modal" data-target="#edit" type="button" data-id = "` + row.id + `"><i class="fas fa-edit" ></i></button>
		                        	<button class="btn btn-danger delete" title="Xoa ` + row.name + `"data-toggle="modal" data-target="#delete" type="button" data-id = "` + row.id + `"><i class="fas fa-trash-alt" ></i></button>
		                        </td>
		                    </tr>`
                    $('#category-crud').prepend(object);
                })
            }
        });
    }

    function showProductType() {
        $.ajax({
            url: 'admin/show_productType?page=' + GetURLParameter('page'),
            type: 'get',
            dataType: 'json',
            success: function (result) {
                $('#productType-crud').empty();
                $.each(result.productType.data, function (key, value) {
                    var category = result.category.filter(function (check) {
                        return check.id == value.id_category;
                    })

                    var status = (value.status == 1) ? 'Hiện thị' : 'Không hiển thị'
                    var object = `<tr>
		                        <td>` + value.id + `</td>
		                        <td>` + value.name + `</td>
		                        <td>` + value.slug + `</td>
		                        <td>` + category[0].name + `</td>
		                        <td>` + status + `
		                        </td>
		                       	<td>
		                        	<button class="btn btn-primary editProductType" title="Sửa` + value.name + `"data-toggle="modal" data-target="#edit" type="button" data-id = "` + value.id + `"><i class="fas fa-edit" ></i></button>
		                        	<button class="btn btn-danger deleteProductType" title="Xoá` + value.name + `"data-toggle="modal" data-target="#delete" type="button" data-id = "` + value.id + `"><i class="fas fa-trash-alt" ></i></button>
		                        </td>
		                    </tr>`
                    $('#productType-crud').prepend(object);
                });
            }
        });
    }


    showCategory()

    $('#form-Add').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url:'admin/category',
            type:'POST',
            dataType: 'json' ,
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function (data) {
                $('#form-Add')[0].reset();
                toastr.success(data.success, 'Thông báo', {timeOut: 5000});
                $('#add-category').modal('hide');
                showCategory();
            },
            error: function (data) {
                // console.log(data);
                let error = $.parseJSON(data.responseText);
                console.log(error);
                $('.error').show();
                $('.error').text(error.errors.name);
            }
        });
    });
    //EDIT
    $('body').on('click', '.edit', function () {
        $('.error').hide();
        /* Act on the event */
        let id = $(this).data('id');
        update_id = id;
        //edit
        $.ajax({
            url: 'admin/category/' + id + '/edit',
            type: 'get',
            dataType: 'json',
            success: function ($result) {
                $('.name').val($result.name);
                $('.id-category').val($result.id);
                $('.title').text($result.name);
                $('.status').val($result.status);
            }
        });
    });
    $('.update').click(function () {
        $.ajax({
            url: 'admin/category/' + update_id,
            data: $('#categoryForm').serialize(),
            type: 'put',
            dataType: 'json',
            success: function (result) {
                toastr.success(result.success, 'Sửa thành công', {timeOut: 5000});
                $('#edit').modal('hide');
                showCategory()
            },
            error: function (data) {
                let error = $.parseJSON(data.responseText);

                if (error.errors.name != " ") {
                    $('.error').show();
                    $('.error').text(error.errors.name);
                }
            }
        });
    });
    //DELETE
    $('body').on('click', '.delete', function (event) {
        let id = $(this).data('id');
        $('.xoa').click(function (event) {
            $.ajax({
                url: 'admin/category/' + id,
                type: 'delete',
                dataType: 'json',
                success: function (result) {
                    toastr.success(result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');

                    showCategory()
                }
            });
        });
    });
    showProductType()
    $('body').on('click', '.editProductType', function () {
        $('.error').hide();
        /* Act on the event */
        let id = $(this).data('id');
        update_id = id;
        //edit
        $.ajax({
            url: 'admin/productType/' + id + '/edit',
            type: 'get',
            dataType: 'json',
            success: function (result) {
                $('.name').val(result.productType.name);
                $('.id-product-type').val(result.productType.id);
                $('.title').text(result.productType.name);
                $('.idCategory').empty();
                $.each(result.category.data, function (key, value) {
                    if (value['id'] == result.productType.id_category) {
                        var option = `<option value="` + value['id'] + `" selected>` + value['name'] + `</option>`
                        $('.idCategory').append(option)
                    } else {
                        var option = `<option value="` + value['id'] + `">` + value['name'] + `</option>`
                        $('.idCategory').append(option)
                    }
                });
                $('.status').val(result.productType.status);
            }
        });
    });
    $('.updateProductType').click(function (event) {
        $.ajax({
            url: 'admin/productType/' + update_id,
            type: 'put',
            dataType:'json',
            data: $('#ProductTypeForm').serialize(),
            success: function (result) {
                toastr.success(result.success, 'Sửa thành công', {timeOut: 5000});
                $('#edit').modal('hide');

                showProductType()
            },
            error: function (data) {
                let error = $.parseJSON(data.responseText);

                if (error.errors.name != " ") {
                    $('.error').show();
                    $('.error').text(error.errors.name);
                }
            }
        })
    });
    $('body').on('click', '.deleteProductType', function (event) {
        let id = $(this).data('id');
        $('.xoa').click(function (event) {
            $.ajax({
                url: 'admin/productType/' + id,
                type: 'delete',
                dataType:'json',
                success: function (result) {
                    toastr.success(result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');

                    showProductType()
                },
            })
        });
    });

});