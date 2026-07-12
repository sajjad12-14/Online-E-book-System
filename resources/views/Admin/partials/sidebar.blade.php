 <!-- Sidebar Hover Style -->
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
 </head>
 <!-- Sidebar -->

 <style>
     .nav-link {

         transition: .3s;

     }

     .nav-link:hover {

         background: #ffffff;

         color: #008186 !important;

         padding-left: 25px;

         box-shadow: 0 8px 20px rgba(0, 0, 0, .15);

     }
 </style>

 <body>
     <div class="d-flex flex-column flex-shrink-0 text-white shadow-lg"
         style="width:280px;min-height:100vh;background:#008186;">

         <!-- Logo -->
         <div class="text-center py-4 border-bottom border-light">

             <h3 class="fw-bold mb-0">
                 <i class="bi bi-book-half me-2"></i>
                 E-Book
             </h3>

             <small class="text-white-50">
                 Admin Panel
             </small>

         </div>

         <!-- Profile -->

         <div class="text-center py-4">

             <img src="{{ asset('images/Author/author9.jpg') }}"
                 class="rounded-circle border border-3 border-white shadow"
                 style="width:90px;height:90px;object-fit:cover;">

             <h5 class="mt-3 mb-1">
                 Admin
             </h5>

             <small class="text-white-50">

                 Sajjad HUsssain

             </small>

         </div>

         <!-- Menu -->

         <ul class="nav nav-pills flex-column px-3">


             <li class="nav-item mb-2">

                 <a href=" {{ route('admin.dashboard') }}"
                     class="nav-link text-white rounded-3 py-3 px-3
                    {{ request()->is('admin/dashboard') ? 'active-menu' : '' }}">

                     <i class="bi bi-grid me-3"></i>

                     Dashboard

                 </a>

             </li>
             <li class="nav-item mb-2">

                 <a href="{{ route('admin.books') }}"
                     class="nav-link text-white rounded-3 py-3 px-3 {{ request()->routeIs('Admin.Books') ? 'active-menu' : '' }}">

                     <i class="bi bi-book me-3"></i>
                     Books

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="/admin/categories"
                     class="nav-link text-white rounded-3 py-3 px-3
               {{ request()->routeIs('admin.categories') ? 'active-menu' : '' }}">

                     <i class="bi bi-grid me-3"></i>

                     Categories

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="/admin/authors" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-people me-3"></i>

                     Authors

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="/admin/hero-slider" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-images me-3"></i>

                     Hero Slider

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="#" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-trophy me-3"></i>

                     Competitions

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="{{ route('admin.orders') }}" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-cart-check me-3"></i>

                     Orders

                 </a>

             </li>

             <li class="nav-item mb-2">

                 <a href="#" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-chat-left-text me-3"></i>

                     Messages

                 </a>

             </li>
             <li class="nav-item mb-2">
                 <a href="{{ route('admin.competition.submissions') }}" class="nav-link text-white rounded-3 py-3 px-3">
                     <i class="bi bi-file-earmark-text"></i>
                     Competition Submissions
                 </a>
             </li>
             <li class="nav-item  mb-2  ">
                 <a href="{{ route('admin.contacts') }}" class="nav-link text-white rounded-3 py-3 px-3">
                     <i class="bi bi-envelope-fill"></i>
                     <span>Contact Messages</span>
                 </a>
             </li>

             <li class="nav-item mb-2">

                 <a href="#" class="nav-link text-white rounded-3 py-3 px-3">

                     <i class="bi bi-gear me-3"></i>

                     Settings

                 </a>

             </li>

         </ul>

         <!-- Bottom -->

         <div class="mt-auto p-3 border-top border-light">

             <form action="{{ route('admin.logout') }}" method="POST">
                 @csrf

                 <button type="submit" class="btn btn-light w-100 rounded-pill fw-bold">
                     <i class="bi bi-box-arrow-right me-2"></i>
                     Logout
                 </button>

             </form>

         </div>

     </div>
 </body>

 </html>
