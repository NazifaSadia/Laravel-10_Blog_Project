<!DOCTYPE html>
<html lang="en">
   <head>
      @include('frontend.css')
   </head>
   <body>
      <div class="header_section">
         @include('frontend.header')
        @include('frontend.banner')
      </div>

        @include('frontend.posts')
    
        @include('frontend.about')
      
        @include('frontend.footer')
   </body>
</html>