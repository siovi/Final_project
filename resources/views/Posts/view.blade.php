@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
          
                   <br>
            <div class="panel panel-default">
                <div class="panel-heading">   Post View  </div>

               

                <div class="panel-body">

                    <div class="col-md-4">
                      <ul class="list-group">
                        @if(count($categories)>0)
                          @foreach($categories->all()as $category)
                          <li class="list-group-item"><a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                           @endforeach
                           @else
                           <p> No category Found!</p>
                           @endif

                      </ul>
                       

                    </div>


                    <div class="col-md-8" ">
                      @if(count($posts)>0)
                        @foreach($posts->all()as $post)
                        <h4>{{$post->post_tittle}}</h4>
                        <img  src="{{$post->post_image}}" width="300" height="300" alt="">
                        <p>{{$post->post_body}}</p>

                        <ul class="nav nav-pills">
                          <li role="presentation" >
                            <a href='{{url("/like/{$post->id}")}}'>
                              <span class="fa fa-thumbs-up">Like({{$likeCtr}})</span>
                            </a>

                          </li>
                          <li role="presentation" >
                            <a href='{{url("/dislike/{$post->id}")}}'>
                              <span class="fa fa-thumbs-down">Dislike({{$dislikeCtr}})</span>
                            </a>

                          </li>
                          <li role="presentation" >
                            <a href='{{url("/comment/{$post->id}")}}'>
                              <span class="fa fa-comment-o">Comment</span>
                            </a>

                          </li>
                        </ul>

                        
                        
                        @endforeach
                        
                      @else
                        <p>No Post Available!</p>
                        @endif

                       <form  method="POST" action='{{url("/comment/{$post->id}")}}'>
                        {{ csrf_field() }}

                        <div class="form-group">
                          <textarea id="comment" rows="6" class="form-control" name="comment" required autofocus></textarea>
                        </div>

                        @if(session('response'))
                   <div class="álert alert-success">{{session('response')}}</div>
                   @endif


   
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>

                          <h3>Comments</h3>

                          @if(count($comments)>0)
                          
                          @foreach($comments->all()as $comment)

                          <p>{{$comment->comment}}</p>
                          <p>Posted by:{{$comment->name}}</p>
                           @endforeach                    
                      @else
                        <p>No Comment Available!</p>
                        @endif

                        </div>
                      </form>
                    </div>



                    </div>

           




               </div>
             </div></div></div></div> 

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
