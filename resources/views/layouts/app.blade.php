<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/rater.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('includes.style')
</head>
<body>
@include('includes.header')
<section class="section">
    @yield('content')
    @include('includes.modal.successReviewCreating')
    @include('includes.modal.errorMessage')
    @include('includes.modal.successMessage')
    @include('includes.modal.addPostRedirect')
    @yield('modal_forms')
</section>
@include('includes.footer')
<div id="imageModal" class="image-modal">
    <span class="closeImageModal">&times;</span>
    <img class="image-modal-content" id="img01">
    <div id="caption"></div>
</div>
@include('includes.share')
@include('includes.modal.sliderBodyModal')
</body>
@include('includes.scripts')
@include('includes.alerts')
</html>
