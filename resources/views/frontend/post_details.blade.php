<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('frontend.css')
      <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width:550px;
            height: 400px;
        }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('frontend.header')
      </div>
      <!-- header section end -->

      
      <!-- Blog Details section start -->
        <div class="col-md-12" style="text-align: center;">
            <div>
                <img src="{{ asset('backend/img/post/'.$post->image) }}"  style="padding:20px" class="center">
            </div>
            
            <h4><b>{{ $post->title }}</b></h4>

            <h3>{{ $post->description }}</></h3>

            <p>Posted by- <b>{{ $post->name }}</b></p>

            <div class="btn_main">
                <a href="{{route('post.details',$post->id)}}">Read More</a>
            </div>
        </div>
      <!-- Blog Details section end -->

      
        @include('frontend.footer')
   </body>
</html>