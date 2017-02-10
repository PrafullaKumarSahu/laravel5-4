@extends('partials.master')
@section('content')
    <div class="col-md-8">
    	<h1>Sign In</h1>
    	<form method="POST" action="/login">
    		{{ csrf_field() }}
    		<div class="form-group">
    			<label for="email">Email: </label>
    			<input type="email" class="form-control" id="email" name="email">
    		</div>
    		<div class="form-group">
    			<label for="password">Password: </label>
    			<input type="password" class="form-control" id="password" name="password">
    		</div>
    		<div class="form-group">
    			<input type="submit" class="form-control" id="submit" name="submit" value="Login">
    		</div>
    		<div class="form-group">
    		    @include('partials.errors')
    		</div>
    	</form>
    </div>
@endsection