<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('frontend.css')
      <style type="text/css">
        .post_title{
          font-size: 30px;
          font-weight: bold;
          text-align: center;
          padding: 30px;
        }
      </style>
   </head>

   <body>
    @include('sweetalert::alert')
      <div class="header_section">
         @include('frontend.header')

         @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
          </div>
        @endif
      </div>
      
      <h1 class="post_title mt-3">Update Post</h1>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="center_form">

                <form action="{{ route('userpost.update', $post->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> Post Title </label>
                          <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}"/>
                      </div>

                      <div class="form-group">
                        <label> Post Description </label>
                        <textarea class="form-control" name="description" placeholder="Description">{{ $post->title }}</textarea>
                      </div>

                      <div class="mb-3">
                        <label for="image" class="form-label">Image </label>
                        <br>
                        @if ( $post->image == NULL )
                            No Image Uploaded.
                        @else                    
                            <img src="{{ asset('backend/img/post/' . $post->image) }}" width="50">
                        @endif
                        <br>
                        <input type="file" class="form-control" name="image" id="image">
                      </div>
             
                  
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="userpostUpdate" value="Save Changes" class="btn btn-primary bg-dark" />
                  </div>

                </form>
        </div>
      
        @include('frontend.footer')
      
   </body>
</html>