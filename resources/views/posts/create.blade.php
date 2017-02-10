@extends ('partials.master')

@section ('content')
	<div class="col-sm-8 blog-main">
	   Create a New Post
	   <form action="/posts" method="POST">
	   {{ csrf_field() }}
		  <div class="form-group">
		    <label for="title">Title: </label>
		    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
		  </div>
		  <div class="form-group">
		    <label for="body">Body: </label>
		    <textarea class="form-control" name="body" id="body"></textarea>
		  </div>
		  <div class="form-group">
		      <button type="submit" class="btn btn-default">Publish</button>
		  </div>
          @include('partials.errors')
		</form>
	</div>
@endsection

