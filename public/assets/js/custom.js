$(document).ready(function () {
    $('#myTable').DataTable({
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
        $('#myModal').modal('show')
        $('.modal-title').text('Add New User')
        $('#formModal')[0].reset()
    })
    $('.close').click(function () {
        $('#myModal').modal('hide')
    })


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
                $('#id').val(response.id)
                $('#name').val(response.name)
                $('#email').val(response.email)
            }
        })
    })
    $('body').on('click', '.btnSave', function (e) {
        e.preventDefault()
        var id = $('#id').val()
        let user_url;
        if(id) {
            // url = "http://127.0.0.1:8000/update-user/" + id + "
        }else {
            user_url = '{{ url("add-user") }}'
        }
        console.log(user_url);
        $.ajax({
            url : user_url,
            type : 'POST',
            data : $('#formModal').serialize(),
            dataType : 'json',
            success : function (response) {
                console.log(response);
                console.log(url);
                // if(response.success) {
                //     toastr["success"](response.success)
                //     $('#myModal').modal('hide')
                //     $('#myTable').DataTable().ajax.reload()
                // }
            }
        })
    })

})
