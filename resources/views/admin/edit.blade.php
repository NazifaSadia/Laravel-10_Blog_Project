<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.includes.info')
    @include('admin.includes.css')

    <style type="text/css">
      .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color:white;
      }
      /* .center_form{
        justify-content: center;
        display: flex;
       } */
     
      
      label {
        display: inline-block;
        width: 200px;
      }

      .btn-file {
          position: relative;
          overflow: hidden;
      }

      .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 100px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          outline: none;
          background: white;
          cursor: inherit;
          display: block;
      }

      input[readonly] {
        background-color: white !important;
        cursor: text !important;
      }
    </style>
    
  </head>
  <body>
    @include('admin.includes.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.includes.sidebar')
      <!-- Sidebar Navigation end-->
       
      <div class="page-content">

        @if( session()->has('message') )
          <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

        <h1 class="post_title">Update Post</h1>
      
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="center_form">
                <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                    <label> Post Title </label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}" />
                  </div>

                  <div class="form-group">
                    <label> Post Description </label>
                    <textarea class="form-control" name="description">{{$post->description}}</textarea>
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
                    <input type="submit" name="postUpdate" value="Save Changes" class="btn btn-primary " />
                  </div>

                </form>
        </div>
    </div>
  </div>
</div>
      </div>
        @include('admin.includes.footer')  
        @include('admin.includes.scripts')  


        <script>
          $(function() {
            $(".bcontent").wysihtml5({
              toolbar: {
                "image": false
              }
            });
            
            $(document).on('change', '.btn-file :file', function() {
              var input = $(this);
              var numFiles = input.get(0).files ? input.get(0).files.length : 1;
              console.log(input.get(0).files);
              var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
              input.trigger('fileselect', [numFiles, label]);
            });
            
            $('.btn-file :file').on('fileselect', function(event, numFiles, label){
              var input = $(this).parents('.input-group').find(':text');
              var log = numFiles > 1 ? numFiles + ' files selected' : label;
              
              if( input.length ) {
                input.val(log);
              } else {
                if( log ){ alert(log); }
              }
              
            });
          });
        </script>
  </body>
</html>