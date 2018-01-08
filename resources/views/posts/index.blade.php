@extends ('partials.master')

@section ('content')
	<div class="col-sm-8 blog-main">
	  @if(count($posts))
	      <div>
	      @foreach($posts as $post)
	          @include('partials.post', $post )
	      @endforeach
	      </div>
	  @endif
	</div>
@endsection

