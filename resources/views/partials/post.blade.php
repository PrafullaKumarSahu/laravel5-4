<div class="blog-post">
	<h2 class="blog-post-title">
	    <a href="/posts/{{$post->id}}">
		    {{ $post->title }}
		</a>
	</h2>
	<p class="blog-post-meta">
	    {{ $post->user->name }} on 
	    {{ $post->created_at->toFormattedDateString() }}
	</p>

	<p class="blog-post-body">
		{{ $post->body }}
	</p>

    @if(count($post->tags))
	<p class="blog-post-tags">
		<ul class="tags">
			@foreach($post->tags as $tag)
			    <li><a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	</p>
	@endif
    
    <br />

    @if(count($post->comments))
	<div class="comments">
	    <ul class="list-group">
		@foreach($post->comments as $comment)
		    <li class="list-group-item">
		        <strong>
		        	{{ $comment->created_at->diffForHumans() }}: 
		        </strong>
		    	{{ $comment->body }}
		    </li>
		@endforeach
		</ul>
	</div>
	@endif
</div>

<hr>

<div class="card">
	<div class="card-block">
		<form method="POST" action="/posts/{{ $post->id }}/comments">
		    {{ csrf_field() }}
			<div class="form-group">
				<textarea name="body" class="form-control" placeholder="Your Comment Here."></textarea>
			</div>

			<div class="form-group">
		        <button type="submit" class="btn btn-primary">Add Comment</button>
		    </div>
		    <div class="form-group">
		    	@include('partials.errors')
		    </div>
		</form>
	</div>
</div>