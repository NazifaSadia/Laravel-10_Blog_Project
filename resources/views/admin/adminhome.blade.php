<!DOCTYPE html>
<html>
  <head> 
    @include('admin.includes.info')
    @include('admin.includes.css')
  </head>
  <body>
    @include('admin.includes.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.includes.sidebar')
      <!-- Sidebar Navigation end-->
        @include('admin.includes.body')
        
        @include('admin.includes.footer')  
        @include('admin.includes.scripts') 
  </body>
</html>