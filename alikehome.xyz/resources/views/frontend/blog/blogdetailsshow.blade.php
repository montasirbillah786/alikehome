@extends("layouts.master")

 @section('content')


 <div class="breadcrumbs_area" id="blog">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Blog</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--blog body area start-->
    <div class="blog_details" >
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_wrapper_details">
                    	
                        <article class="single_blog">
                            <figure>
                               <div class="post_header">
                                   <h3 class="post_title">{{$blog->name}}</h3>
                                    <div class="blog_meta">   
                                       <p>Posted by : <a href="#">admin</a> / On : <a href="#">{{date('d-m-Y',strtotime($blog->created_at))}}</a></p>                                     
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                   <a href="#"><img src="{{getImage($blog->image,'blog')}}" alt="image"></a>


                               </div>
                               <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p>{!! $blog->description1 !!}</p>
                                        <blockquote>
                                            <p>{{$blog->tag}}</p>
                                        </blockquote>
                                        <p>{!! $blog->description2 !!}</p>
                                    </div>
                                    <div class="entry_content">
                                        

                                        <div class="social_sharing">
                                            <p>share this post:</p>
                                            <ul>
                                              <div class="addthis_inline_share_toolbox"></div>
                                        </div>
                                    </div>
                               </figcaption>
                            </figure>
                        </article>
                       

                        <div class="related_posts">
                           <h3>Related posts</h3>
                            <div class="row">
                            	@foreach(App\blog::orderby('id','asc')->where('id','!=',$blog->id)->get() as $recentblog)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <article class="single_related">
                                        <figure>
                                            <div class="related_thumb">
                                                <a href="{{route('blog.details.show',$recentblog->id)}}"><img src="{{asset('public/img/blog/'.$recentblog->image)}}" alt=""></a>
                                            </div>
                                            <figcaption class="related_content">
                                               <h4><a href="{{route('blog.details.show',$recentblog->id)}}">{{$recentblog->name}}</a></h4>
                                               <div class="blog_meta">                                        
                                                    <span class="author">By : <a href="{{route('blog.details.show',$recentblog->id)}}">admin</a> / </span>
                                                    <span class="meta_date"> {{date('d-m-Y',strtotime($recentblog->created_at))}}	</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                               @endforeach
                                
                            </div>
                       </div> 
                        <div class="comments_box">
                            <h3>{{ App\blogcomment::comment_count() }} Comments	</h3>
                            @foreach(App\blogcomment::orderby('id','desc')->where('active','1')->get() as $comment)
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">{{$comment->name}}</a></h5>
                                        <span>{{date('d-m-Y',strtotime($comment->created_at))}}</span> 
                                    </div>
                                    <p>{{$comment->comment}}</p>
                                    
                                </div>

                            </div>
                            
                         @endforeach
                         
                        <div class="comments_form">
                            <h3>Leave a Reply </h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form method="post" action="{{ route('blog.blogcomment.store') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                                <div class="row">
                                    <div class="col-12">

                                    	<input name="blog_id"  type="hidden" value="{{$blog->id}}">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comment"></textarea>
                                    </div> 
                                    <div class="col-lg-4 col-md-4">
                                        <label for="author">Name</label>
                                        <input name="name"  type="text">

                                    </div> 
                                    <div class="col-lg-4 col-md-4">
                                        <label for="email">Email </label>
                                        <input name="email"  type="text">
                                    </div>
                                      
                                </div>
                                <button class="button" type="submit">Post Comment</button>
                             </form>    
                        </div>
                    </div>
                    <!--blog grid area start-->
                </div>
               
            </div>
        </div>
    </div>
    <!--blog section area end-->
 @endsection