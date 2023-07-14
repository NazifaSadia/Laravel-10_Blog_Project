<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('frontend.css')
      <style>
        .post_deg{
            text-align:center;
            padding:30px;
            background-color:#082526;
        }
        .title_deg{
          font-size: 30px;
          font-weight: bold;
          padding: 15px;
          color:white;
        }
        .desc_deg{
          font-size: 18px;
          font-weight: bold;
          padding: 15px;
          color:whitesmoke;
        }
        .img_deg{
          height: 200px;
          width: 300px;
          padding: 30px;
          margin: auto;
        }
      </style>
   </head>

   <body>
      <div class="header_section">
        @include('frontend.header')

        @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        @foreach ( $posts as $post )
          <div class="post_deg">
            <img class="img_deg" src="{{ asset('backend/img/post/' . $post->image) }}"> 
            <h4 class="title_deg">{{ $post->title }}</h4>
            <p class="desc_deg">{{ $post->description }}</p>

            <a href="{{route('userpost.edit', $post->id)}}" class="btn btn-primary">Update</a>
            
            <a onclick="return confirm('Are you sure to Delete this post?')" href="{{route('userpost.destroy',$post->id)}}" class="btn btn-danger">Delete</a>
          </div>
        @endforeach

      </div>

        @include('frontend.footer')
   </body>
</html>