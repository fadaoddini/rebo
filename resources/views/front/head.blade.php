<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="cms rebo enjoy store">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Rebo</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('front/img/icons/icon-72x72.png')}}">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="{{url('front/img/icons/icon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('front/img/icons/icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{url('front/img/icons/icon-167x167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('front/img/icons/icon-180x180.png')}}">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{url('front/style.css')}}">
    <!-- Web App Manifest-->
    <link rel="manifest" href="{{url('front/manifest.json')}}">
</head>

@php
    if (Cookie::get('basket')){
    }else{
      Cookie::queue('basket', time(),3000);
    }
@endphp
