@extends('layout.layout_login')
@section('content')
<form class="login100-form validate-form" action="{{route('acount.store')}}" method="POST">
	{{-- @include('Layout_admin.alert') --}}
	@csrf
	<span class="login100-form-title p-b-43">
		Create acount login 
	</span>
	<div class="text-center p-t-46 p-b-20">
		<span class="txt2">
			or sign up using
		</span>
	</div>

	<div class="login100-form-social flex-c-m">
		<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
			<i class="fa fa-facebook-f" aria-hidden="true"></i>
		</a>

		<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
	</div>
	<div class="wrap-input100 validate-input">
		<input class="input100" type="text" name="name">
		<span class="focus-input100"></span>
		<span class="label-input100">Name</span>
	</div>
	@error('name')
	<small class="help-block">{{$message}}</small>
	@enderror
	<div class="wrap-input100 validate-input">
		<input class="input100" type="text" name="adress">
		<span class="focus-input100"></span>
		<span class="label-input100">Adress</span>
	</div>
	@error('adress')
	<small class="help-block">{{$message}}</small>
    @enderror
	<div class="wrap-input100 validate-input">
		<input class="input100" type="number" name="phone">
		<span class="focus-input100"></span>
		<span class="label-input100">Phone</span>
		
	</div>
	@error('phone')
		<small class="help-block">{{$message}}</small>
	@enderror
	<div class="wrap-input100 validate-input">
		<input class="input100" type="text" name="full_name">
		<span class="focus-input100"></span>
		<span class="label-input100">Full Name</span>
	</div>
	@error('full_name')
		<small class="fa fa-danger">{{$message}}</small>
	 @enderror
	
	<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
		<input class="input100" type="text" name="email">
		<span class="focus-input100"></span>
		<span class="label-input100">Email</span>
	</div>
	@error('email')
	<small class="help-block">{{$message}}</small>
   @enderror
	<div class="wrap-input100 validate-input" data-validate="Password is required">
		<input class="input100" type="password" name="password">
		<span class="focus-input100"></span>
		<span class="label-input100">Password</span>
	</div>
	@error('password')
		<small class="help-block">{{$message}}</small>
	@enderror
	<div class="wrap-input100 validate-input" data-validate="Password is required">
		<input class="input100" type="password" name="password_confirmation">
		<span class="focus-input100"></span>
		<span class="label-input100">Password Confirm</span>
	</div>
	@error('password_confirmation')
	<small class="help-block">{{$message}}</small>
    @enderror
	<div class="flex-sb-m w-full p-t-3 p-b-32">
		<div class="contact100-form-checkbox">
			<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
			<label class="label-checkbox100" for="ckb1">
				Remember me
			</label>
		</div>

		<div>
			<a href="#" class="txt1">
				Forgot Password?
			</a>
		</div>
	</div>


	<div class="container-login100-form-btn">
		<button class="login100-form-btn" type="submit">
		 SingIn	
		</button>
	</div>
</form>
@endsection