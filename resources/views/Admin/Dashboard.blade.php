 @extends('Layouts.Adminlayouts')

 @section('content')
     <style>
         /* Sidebar */
         #sidebar {
             width: 250px;
             height: 100vh;
             position: fixed;
             top: 0;
             left: 0;
             background: #111;
             overflow-y: auto;
             transition: all 0.3s ease;
             z-index: 1000;
         }

         /* Sidebar Hide */
         #sidebar.active {
             left: -250px;
         }

         /* Page Content */
         .page-content {
             margin-left: 250px;
             min-height: 100vh;
             display: flex;
             flex-direction: column;
             background: #f8f9fa;
             transition: all 0.3s ease;
         }

         /* Page Content Full Width */
         #sidebar.active+.page-content {
             margin-left: 0;
         }

         /* Main Content */
         .content {
             flex: 1;
             padding: 20px;
         }

         /* Footer */
         footer {
             background: #212529;
             color: #fff;
             text-align: center;
             padding: 15px;
             border-top: 1px solid #444;
             margin-top: auto;
         }

         footer p {
             margin: 0;
             font-size: 15px;
         }
     </style>



     <div class="container-fluid">

         <!-- Welcome Card -->

         <div class="card border-0 shadow rounded-4 mb-4">

             <div class="card-body p-5">

                 <div class="row align-items-center">

                     <div class="col-lg-8">



                         <h2 class="fw-bold mt-3">

                             Hello Admin

                         </h2>

                         <p class="text-secondary fs-5">

                             Welcome to your E-Book Management Dashboard.

                             Manage books, categories, authors, competitions and much more from one place.

                         </p>

                     </div>

                     <div class="col-lg-4 text-center">

                         <img src="{{ asset('images/bookhome.avif') }}" class="img-fluid" style="max-height:220px;">

                     </div>

                 </div>

             </div>

         </div>

     </div>

     <div class="row g-4 mb-4">

         <div class="col-lg-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body d-flex justify-content-between align-items-center">

                     <div>

                         <small class="text-muted">Books</small>

                         <h2 class="fw-bold">{{ $totalBooks }}</h2>

                     </div>

                     <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                         <i class="bi bi-book fs-2 text-primary"></i>

                     </div>

                 </div>

             </div>

         </div>

         <div class="col-lg-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body d-flex justify-content-between align-items-center">

                     <div>

                         <small class="text-muted">Orders</small>

                         <h2 class="fw-bold">{{ $totalOrders }}</h2>

                     </div>

                     <div class="bg-success bg-opacity-10 rounded-circle p-3">

                         <i class="bi bi-cart-check fs-2 text-success"></i>

                     </div>

                 </div>

             </div>

         </div>

         <div class="col-lg-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body d-flex justify-content-between align-items-center">

                     <div>

                         <small class="text-muted">Pending</small>

                         <h2 class="fw-bold">{{ $pendingOrders }}</h2>

                     </div>

                     <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                         <i class="bi bi-clock-history fs-2 text-warning"></i>

                     </div>

                 </div>

             </div>

         </div>

         <div class="col-lg-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body d-flex justify-content-between align-items-center">

                     <div>

                         <small class="text-muted">Revenue</small>

                         <h2 class="fw-bold">

                             Rs {{ number_format($totalRevenue) }}

                         </h2>

                     </div>

                     <div class="bg-danger bg-opacity-10 rounded-circle p-3">

                         <i class="bi bi-cash-stack fs-2 text-danger"></i>

                     </div>

                 </div>

             </div>

         </div>

     </div>

     <div class="row g-4 mb-4">

         <div class="col-lg-6">

             <div class="card border-0 shadow rounded-4">

                 <div class="card-body">

                     <h5 class="fw-bold mb-3">

                         Quick Statistics

                     </h5>

                     <div class="d-flex justify-content-between mb-3">

                         <span>Total Categories</span>

                         <strong>{{ $totalCategories }}</strong>

                     </div>

                     <div class="d-flex justify-content-between mb-3">

                         <span>Total Authors</span>

                         <strong>{{ $totalAuthors }}</strong>

                     </div>

                     <div class="d-flex justify-content-between">

                         <span>Completed Orders</span>

                         <strong class="text-success">

                             {{ $completedOrders }}

                         </strong>

                     </div>

                 </div>

             </div>

         </div>
         <div class="col-lg-6">

             <div class="card border-0 shadow rounded-4">

                 <div class="card-body">

                     <h5 class="fw-bold mb-3">

                         Recent Orders

                     </h5>

                     @foreach ($recentOrders as $order)
                         <div class="d-flex justify-content-between align-items-center border-bottom py-2">

                             <div>

                                 <strong>

                                     {{ $order->name }}

                                 </strong>

                                 <br>

                                 <small class="text-muted">

                                     {{ $order->created_at->format('d M Y') }}

                                 </small>

                             </div>

                             <div>

                                 <span class="badge bg-success">

                                     Rs {{ number_format($order->total_amount) }}

                                 </span>

                             </div>

                         </div>
                     @endforeach

                 </div>

             </div>

         </div>

     </div>


     <div class="card border-0 shadow rounded-4">

         <div class="card-body">

             <h4 class="fw-bold mb-4">

                 Recent Orders

             </h4>

             <table class="table table-hover">

                 <thead>

                     <tr>

                         <th>ID</th>

                         <th>Customer</th>

                         <th>Total</th>

                         <th>Status</th>

                     </tr>

                 </thead>

                 <tbody>

                     @foreach ($recentOrders as $order)
                         <tr>

                             <td>

                                 #{{ $order->id }}

                             </td>

                             <td>

                                 {{ $order->name }}

                             </td>

                             <td>

                                 Rs {{ number_format($order->total_amount) }}

                             </td>

                             <td>

                                 {{ ucfirst($order->status) }}

                             </td>

                         </tr>
                     @endforeach

                 </tbody>

             </table>

         </div>

     </div>

     <!-- Statistics Cards -->
     <style>
         .text-purple {

             color: #7B2CBF;

         }

         .dashboard-card {

             transition: .3s;

         }

         .dashboard-card:hover {

             transform: translateY(-8px);

             box-shadow: 0 20px 40px rgba(0, 0, 0, .12) !important;

         }
     </style>
     <div class="row g-4 mt-2">

         <!-- Books -->

         <div class="col-xl-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body p-4">

                     <div class="d-flex justify-content-between align-items-center">

                         <div>

                             <small class="text-secondary">
                                 Total Books
                             </small>

                             <h2 class="fw-bold mt-2">
                                 150
                             </h2>

                             <span class="text-success fw-semibold">
                                 <i class="bi bi-arrow-up"></i> +12%
                             </span>

                         </div>

                         <div class="rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px;height:70px;background:#E8F8F6;">

                             <i class="bi bi-book fs-2" style="color:#008186;"></i>

                         </div>

                     </div>

                 </div>

             </div>

         </div>

         <!-- Categories -->

         <div class="col-xl-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body p-4">

                     <div class="d-flex justify-content-between align-items-center">

                         <div>

                             <small class="text-secondary">
                                 Categories
                             </small>

                             <h2 class="fw-bold mt-2">
                                 18
                             </h2>

                             <span class="text-success fw-semibold">
                                 <i class="bi bi-arrow-up"></i> +5%
                             </span>

                         </div>

                         <div class="rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px;height:70px;background:#FFF6DD;">

                             <i class="bi bi-grid fs-2 text-warning"></i>

                         </div>

                     </div>

                 </div>

             </div>

         </div>

         <!-- Authors -->

         <div class="col-xl-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body p-4">

                     <div class="d-flex justify-content-between align-items-center">

                         <div>

                             <small class="text-secondary">
                                 Authors
                             </small>

                             <h2 class="fw-bold mt-2">
                                 32
                             </h2>

                             <span class="text-success fw-semibold">
                                 <i class="bi bi-arrow-up"></i> +8%
                             </span>

                         </div>

                         <div class="rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px;height:70px;background:#EAF3FF;">

                             <i class="bi bi-people fs-2 text-primary"></i>

                         </div>

                     </div>

                 </div>

             </div>

         </div>

         <!-- Users -->

         <div class="col-xl-3 col-md-6">

             <div class="card border-0 shadow rounded-4 h-100">

                 <div class="card-body p-4">

                     <div class="d-flex justify-content-between align-items-center">

                         <div>

                             <small class="text-secondary">
                                 Users
                             </small>

                             <h2 class="fw-bold mt-2">
                                 540
                             </h2>

                             <span class="text-success fw-semibold">
                                 <i class="bi bi-arrow-up"></i> +25%
                             </span>

                         </div>

                         <div class="rounded-circle d-flex justify-content-center align-items-center"
                             style="width:70px;height:70px;background:#F3EAFF;">

                             <i class="bi bi-person-check fs-2 text-purple"></i>

                         </div>

                     </div>

                 </div>

             </div>

         </div>

     </div>


     <!-- Footer Start -->

     <!-- Footer End -->
     <script>
         const toggleBtn = document.getElementById("toggleBtn");
         const sidebar = document.getElementById("sidebar");

         toggleBtn.addEventListener("click", function() {
             sidebar.classList.toggle("active");
         });
     </script>
 @endsection
