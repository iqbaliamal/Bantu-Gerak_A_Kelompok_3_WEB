<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  @stack('css-libraries')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/wrapper.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('backend/app.css')}}">
    @stack('customcss')
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        {{-- NAVBAR / TOP BAR --}}
      @include('admin.layout.navbar')

      {{-- SIDEBAR --}}
      @include('admin.layout.sidebar')
