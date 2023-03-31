<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Line Icon --}}
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <title>Ajax Crud</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h2 class="text-center mt-5 mb-3">Product Ajax Crud</h2>
                <br>
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add <i class="las la-plus" style="font-size: 22px;"></i>
                </button>

            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <a href="" class="btn btn-primary pr-2 " style="font-size: 18px;"><i
                                        class="lar la-edit"></i></a>
                                <a href="" class="btn btn-danger "><i class="las la-times-circle"
                                        style="font-size: 23px;"></i></a>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>





    @include('Product_js')



    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLable" aria-hidden="true">
        <form action="" method="post" id="addProductForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLable">Create Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="errmsgcontainer mb-3">

                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control mb-2" id="name"
                                placeholder="product Name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control mb-2" id="price"
                                placeholder="product price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_product">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



</body>

</html>
