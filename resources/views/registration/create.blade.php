@extends('partials.master')
@section('content')
    <div class="col-sm-8 blog-main">
	    <form method="POST" action="/register">
	    	{{ csrf_field() }}
	    	<div class="form-group">
	    		<label for="name">Name: </label>
	    		<input type="text" class="form-control" id="name" name="name">
	    	</div>
	    	<div class="form-group">
	    		<label for="email">Email Address: </label>
	    		<input type="email" class="form-control" id="email" name="email">
	    	</div>
	    	<div class="form-group">
	    		<label for="password">Password: </label>
	    		<input type="password" class="form-control" id="password" name="password">
	    	</div>
	    	<div class="form-group">
	    		<label for="password_confirmation">Password Confirmation: </label>
	    		<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
	    	</div>
	    	<div class="form-group">
	    		<input type="submit" class="form-control" id="submit" name="submit" value="Register">
	    	</div>
	    </form>
	    @include('partials.errors')
    </div>
@endsection