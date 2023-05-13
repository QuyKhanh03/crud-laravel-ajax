<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row py-5">
            <div class="card">
                <div class="card-header row">
                    <div class="col">
                        <h2>Product List</h2>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-end btnAdd">Create a new</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Acction</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal" id="modalView">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Name : <b id="name"></b></label>
                    </div>
                    <div class="mb-3">
                        <label for="">Email : <b id="email"></b></label>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger close">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close close"></button>
                </div>

                <!-- Modal body -->
                <form id="formModal">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control name" id="name"
                                placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control email" id="email"
                                placeholder="Enter email">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btnSave">Save</button>
                </form>
                <button type="button" class="btn btn-danger close">Close</button>
            </div>

        </div>
    </div>



    </div>

    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script> --}}

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
