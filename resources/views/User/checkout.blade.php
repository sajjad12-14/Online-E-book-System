@extends('Layouts.Userslayouts')

@section('content')


<!-- Checkout Header -->

<section class="py-5 text-white" style="background:#008186;">

    <div class="container text-center">

        <h1 class="fw-bold">
            Checkout
        </h1>

        <p class="mb-0">
            Complete your order details and enjoy your reading journey.
        </p>

    </div>

</section>




<!-- Checkout Section -->

<section class="py-5" style="background:#F5EFE6;">

<div class="container">


<div class="row g-4">


<!-- Customer Information -->

<div class="col-lg-7">


<div class="card border-0 shadow rounded-4">


<div class="card-body p-4">


<h3 class="fw-bold mb-4">

<i class="bi bi-person-fill me-2"
style="color:#008186;"></i>

Customer Information

</h3>




<form action="{{ route('checkout.place') }}" method="POST">

@csrf



<div class="row">


<!-- Name -->

<div class="col-md-6 mb-3">

<label class="fw-bold">
Full Name
</label>

<input type="text"
name="name"
class="form-control rounded-3"
placeholder="Enter your name"
required>

</div>




<!-- Email -->

<div class="col-md-6 mb-3">

<label class="fw-bold">
Email Address
</label>

<input type="email"
name="email"
class="form-control rounded-3"
placeholder="Enter email"
required>

</div>





<!-- Phone -->

<div class="col-md-6 mb-3">

<label class="fw-bold">
Phone Number
</label>

<input type="text"
name="phone"
class="form-control rounded-3"
placeholder="03xxxxxxxxx"
required>

</div>





<!-- City -->

<div class="col-md-6 mb-3">

<label class="fw-bold">
City
</label>

<input type="text"
name="city"
class="form-control rounded-3"
placeholder="Your city"
required>

</div>





<!-- Address -->

<div class="col-12 mb-3">


<label class="fw-bold">
Complete Address
</label>


<textarea
name="address"
rows="4"
class="form-control rounded-3"
placeholder="Enter your address"
required></textarea>


</div>






<!-- Payment Method -->

<div class="col-12 mb-4">


<label class="fw-bold mb-2">

Payment Method

</label>



<div class="card border rounded-3 p-3">


<div class="form-check mb-2">


<input class="form-check-input"
type="radio"
name="payment_method"
value="COD"
checked>


<label class="form-check-label">

Cash On Delivery

</label>


</div>




<div class="form-check">


<input class="form-check-input"
type="radio"
name="payment_method"
value="Online">


<label class="form-check-label">

Online Payment

</label>


</div>



</div>


</div>





</div>





<button type="submit"
class="btn text-white rounded-pill px-5 py-2"
style="background:#008186;">


<i class="bi bi-check-circle me-2"></i>

Place Order


</button>




</form>



</div>

</div>


</div>








<!-- Order Summary -->

<div class="col-lg-5">


<div class="card border-0 shadow rounded-4">


<div class="card-body p-4">


<h3 class="fw-bold mb-4">

<i class="bi bi-cart-check me-2"
style="color:#008186;"></i>

Your Order

</h3>





@foreach($cartItems as $item)


<div class="d-flex align-items-center mb-3">


<img src="{{ asset('uploads/books/'.$item->book->image) }}"
class="rounded-3"
style="width:70px;height:90px;object-fit:contain;">



<div class="ms-3">


<h6 class="fw-bold mb-1">

{{ $item->book->title }}

</h6>



<small class="text-muted">

Qty: {{ $item->quantity }}

</small>


</div>




<div class="ms-auto">


<strong>

Rs {{ number_format($item->price * $item->quantity) }}

</strong>


</div>



</div>


<hr>



@endforeach






<div class="d-flex justify-content-between">


<h5 class="fw-bold">

Total

</h5>


<h4 class="fw-bold text-success">

Rs {{ number_format(
$cartItems->sum(function($item){

return $item->price * $item->quantity;

})
) }}


</h4>


</div>




</div>


</div>


</div>




</div>


</div>


</section>



@endsection
