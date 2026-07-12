<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    @extends('Layouts.Adminlayouts')

    @section('content')
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="fw-bold">
                    <i class="bi bi-book"></i> Books Management
                </h2>

                <button class="btn btn-success">
                    <i class="bi bi-plus-circle"></i>
                    Add New Book
                </button>

            </div>
            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header bg-success text-white">

                    <h5 class="mb-0">
                        <i class="bi bi-plus-circle"></i>
                        Add New Book
                    </h5>

                </div>

                <div class="card-body">

                    <form>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Book Name</label>

                                <input type="text" class="form-control" placeholder="Enter Book Name">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Author</label>

                                <input type="text" class="form-control" placeholder="Author Name">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Category</label>

                                <select class="form-select">

                                    <option>Select Category</option>

                                    <option>Novel</option>

                                    <option>Fantasy</option>

                                    <option>History</option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Price</label>

                                <input type="number" class="form-control" placeholder="Book Price">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label class="form-label">Book Image</label>

                                <input type="file" class="form-control">

                            </div>

                            <div class="col-md-12 mb-3">

                                <label class="form-label">Description</label>

                                <textarea class="form-control" rows="5" placeholder="Book Description"></textarea>

                            </div>

                        </div>

                        <button class="btn btn-success">

                            <i class="bi bi-save"></i>

                            Save Book

                        </button>

                    </form>

                </div>

            </div>

            <!-- Books Table -->
            <div class="card shadow border-0">

                <div class="card-body">

                    <table class="table table-hover align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>1</td>

                                <td>
                                    <img src="{{ asset('images/slide1.png') }}" width="60" class="rounded">
                                </td>

                                <td>Harry Potter</td>

                                <td>Fantasy</td>

                                <td>J. K. Rowling</td>

                                <td>$25</td>

                                <td>

                                    <button class="btn btn-primary btn-sm">
                                        Edit
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
