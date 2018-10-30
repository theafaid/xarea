@include('layouts.header')
@include('layouts.nav')

<!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
@include('layouts.message')
@yield('content')
            </div>
        </div>
@include('layouts.footer')
