@extends('layouts.app')

@section('content')




<!-- Section: Design Block -->

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Bootstrap CSS -->
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
         crossorigin="anonymous"
      />
      <link rel="stylesheet" href="./style.css">

      <title>Hello, world!</title>
   </head>
   <body>
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
             background-color: #333;
              height: 300px;
              ">
              <div>
              <img src="{{url('images\logo.png')}}" alt=""  >
              </div></div>
        <!-- Background image -->
      
        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
              margin-top: -100px;
              background: hsla(0, 0%, 100%, 0.8);
              backdrop-filter: blur(30px);
              ">
          <div class="card-body py-5 px-md-5">
      
            <div class="row d-flex justify-content-center">
              <div class="col-lg-8">
                <h2 class="fw-bold mb-5 logText">LOGIN</h2>
                <form  method="POST" action="{{ route('login') }}">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  @csrf
      
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                    <label class="form-label fw-bold" for="form3Example3">{{ __('Email Address') }}</label>
                  </div>
      
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                    <label class="form-label fw-bold" for="form3Example4">{{ __('Password') }}</label>
                  </div>
      
                  <!-- Checkbox -->
                 
      
                  <!-- Submit button -->
                  <button type="submit" class="btn logBtn btn-block mb-4">
                  {{ __('Login') }}
                  </button>
      
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
         crossorigin="anonymous"
      ></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
   </body>
</html>
@endsection


<!-- Section: Design Block -->