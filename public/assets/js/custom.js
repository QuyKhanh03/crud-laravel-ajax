$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#myTable').DataTable({
        processing : true,
        serverSide : true,
        ajax : 'list-users',
        columns : [
            {data : 'id', name : 'id'},
            {data : 'name', name : 'name'},
            {data : 'email', name : 'email'},
            {data : 'action', name : 'action', orderable : false, searchable : false}
        ]
    })
    $('body').on('click', '.removeItem', function (e) {
        var id = $(this).attr('data-id')
        $.ajax({
            url : 'delete-user/' + id,
            type : 'GET',
            dataType : 'json',
            success : function (response) {
                toastr["success"](response.success)
                $('#myTable').DataTable().ajax.reload()
            }
        })
    })

    $('body').on('click', '.viewItem', function (e) {
        var id = $(this).attr('data-id')
        $('.modal-title').text('Detail User')
        $('#modalView').modal('show')
        $.ajax({
            url : 'view-user/' + id,
            type : 'GET',
            dataType : 'json',
            success : function (response) {
                $('#name').text(response.name)
                $('#email').text(response.email)
            }
        })
    })
    $('.close').click(function () {
        $('#modalView').modal('hide')
    })

    $('.btnAdd').click(function () {
        $('#id').val('')
        $('#myModal').modal('show')
        $('#formModal')[0].reset();
        $('.modal-title').html('Add New User')
    })
    $('.close').click(function () {
        $('#myModal').modal('hide')
        $('#formModal')[0].reset()
    })
    if($('#myModal').modal('hide')) {
        $('#formModal')[0].reset()
    }


    $('body').on('click', '.editItem', function (e) {
        $('#formModal')[0].reset()
        $('#myModal').modal('show')
        $('.modal-title').text('Edit User')
        var id = $(this).attr('data-id')
        $.ajax({
            url : 'edit-user/' + id,
            type : 'GET',
            dataType : 'json',
            success : function (response) {
                $('.name').val(response.name)
                $('.email').val(response.email)
                $('.id').val(response.id)
            }
        })
    })

    $('body').on('click', '.btnSave', function (e) {
        e.preventDefault()
        let id = $('#id').val()
        let user_url;
        if(id) {
            user_url = '/update-user/' + id ;
        }else {
            user_url = "/add-user";
        }
        $.ajax({
            url : user_url,
            type : 'POST',
            data : $('#formModal').serialize(),
            dataType : 'json',
            success : function (response) {
                toastr["success"](response.success)
                    $('#formModal').trigger("reset");
                    $('#myModal').modal('hide')
                    table.draw()
            },
            error : function (response) {
                $.each(response.responseJSON.errors, function (key, value) {
                    toastr["error"](value)
                    $('[name = "'+key+'"]').after('<span class="text-danger">'+value+'</span>')
                })
            }
        })
    })
})

