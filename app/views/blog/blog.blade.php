@extends('layout')
@section('content')
<!-- ============================================================= HEADER : END ============================================================= -->		
  <!-- ========================================= MAIN ========================================= -->
<main id="blog" class="inner-bottom-xs">
	<div class="container">
		
		<div class="row">
			<div class="col-md-9">
				
				<div class="posts sidemeta">
					
        @foreach($posts as $post)
          <div class="post format-image">
            <div class="date-wrapper">
              <div class="date">
                <!--span class="month">Сентябрь</span-->
                <span class="day">{{ date('d.m.Y', strtotime($post->created_at)) }}</span>
              </div>
            </div>
            <!--div class="format-wrapper">
              <a href="#"><i class="fa fa-image"></i></a>
            </div-->
            <div class="post-content">
              <!--div class="post-media">
                <img src='{{ asset("uploads/images/articles/$post->id.jpg") }}' alt="{{ $post->title }}">
              </div-->
              <h2 class="post-title">{{ $post->title }}</h2>
              <!--ul class="meta">
                <li>Posted By : Admin</li>
                <li><a href="#">OffTopic</a>, <a href="#">Announcements</a></li>
                <li><a href="#">3 Comments</a></li>
              </ul-->
              <p>{{ Str::limit(strip_tags(HTML::decode($post->content), '<p><a><img><iframe>'), 700) }}</p>
              <a href='{{ asset("post/$post->link") }}' class="le-button huge">Читать далее</a>
            </div><!-- /.post-content -->
          </div><!-- /.post -->
        @endforeach

        </div><!-- /.posts -->

      <hr/>
      {{ $paginate->links() }}
      <!--ul class="pagination blog-pagination">
      	<li><a href="#">1</a></li>
      	<li><a href="#">2</a></li>
      	<li><a href="#">3</a></li>
      	<li><a href="#">Next</a></li>
      </ul--><!-- /.pagination -->
			</div><!-- /.col -->

			<div class="col-md-3">
				
				<aside class="sidebar blog-sidebar">
	
	<div class="widget clearfix">
	<!--div class="body">
		<form role="search" class="search-form">
			<div class="form-group">
			    <label class="sr-only" for="page-search">Type your search here</label>
			    <input id="page-search" class="search-input form-control" type="search" placeholder="Enter Keywords...">
			</div>
			<button class="page-search-button">
			    <span class="fa fa-search">
			    	<span class="sr-only">Search</span>
			    </span>
			</button>
		</form>
	</div-->
</div><!-- /.widget -->
	<div class="widget">
	<h4>О блоге</h4>
	<div class="body">
		<p>Информация о спутниковом телевидении</p>
	</div>
</div><!-- /.widget -->
<!--div class="widget">
	<h4>Categories</h4>
	<div class="body">
		<ul class="le-links">
            <li><a href="#">Business</a></li>
            <li><a href="#">Company</a></li>
            <li><a href="#">Entertainment</a></li>
            <li><a href="#">Health</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Stories</a></li>
            <li><a href="#">Travel</a></li>
        </ul>
	</div>
</div-->
	<div class="widget">
	<div class="simple-banner">
		<a href="#"><img alt="" class="img-responsive" src="assets/images/blank.gif" data-echo="assets/images/banners/banner-simple.jpg" /></a>
	</div>
</div>
	<!-- ========================================= RECENT POST ========================================= -->
<div class="widget">
    <h4>Недавние Посты</h4>
    <div class="body">
        <ul class="recent-post-list">
          @foreach(Post::take(5)->skip(2)->active()->orderBy('created_at', 'desc')->get() as $post)
            <li class="sidebar-recent-post-item">
                <div class="media">
                    <!--a href="#" class="thumb-holder pull-left">
                        <img alt="" src="assets/images/blank.gif" data-echo="assets/images/recent-posts/1.jpg" />
                    </a-->
                    <div class="media-body">
                        <h5><a href='{{ asset("post/$post->link") }}'>{{ $post->title }}</a></h5>
                        <div class="posted-date">{{ date('d.m.Y', strtotime($post->created_at)) }}</div>
                    </div>
                </div>
            </li><!-- /.sidebar-recent-post-item -->
            @endforeach
        </ul><!-- /.recent-post-list -->
    </div><!-- /.body -->
</div><!-- /.widget -->
<!-- ========================================= RECENT POST : END ========================================= -->
	<!--div class="widget">
	<h4>Popular Tags</h4>
	<div class="body">
		<div class="tagcloud">
			<a style="font-size: 12pt;" href="#">Beautiful</a> 
			<a style="font-size: 20pt;" href="#">Media Center</a> 
			<a style="font-size: 10pt;" href="#">Quality</a> 
			<a style="font-size: 14pt;" href="#">Website</a> 
			<a style="font-size: 16pt;" href="#">Template</a> 
			<a style="font-size: 12pt;" href="#">Professional</a> 
			<a style="font-size: 20pt;" href="#">Design</a> 
			<a style="font-size: 10pt;" href="#">Multipurpose</a> 
			<a style="font-size: 16pt;" href="#">Portfolio</a> 
			<a style="font-size: 10pt;" href="#">Customization</a> 
			<a style="font-size: 19pt;" href="#">Bootstrap</a> 
			<a style="font-size: 9pt;" href="#">Mobile</a> 
			<a style="font-size: 14pt;" href="#">Features</a> 
			<a style="font-size: 9pt;" href="#">Styles</a> 
			<a style="font-size: 13pt;" href="#">Responsive</a> 
			<a style="font-size: 9pt;" href="#">Font Icons</a> 
			<a style="font-size: 22pt;" href="#">Love</a> 
			<a style="font-size: 10pt;" href="#">Digital</a> 
			<a style="font-size: 18pt;" href="#">Awesome</a> 
			<a style="font-size: 12pt;" href="#">Passion</a> 
			<a style="font-size: 13pt;" href="#">Typography</a> 
			<a style="font-size: 13pt;" href="#">Clean</a> 
			<a style="font-size: 9pt;" href="#">Easy to use</a> 
			<a style="font-size: 20pt;" href="#">Buy it</a> 
			<a style="font-size: 12pt;" href="#">Success</a>
		</div>
	</div>
</div-->
</aside><!-- /.sidebar .blog-sidebar -->
			</div>
		</div><!-- /.row -->

	</div><!-- /.container -->
</main><!-- /.inner-bottom-xs -->
<!-- ========================================= MAIN : MAIN ========================================= -->
@stop
