<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<style>
    <style>.pagination {
        margin: 0;
    }

    .pagination .page-item {
        margin: 0 3px;
    }

    .pagination .page-link {

        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        border: 1px solid #dee2e6;

        color: #5f6368;
        background: #fff;

        font-weight: 500;

        transition: .2s;

    }

    .pagination .page-link:hover {

        background: #f1f3f4;
        color: #202124;

    }

    .pagination .page-item.active .page-link {

        background: #1a73e8;
        color: #fff;
        border-color: #1a73e8;

    }

    .pagination .page-item.disabled .page-link {

        color: #bdbdbd;
        background: #fff;

    }
</style>
</style>

<body style="background:#b8cce1;">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow"
            id="flashMsg" style="z-index:9999;">

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    <div class="d-flex">

        <!-- Sidebar -->
        @include('Admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column min-vh-100">

            <!-- Header -->
            @include('Admin.partials.header')

            <!-- Page Content -->
            <main class="flex-grow-1 p-4">

                @yield('content')

            </main>


            @include('Admin.partials.footer')

        </div>

    </div>

    <script>
        setTimeout(function() {

            let msg = document.getElementById('flashMsg');

            if (msg) {

                msg.style.transition = "0.5s";

                msg.style.opacity = "0";

                setTimeout(function() {

                    msg.remove();

                }, 500);

            }

        }, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
