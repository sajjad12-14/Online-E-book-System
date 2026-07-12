  </html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <style>
      .hero-img {
          animation: floatBook 4s ease-in-out infinite;
          filter: drop-shadow(0 15px 25px rgba(0, 0, 0, .25));
      }

      .hero-img:hover {
          transform: scale(1.05);
          transition: .4s;
      }

      @keyframes floatBook {

          0% {
              transform: translateY(0px);
          }

          50% {
              transform: translateY(-20px);
          }

          100% {
              transform: translateY(0px);
          }

      }


      .hover-shadow {
          transition: 1.3s;
      }

      .hover-shadow:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 1px rgba(0, 0, 0, 0.2);
      }

      .product-card {
          transition: all 0.3s ease;
          border-radius: 15px 12px 12px 12px;
      }

      .product-card:hover {
          transform: translateY(-1px) scale(1.02);
          box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2) !important;
          border-radius: 15px 12px 12px 12px;

      }



      /* Button animation */
      .product-card .btn {
          transition: 0.3s;
      }

      .product-card .btn:hover {
          transform: scale(1.05);
      }

      /* Smooth fade-in effect */
      @keyframes fadeUp {
          from {
              opacity: 0;
              transform: translateY(15px);
          }

          to {
              opacity: 1;
              transform: translateY(0);
          }
      }

      .product-card {
          animation: fadeUp 0.6s ease-in-out;
      }
  </style>


  <body>

  </html>@extends('Layouts.Userslayouts')

  @section('content')


      <!-- Hero Slider -->
      @if ($sliders->count() > 0)
          <div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">



              <div class="carousel-inner">



                  @foreach ($sliders as $key => $slider)
                      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">



                          <section class="d-flex align-items-center min-vh-100"
                              style="background: {{ $slider->bg_color ?? '#008186' }};">



                              <div class="container">

                                  <div class="row align-items-center">



                                      <div class="col-lg-8 text-center text-lg-start">



                                          <h1 class="display-3 fw-bold text-uppercase text-white lh-1 mb-4">

                                              {{ $slider->title }}

                                          </h1>



                                          <p class="text-white fs-4 mb-5">

                                              {{ $slider->description }}

                                          </p>



                                          <a href="{{ $slider->button_link ?? '#' }}"
                                              class="btn rounded-pill btn-dark btn-lg px-5 py-3 fw-bold fs-4">



                                              {{ $slider->button_text ?? 'Explore Now' }}

                                              <i class="fa-solid fa-arrow-right ms-2"></i>

                                          </a>



                                      </div>


                                      <div class="col-lg-4 text-center">

                                          <img src="{{ asset('uploads/hero_slider/' . $slider->image) }}"
                                              class="img-fluid w-100 hero-img" style="height:450px; object-fit:contain;"
                                              alt="Book">

                                      </div>



                                  </div>

                              </div>



                          </section>



                      </div>
                  @endforeach



              </div>



          </div>
      @else
          <p class="text-center">No sliders found</p>
      @endif
      <!-- =====================Our most popular books===================== -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide pt-5 pb-1" data-bs-ride="carousel"
          data-bs-interval="4000" style="background:#F5EFE6">
          <!-- Heading -->

          <div class="text-center mb-5">

              <h1 class="display-4 fw-bold text-uppercase   lh-1 mb-4">
                  Our most popular books
              </h1>

              <p class="text-secondary">
                  Explore our best-selling and reader-favorite books, chosen for their inspiring stories, valuable <br>
                  knowledge, and unforgettable reading experience. Find your next favorite book today.
              </p>

              <a href="{{ route('popular.books') }}" class="btn btn-dark btn-lg rounded-pill px-5">

                  Explore Collection

              </a>



          </div>

          <div class="carousel-inner">

              @foreach ($popularBooks as $books)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">

                      <section class="d-block w-100">

                          <div class="container">
                              <div class="row g-4 justify-content-center">

                                  @foreach ($books as $book)
                                      <div class="col-lg-3 col-md-6 mb-4">
                                          <div class="card border-0 shadow-sm h-100 product-card ">

                                              <!-- Book Image -->
                                              <div class="text-center p-3 bg-light ">

                                                  <img src="{{ asset('uploads/books/' . $book->image) }}"
                                                      class="img-fluid  rounded-4"
                                                      style="height:220px; object-fit:contain;">

                                              </div>

                                              <!-- Card Body -->
                                              <div class="card-body text-center">

                                                  <small class="text-muted">
                                                      {{ $book->category->name ?? '' }}
                                                  </small>

                                                  <h6 class="fw-bold mt-1">
                                                      {{ $book->title }}
                                                  </h6>

                                                  <small class="text-secondary">
                                                      By {{ $book->author->name ?? '' }}
                                                  </small>


                                                  <div class="mb-3">

                                                      <span class="fw-bold text-success fs-5">
                                                          Rs {{ $book->discount_price ?? $book->price }}
                                                      </span>

                                                      @if ($book->discount_price)
                                                          <div>
                                                              <del class="text-muted">
                                                                  Rs {{ $book->price }}
                                                              </del>
                                                          </div>
                                                      @endif

                                                  </div>

                                                  <!-- Buttons -->
                                                  <a href="{{ route('book.details', $book->slug) }}"
                                                      class="btn btn-dark btn-sm w-100 mb-2 rounded-pill">
                                                      View Details
                                                  </a>

                                                  <a href="{{ route('cart.add', $book->id) }}"
                                                      class="btn btn-outline-success btn-sm w-100 rounded-pill">

                                                      <i class="bi bi-cart-plus me-2"></i>

                                                      Add To Cart

                                                  </a>


                                              </div>

                                          </div>

                                      </div>
                                  @endforeach

                              </div>

                          </div>

                      </section>

                  </div>
              @endforeach


          </div>

      </div>

      <!-- ===================== Why Choose Our  E-Book System?===================== -->
      <section class="py-5" style="background-color: #EEF8F7;">
          <div class="container">

              <div class="text-center mb-5">

                  <h1 class="display-4 fw-bold text-uppercase   lh-1 mb-4">
                      Why Choose Our <br> E-Book System?
                  </h1>
                  <p class="text-secondary">
                      Our platform offers a fast, user-friendly, and reliable reading experience. Find your favorite
                      books,<br> explore new collections, and enjoy high-quality digital content with ease.
                  </p>
              </div>

              <div class="row align-items-center">

                  <!-- Left Side -->
                  <div class="col-lg-3">

                      <div class="mb-5">
                          <div class="mb-3">
                              <i class="bi bi-patch-check-fill " style="font-size:45px;  color:#008186"></i>
                          </div>

                          <h3 class="fw-bold  fs-3">
                              Best Quality
                          </h3>

                          <p class="text-secondary fs-5">
                              Enjoy high-quality e-books with a smooth and comfortable reading experience.
                          </p>
                      </div>

                      <div>
                          <div class="mb-3">
                              <i class="bi bi-book-half  " style="font-size:45px;  color:#008186"></i>
                          </div>

                          <h3 class="fw-bold  fs-3">
                              Simple to Master
                          </h3>

                          <p class="text-secondary fs-5">
                              Easy navigation helps every reader find and enjoy books effortlessly.
                          </p>
                      </div>

                  </div>

                  <!-- Center Image -->
                  <div class="col-lg-6 text-center my-4 my-lg-0">

                      <img src="{{ asset('images/books.png') }}" class="img-fluid rounded"
                          style="width:100%; height:520px; object-fit:cover;">

                  </div>

                  <!-- Right Side -->
                  <div class="col-lg-3">

                      <div class="mb-5">
                          <div class="mb-3">
                              <i class="bi bi-file-earmark-text-fill" style="font-size:45px; color:#008186;"></i>
                          </div>

                          <h3 class="fw-bold   fs-3">
                              Manuscript Style
                          </h3>

                          <p class="text-secondary fs-5">
                              Beautiful layouts give every digital book the feel of a printed edition.
                          </p>
                      </div>

                      <div>
                          <div class="mb-3">
                              <i class="bi bi-bookmark-heart-fill  " style="font-size:45px;  color:#008186"></i>
                          </div>

                          <h3 class="fw-bold fs-3">
                              Fast and Welcoming
                          </h3>

                          <p class="text-secondary fs-5">
                              Browse thousands of books quickly with a clean and user-friendly interface.
                          </p>
                      </div>

                  </div>

              </div>

          </div>
      </section>
      <!-- =====================Our most popular books===================== -->
      <section class="py-5" style="background:#FDF8F3;">

          <div class="container">

              <div class="row align-items-center">

                  <!-- Left -->

                  <div class="col-lg-6">

                      <h1 class="display-4 fw-bold text-uppercase   mt-4  lh-1 mb-4">
                          Best Selling <br>
                          Books
                      </h1>

                      <p class="text-secondary fs-5 mt-4">

                          Explore our best-selling books loved by readers around the world.
                          Discover inspiring novels, educational resources, timeless classics,
                          and unforgettable stories that deserve a place in your library.

                      </p>

                      <div class="mt-4">

                          <a href="{{ route('best.selling.books') }}" class="btn btn-dark btn-lg rounded-pill px-5">

                              Explore Collection

                          </a>


                      </div>

                  </div>

                  <!-- Right -->

                  <div class="col-lg-6 text-center">

                      <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                          class="img-fluid" style="height:500px; object-fit:contain;">

                  </div>

              </div>


          </div>

      </section>
      <!-- ===================== Get 50% OFF On Your First Book Order!===================== -->
      <section class="py-1">

          <div class="  py-1">
              <div class="mx-2 mx-md-3 mx-lg-4 my-3 my-lg-4 rounded-4 shadow-lg overflow-hidden position-relative"
                  style="
                       background:url('{{ asset('images/discount-banner.jpg') }}') center center/cover no-repeat;
                       min-height:400px;
                ">

                  <!-- Overlay -->

                  <div class="position-absolute top-0 start-0 w-100 h-100  "></div>

                  <!-- Content -->

                  <div class="position-relative h-90  ">

                      <div class="row align-items-center justify-content-end px-5" style="min-height:550px;">

                          <div class="col-lg-5 text-white">


                              <h1 class="display-3 fw-bold text-uppercase lh-1">

                                  Get 50% OFF

                                  On Your First

                                  Book Order!

                              </h1>

                              <p class="fs-5 mt-4">

                                  Discover thousands of inspiring books and enjoy an
                                  exclusive <strong>50% discount</strong> on your first purchase.
                                  Start your reading journey today.

                              </p>

                              <div class="mt-4">

                                  <a href="#" class="btn text-white btn-lg rounded-pill px-5"
                                      style="background:#008186;">

                                      Shop Now

                                  </a>

                                  <a href="{{ route('offer.books') }}" class="btn btn-dark btn-lg rounded-pill px-5">

                                      Claim 50% OFF

                                  </a>

                              </div>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </section>
      <!-- =====================  Story Writing Competition===================== -->

      <section class="py-5" style="background:#E8F5E9">
          <div class="container">

              <div class="row align-items-center">

                  <!-- Left Side -->
                  <div class="col-lg-6">



                      <h1 class="display-4 fw-bold text-uppercase mt-3 lh-1 mb-4">
                          Story Writing <br>
                          Competition
                      </h1>

                      <p class="text-secondary fs-5 mt-4">
                          Unleash your imagination and bring your stories to life.
                          Participate in our exciting story writing competition,
                          share your unique ideas, and inspire readers with your creativity.
                          The most original and engaging stories will be selected and
                          featured on our platform with amazing rewards.
                      </p>



                      <!-- Button -->
                      <div class="mt-4">
                          <a href="{{ route('competitions') }}" class="btn btn-dark btn-lg rounded-pill px-5">

                              Participate Now

                          </a>

                      </div>

                  </div>

                  <!-- Right Side -->
                  <div class="col-lg-6 text-center">

                      <img src="{{ asset('images/story-writing.png') }}" class="img-fluid rounded-4 shadow"
                          style="max-height:500px; object-fit:cover;">

                  </div>

              </div>



          </div>
      </section>
      <!-- ===================== Competition Winners ===================== -->

      <section class="py-5" style="background:#FFF3E0">

          <div class="container py-5">


              <div class="text-center mb-5">

                  <h1 class="display-4 fw-bold text-uppercase lh-1 mb-4">
                      Competition Winners
                  </h1>


                  <p class="text-secondary">
                      Congratulations to our latest competition winners for their
                      <br>
                      outstanding achievements and passion for reading.
                  </p>

              </div>



              <div class="row">


                  @forelse($winners as $winner)
                      <div class="col-lg-4 col-md-6 mb-4">


                          <div class="card border-0 shadow text-center p-4">


                              <img src="{{ $winner->image ? asset('uploads/submissions/' . $winner->image) : asset('images/default-user.png') }}"
                                  class="rounded-circle mx-auto" style="width:120px;height:120px;object-fit:cover;">



                              <h4 class="mt-3 fw-bold">

                                  {{ $winner->name }}

                              </h4>



                              <p class="text-secondary">

                                  @if ($winner->winner_position == 1)
                                      1st Position
                                  @elseif($winner->winner_position == 2)
                                      2nd Position
                                  @elseif($winner->winner_position == 3)
                                      3rd Position
                                  @endif

                              </p>



                              <a href="{{ route('winner.profile', $winner->id) }}" class="btn btn-dark rounded-pill">
                                  View Profile
                              </a>


                          </div>


                      </div>


                  @empty


                      <div class="col-12 text-center">

                          <h5 class="text-secondary">
                              No Winners Announced Yet
                          </h5>

                      </div>
                  @endforelse



              </div>


          </div>


      </section>
      <!-- ===================== Upcoming Competition===================== -->
      <section class="py-5" style="background:#EEF8F7;">

          <div class="container">

              <div class="row align-items-center shadow rounded-4 bg-white p-5">

                  <!-- Left Side -->

                  <div class="col-lg-7">



                      <h1 class="fw-bold   mt-4 display-4   text-uppercase   lh-1 ">
                          Upcoming Competitions
                      </h1>

                      <p class="text-secondary fs-5 mt-3">

                          Registration is now open for our upcoming Story Writing Competition.
                          Write an original story within one hour and compete with talented
                          writers from around the community.

                      </p>

                      <div class="row mt-4">

                          <div class="col-6 mb-3">

                              <h6 class="fw-bold">📅 Competition Date</h6>

                              <p class="text-secondary">
                                  10 July 2026
                              </p>

                          </div>

                          <div class="col-6 mb-3">

                              <h6 class="fw-bold">⏰ Start Time</h6>

                              <p class="text-secondary">
                                  10:00 AM
                              </p>

                          </div>

                          <div class="col-6">

                              <h6 class="fw-bold">🕒 Duration</h6>

                              <p class="text-secondary">
                                  1 Hour
                              </p>

                          </div>

                          <div class="col-6">

                              <h6 class="fw-bold">🏆 Prize</h6>

                              <p class="text-secondary">
                                  $1000 + Winner Certificate
                              </p>

                          </div>

                      </div>

                      <div class="mt-4">

                          <a href="#"
                              class="btn btn-dark btn-lg rounded-pill px-5 d-block d-md-inline mb-3 mb-md-0">
                              Register Now
                          </a>

                          <a href="#"
                              class="btn btn-outline-dark btn-lg rounded-pill px-5 d-block d-md-inline ms-md-2">
                              Competition Details
                          </a>

                      </div>

                  </div>

                  <!-- Right Side -->

                  <div class="col-lg-5">

                      <div class="bg-dark text-white rounded-4 text-center p-4">

                          <h5 class="fw-bold">
                              ⏳ Competition Starts In
                          </h5>

                          <div class="row mt-4">

                              <div class="col-4">

                                  <h1 class="fw-bold">
                                      05
                                  </h1>

                                  <small>Days</small>

                              </div>

                              <div class="col-4">

                                  <h1 class="fw-bold">
                                      12
                                  </h1>

                                  <small>Hours</small>

                              </div>

                              <div class="col-4">

                                  <h1 class="fw-bold">
                                      30
                                  </h1>

                                  <small>Minutes</small>

                              </div>

                          </div>

                          <hr>

                          <p class="mb-0">

                              📢 Registration closes one day before the competition starts.

                          </p>

                      </div>

                  </div>

              </div>

          </div>

      </section>
      <!-- ========================= -->
      <!-- Featured Authors Section -->
      <!-- ========================= -->

      <section class="py-5" style="background:#FFF3E0;">

          <div class="container">

              <!-- Section Heading -->
              <div class="text-center mb-5">


                  <h2 class="fw-bold display-6">

                      Meet Our Best Authors

                  </h2>

                  <p class="text-muted mx-auto" style="max-width:650px;">

                      Discover talented writers behind our amazing collection of books.
                      Explore their stories, achievements and published books.

                  </p>

              </div>

              <div class="row g-4">

                  @forelse(($authors ?? collect()) as $author)
                      <div class="col-lg-3 col-md-6">

                          <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">

                              <!-- Top Background -->
                              <div style="height:90px;background:#008186;"></div>

                              <!-- Author Image -->
                              <div class="text-center">

                                  <img src="{{ asset('uploads/authors/' . $author->image) }}"
                                      class="rounded-circle border border-5 border-white shadow"
                                      style="width:130px;
                                   height:130px;
                                   object-fit:cover;
                                   margin-top:-65px;">

                              </div>

                              <!-- Card Body -->
                              <div class="card-body text-center">

                                  <span class="badge bg-light text-dark mb-2">

                                      Author

                                  </span>

                                  <h4 class="fw-bold">

                                      {{ $author->name }}

                                  </h4>

                                  <p class="text-muted small">

                                      {{ \Illuminate\Support\Str::limit($author->bio, 80) }}

                                  </p>

                                  <!-- Stats -->

                                  <div class="row text-center mt-4 mb-4">

                                      <div class="col-6">

                                          <h5 class="fw-bold text-success">

                                              {{ $author->books_count }}

                                          </h5>

                                          <small class="text-muted">

                                              Books

                                          </small>

                                      </div>

                                      <div class="col-6">

                                          <h5 class="fw-bold text-primary">

                                              Active

                                          </h5>

                                          <small class="text-muted">

                                              Status

                                          </small>

                                      </div>

                                  </div>

                                  <!-- Social -->

                                  <div class="d-flex justify-content-center gap-3 mb-4">

                                      <a href="#" class="text-dark fs-5">

                                          <i class="bi bi-facebook"></i>

                                      </a>

                                      <a href="#" class="text-dark fs-5">

                                          <i class="bi bi-instagram"></i>

                                      </a>

                                      <a href="#" class="text-dark fs-5">

                                          <i class="bi bi-twitter-x"></i>

                                      </a>

                                      <a href="#" class="text-dark fs-5">

                                          <i class="bi bi-linkedin"></i>

                                      </a>

                                  </div>

                                  <!-- Button -->

                                  <a href="#" class="btn text-white rounded-pill px-4" style="background:#008186;">

                                      <i class="bi bi-person me-2"></i>

                                      View Profile

                                  </a>

                              </div>

                          </div>

                      </div>

                  @empty

                      <div class="col-12">

                          <div class="alert alert-light border text-center">

                              No Authors Found.

                          </div>

                      </div>
                  @endforelse

              </div>

          </div>

      </section>

      <!-- ===================== Upcoming Competition===================== -->
      <section class="py-5" style="background:#EEF8F7;">

          <div class="container">

              <div class="row align-items-center">

                  <!-- Left Side -->

                  <div class="col-lg-6">


                      <h1 class="display-4 fw-bold mt-4">
                          We'd Love To Hear From You
                      </h1>

                      <p class="text-secondary fs-5 mt-3">

                          Have a question, feedback, or need assistance?
                          Our team is always ready to help you.
                          Get in touch with us and we'll respond as soon as possible.

                      </p>

                      <div class="mt-4">

                          <a href="#contact-form" class="btn text-white btn-lg rounded-pill px-5"
                              style="background:#008186;">

                              Send Message

                          </a>



                      </div>

                  </div>

                  <!-- Right Side -->

                  <div class="col-lg-6 text-center mt-5 mt-lg-0">
                      <img src="{{ asset('images/contact.png') }}"
                          class="img-fluid rounded-circle shadow-lg position-relative"
                          style="
                                   width:360px;
                                   height:360px;
                                  transform:rotate(-3deg);
                                   border:8px solid #008186;
                                   z-index:2;
                               ">

                  </div>

              </div>

          </div>

      </section>

      <!-- =====================Contact Cards ===================== -->

      <section class="py-5" style="background-color: #FAF3E0;">

          <div class="container">

              <div class="row g-4" id="contact">

                  <!-- Address -->

                  <div class="col-lg-6">

                      <div class="d-flex align-items-center bg-white shadow rounded-4 p-4 h-100">

                          <div class="rounded-circle d-flex justify-content-center align-items-center flex-shrink-0"
                              style="width:80px;height:80px;background:#008186;">

                              <i class="bi bi-geo-alt-fill text-white fs-2"></i>

                          </div>

                          <div class="ms-4">

                              <h4 class="fw-bold mb-2">
                                  Office Address
                              </h4>

                              <p class="text-secondary mb-0">
                                  123 Main Street, Karachi, Pakistan
                              </p>

                          </div>

                      </div>

                  </div>

                  <!-- Email -->

                  <div class="col-lg-6">

                      <div class="d-flex align-items-center bg-white shadow rounded-4 p-4 h-100">

                          <div class="rounded-circle d-flex justify-content-center align-items-center flex-shrink-0"
                              style="width:80px;height:80px;background:#008186;">

                              <i class="bi bi-envelope-fill text-white fs-2"></i>

                          </div>

                          <div class="ms-4">

                              <h4 class="fw-bold mb-2">
                                  Email Address
                              </h4>

                              <p class="text-secondary mb-0">
                                  support@ebook.com
                              </p>

                          </div>

                      </div>

                  </div>

                  <!-- Phone -->

                  <div class="col-lg-6">

                      <div class="d-flex align-items-center bg-white shadow rounded-4 p-4 h-100">

                          <div class="rounded-circle d-flex justify-content-center align-items-center flex-shrink-0"
                              style="width:80px;height:80px;background:#008186;">

                              <i class="bi bi-telephone-fill text-white fs-2"></i>

                          </div>

                          <div class="ms-4">

                              <h4 class="fw-bold mb-2">
                                  Phone Number
                              </h4>

                              <p class="text-secondary mb-0">
                                  +92 300 1234567
                              </p>

                          </div>

                      </div>

                  </div>

                  <!-- Office Hours -->

                  <div class="col-lg-6">

                      <div class="d-flex align-items-center bg-white shadow rounded-4 p-4 h-100">

                          <div class="rounded-circle d-flex justify-content-center align-items-center flex-shrink-0"
                              style="width:80px;height:80px;background:#008186;">

                              <i class="bi bi-clock-fill text-white fs-2"></i>

                          </div>

                          <div class="ms-4">

                              <h4 class="fw-bold mb-2">
                                  Office Hours
                              </h4>

                              <p class="text-secondary mb-0">
                                  Monday - Friday <br>
                                  09:00 AM - 06:00 PM
                              </p>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </section>

      <!-- =====================Contact Form===================== -->

      <section class="py-5  " style="background:#EEF8F7;">

          <div class="container">

              <div class="text-center mb-5" id="contact-form">



                  <h2 class="display-5 fw-bold mt-3">
                      Get In Touch
                  </h2>

                  <p class="text-secondary fs-5 col-lg-8 mx-auto">
                      We'd love to hear from you. Fill out the form below and our
                      team will get back to you as soon as possible.
                  </p>

              </div>

              <div class="row justify-content-center">

                  <div class="col-lg-10">

                      <div class="card border-0 shadow-lg rounded-4">

                          <div class="row g-0">

                              <!-- Left Side -->

                              <div class="col-lg-5 text-white rounded-start-4 d-flex align-items-center"
                                  style="background:#008186;">

                                  <div class="p-5">

                                      <h2 class="fw-bold mb-4">
                                          Let's Talk
                                      </h2>

                                      <p class="mb-4">
                                          Whether you have a question about books,
                                          competitions, orders, or anything else,
                                          our team is ready to answer all your questions.
                                      </p>

                                      <div class="mb-4">

                                          <h5>
                                              <i class="bi bi-envelope-fill me-2"></i>
                                              Email
                                          </h5>

                                          <p>
                                              support@ebook.com
                                          </p>

                                      </div>

                                      <div class="mb-4">

                                          <h5>
                                              <i class="bi bi-telephone-fill me-2"></i>
                                              Phone
                                          </h5>

                                          <p>
                                              +92 300 1234567
                                          </p>

                                      </div>

                                      <div>

                                          <h5>
                                              <i class="bi bi-geo-alt-fill me-2"></i>
                                              Address
                                          </h5>

                                          <p>
                                              Karachi, Pakistan
                                          </p>

                                      </div>

                                  </div>

                              </div>

                              <!-- Right Side -->

                              <div class="col-lg-7">

                                  <div class="p-5">

                                      <form action="{{ route('contact.store') }}" method="POST">

                                          @csrf

                                          @if (session('success'))
                                              <div class="alert alert-success">

                                                  {{ session('success') }}

                                              </div>
                                          @endif


                                          <div class="row">

                                              <div class="col-md-6 mb-4">

                                                  <label class="form-label fw-semibold">
                                                      Full Name
                                                  </label>

                                                  <input type="text" name="full_name"
                                                      class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                                                      value="{{ old('full_name') }}" placeholder="Enter your name">

                                                  @error('full_name')
                                                      <small class="text-danger">
                                                          {{ $message }}
                                                      </small>
                                                  @enderror

                                              </div>


                                              <div class="col-md-6 mb-4">

                                                  <label class="form-label fw-semibold">
                                                      Email Address
                                                  </label>

                                                  <input type="email" name="email"
                                                      class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                      value="{{ old('email') }}" placeholder="Enter your email">

                                                  @error('email')
                                                      <small class="text-danger">
                                                          {{ $message }}
                                                      </small>
                                                  @enderror

                                              </div>

                                          </div>


                                          <div class="row">

                                              <div class="col-md-6 mb-4">

                                                  <label class="form-label fw-semibold">
                                                      Phone Number
                                                  </label>

                                                  <input type="text" name="phone"
                                                      class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                      value="{{ old('phone') }}" placeholder="+92 300 1234567">

                                                  @error('phone')
                                                      <small class="text-danger">
                                                          {{ $message }}
                                                      </small>
                                                  @enderror

                                              </div>


                                              <div class="col-md-6 mb-4">

                                                  <label class="form-label fw-semibold">
                                                      Subject
                                                  </label>

                                                  <input type="text" name="subject"
                                                      class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                                      value="{{ old('subject') }}" placeholder="Subject">

                                                  @error('subject')
                                                      <small class="text-danger">
                                                          {{ $message }}
                                                      </small>
                                                  @enderror

                                              </div>

                                          </div>


                                          <div class="mb-4">

                                              <label class="form-label fw-semibold">
                                                  Message
                                              </label>

                                              <textarea name="message" rows="6" class="form-control @error('message') is-invalid @enderror"
                                                  placeholder="Write your message here...">{{ old('message') }}</textarea>

                                              @error('message')
                                                  <small class="text-danger">
                                                      {{ $message }}
                                                  </small>
                                              @enderror

                                          </div>


                                          <button type="submit" class="btn text-white btn-lg rounded-pill px-5"
                                              style="background:#008186;">

                                              <i class="bi bi-send-fill me-2"></i>

                                              Send Message

                                          </button>

                                      </form>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </section>

      <!-- =====================Google Map===================== -->

      <section class="py-5" style="background-color: #FAF3E0;">

          <div class="container">

              <div class="text-center mb-5">


                  <h2 class="display-5 fw-bold mt-3">
                      Visit Our Office
                  </h2>

                  <p class="text-secondary fs-5 col-lg-8 mx-auto">

                      You're always welcome to visit us. Meet our team and explore
                      our collection in person.

                  </p>

              </div>

              <div class="shadow-lg rounded-4 overflow-hidden">

                  <iframe src="https://www.google.com/maps?q=Karachi,Pakistan&output=embed" width="100%" height="450"
                      style="border:0;" allowfullscreen="" loading="lazy">
                  </iframe>

              </div>

          </div>

      </section>


      <!-- =====================Follow Us===================== -->
      <section class="py-5" style="background:#F8F9FA;">

          <div class="container">

              <div class="row align-items-stretch rounded-4 shadow-lg overflow-hidden">

                  <!-- Left Side -->

                  <div class="col-lg-6 d-flex text-white p-5" style="background:#008186;">

                      <div class="my-auto w-100">


                          <h2 class="display-5 fw-bold mt-4">
                              Follow Our Journey
                          </h2>

                          <p class="fs-5 mt-3">

                              Stay updated with our latest books, exciting competitions,
                              exclusive offers, and inspiring stories.
                              Join our growing community on social media.

                          </p>

                          <!-- Social Icons -->

                          <div class="d-flex flex-wrap gap-3 mt-5">

                              <a href="#"
                                  class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none shadow"
                                  style="width:60px;height:60px;">

                                  <i class="bi bi-facebook fs-3" style="color:#008186;"></i>

                              </a>

                              <a href="#"
                                  class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none shadow"
                                  style="width:60px;height:60px;">

                                  <i class="bi bi-instagram fs-3" style="color:#008186;"></i>

                              </a>

                              <a href="#"
                                  class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none shadow"
                                  style="width:60px;height:60px;">

                                  <i class="bi bi-twitter-x fs-3" style="color:#008186;"></i>

                              </a>

                              <a href="#"
                                  class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none shadow"
                                  style="width:60px;height:60px;">

                                  <i class="bi bi-linkedin fs-3" style="color:#008186;"></i>

                              </a>

                              <a href="#"
                                  class="bg-white rounded-circle d-flex justify-content-center align-items-center text-decoration-none shadow"
                                  style="width:60px;height:60px;">

                                  <i class="bi bi-youtube fs-3" style="color:#008186;"></i>

                              </a>

                          </div>

                      </div>

                  </div>

                  <!-- Right Side -->

                  <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white p-5">

                      <div class="text-center">

                          <!-- Profile Image -->

                          <div class="d-inline-block rounded-circle p-2 shadow-lg" style="background:#008186;">

                              <img src="{{ asset('images/follow-us.jpg') }}" class="rounded-circle"
                                  style="
                                width:280px;
                                height:280px;
                                object-fit:cover;
                                border:6px solid #D9F3F1;
                            ">

                          </div>

                          <h3 class="fw-bold mt-4">
                              Join Our Reading Community
                          </h3>

                          <p class="text-secondary mt-3">

                              Become part of our reading family.
                              Discover bestselling books, connect with talented authors,
                              participate in exciting competitions, and stay inspired
                              with every story you read.

                          </p>

                          <div class="mt-4">

                              <a href="#" class="btn text-white btn-lg rounded-pill px-5"
                                  style="background:#008186;">

                                  Follow Now

                              </a>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

      </section>
  @endsection
  <script></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
  </body>

  </html>
