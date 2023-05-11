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


    $('.btnAdd').click(function () {
        $('#myModal').modal('show')

    })
    $('.close').click(function () {
        $('#myModal').modal('hide')
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
})
