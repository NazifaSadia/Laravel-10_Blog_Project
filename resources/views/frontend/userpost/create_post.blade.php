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
      </div>
      
      <h1 class="post_title mt-3">Add Post</h1>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="center_form">

                <form action="{{ route('userpost.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> Post Title </label>
                          <input type="text" class="form-control" name="title" placeholder="Title" />
                      </div>

                      <div class="form-group">
                        <label> Post Description </label>
                        <textarea class="form-control" name="description" placeholder="Description"></textarea>
                      </div>

                      <div class="mb-3">
                        <label for="image" class="form-label">Image </label>
                        <input type="file" class="form-control" name="image" id="image">
                      </div>
             
                  
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="submit" value="Add Post" class="btn btn-primary bg-dark" />
                  </div>

                </form>
        </div>
      
        @include('frontend.footer')
      
   </body>
</html>