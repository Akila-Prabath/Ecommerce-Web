@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">My Account</h2>
      <div class="row">
        <div class="col-lg-3">
          @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__dashboard">
            <h4>Welcome Back, <strong>{{Auth::user()->name}}</strong></h4>
            <!--<p>From your account dashboard you can view your <a class="unerline-link" href="account_orders.html">recent
                orders</a>, manage your <a class="unerline-link" href="account_edit_address.html">
                addresses</a>, and <a class="unerline-link" href="account_edit.html">edit your password and account
                details.</a>
            </p>-->
                
            <div class="container-icon">                                 
              <a href="account-orders.html" class="box-icon">
                <i class="icon-file-text"></i>
                <p>Orders</p>
              </a>
              <a href="account-address.html" class="box-icon">
                <i class="icon-map-pin"></i>
                <p>Addresses</p>
              </a>
              <a href="{{route('user.account-details')}}" class="box-icon">
                <i class="icon-user"></i>
                <p>Account Details</p>
              </a>                
              <a href="account-wishlist.html" class="box-icon">
                <i class="icon-heart"></i>
                <p>Wishlist</p>
              </a>
            </div>
        </div>
      </div>
    </section>
</main>
@endsection