<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="Themesdesign"/>
    <link rel="shortcut icon" href="{{asset('template/images/favicon.ico')}}">
    @include('includes.styles')
    <title>{{$pageTitle ?? 'Home'}}</title>
</head>
<body class="">
<x-preloader/>
{{$slot}}
@include('includes.scripts')
@stack('scripts')
</body>
</html>
