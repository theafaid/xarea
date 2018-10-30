@include('layouts.user.header')
@include('layouts.user.nav')

<!-- property area -->
        <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
            <div class="container">
@include('layouts.user.message')
@yield('content')
            </div>
        </div>
@include('layouts.user.footer')
