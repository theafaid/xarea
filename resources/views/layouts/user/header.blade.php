<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<!--<![endif]-->

<html class="no-js" lang="ar">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>
            @yield('title')
        </title>
        <meta name="description" content="{{!empty(setting()->site_description) ? setting()->site_description : ''}}">
        <meta name="author" content="Abdulrhman Faid">
        <meta name="keyword" content="{{!empty(setting()->keywords) ? setting()->keywords : ''}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(!empty(setting()->site_logo))
        <link rel='icon' href="{{it()->url(setting()->site_logo)}}" />
        @else
        <link rel="icon" href="{{url('design/frontend/assets/spearImg/logo.png')}}" />
        @endif
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/normalize.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/fontello.css">
        <link href="{{url('design/frontend')}}/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="{{url('design/frontend')}}/assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="{{url('design/frontend')}}/assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="{{url('design/frontend')}}/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/bootstrap/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/price-range.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/owl.theme.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/style.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/responsive.css">
        <link rel="stylesheet" href="{{url('design/frontend')}}/assets/css/final.css">
        @stack('css-header')
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <style>
            html, body{
                font-family: 'Cairo', sans-serif;
            }
        </style>
        @stack('js-header')
    </head>
    <body>