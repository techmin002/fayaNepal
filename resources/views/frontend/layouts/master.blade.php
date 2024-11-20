
     @include('frontend.layouts.header')
     <body>
     
     @include('frontend.layouts.nav')
     @include('setting::layouts.alert')

        @yield('content')
    @include('frontend.layouts.footer')
 </body>
 </html>
  
