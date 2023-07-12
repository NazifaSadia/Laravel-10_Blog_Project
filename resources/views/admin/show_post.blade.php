<!DOCTYPE html>
<html>
  <head> 
    @include('admin.includes.info')
    @include('admin.includes.css')

    <style>
        .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color:white;
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
        @if(session()->has('message'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
          </div>
        @endif

            <h1 class="post_title">All Post</h1>

            <!-- Table Content Start -->
            <div class="bd bd-gray-300 rounded table-responsive">
              <table class="table table-dark table-striped table-hover">
                <thead>
                  <tr>
                      <th>Post Title</th>
                      <th>Description</th>
                      <th>Post By</th>
                      <th>Post Status</th>
                      <th>User Type</th>
                      <th>Image</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->description }}</td>
                      <td>{{ $post->name }}</td>
                      <td>{{ $post->post_status }}</td>
                      <td>{{ $post->user_type }}</td>
                      <td>                                   
                        <img src="{{ asset('postimage/' . $post->image) }}" height="50" width="100">
                      </td>

                      <td>
                        <ul class="custom_action">
                          <li>
                            <a href="{{url('/edit_post', $post->id)}}">
                              <i class="fa fa-edit"></i>
                            </a>
                          </li>
                          <li>
                            <a href="{{url('/delete_post', $post->id)}}" onclick="Confirmation(event)">
                              <i class="fa fa-trash"></i>
                            </a>
                          </li>
                        </ul>
                      </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Table Content End -->
        </div>

        @include('admin.includes.footer')  
        @include('admin.includes.scripts') 
      <script type="text/javascript">
        function Confirmation(e){
          e.preventDefault();
          var urlToRedirect =e.currentTarget.getAttribute('href');

          console.log( urlToRedirect );

          swal({
            title     : "Are you sure to Delete this Post?",
            text      : "You won't be able to revert this delete.",
            icon      : "warning",
            buttons   : true,
            dangerMode: true
          })

          .then( (willCancel) => {
            if(willCancel)
            {
              window.location.href = urlToRedirect;
            }
          });
        }
      </script>

  </body>
</html>