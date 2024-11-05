<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>{{setting('speed_site_title')." | "}}@yield('title', trans('Anasayfa'))</title>

    <!-- Favicon -->
    @include('frontend.layouts.components.styles')
    <style>
        .header.transparent-dark, .header.transparent-light {
            background: #00000011;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .header .header-menu .nav .nav-item .nav-link {
            padding: 0px 6px;
            font-family: "Poppins", sans-serif;
            letter-spacing: 1px;
            font-weight: 600;
            color: #121518;
        }
        .customButton{
            max-width: 80px !important;
            padding: 10px !important;
            max-height: 30px !important;
        }
        .dropdown {
            position: relative;
            width: 150px;
            filter: url(#goo);
        }

        .dropdown__face, .dropdown__items {
            background-color: transparent;
            border: 1px solid white;
            padding: 5px;
            border-radius: 15px;
        }
        .dropdown__face {
            display: block;
            position: relative;
        }
        .dropdown__items {
            margin: 0;
            position: absolute;
            right: 0;
            top: 50%;
            width: 100%;
            list-style: none;
            list-style-type: none;
            display: flex;
            justify-content: space-between;
            visibility: hidden;
            z-index: -1;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.93, 0.88, 0.1, 0.8);
        }

        .dropdown__text{
            margin-left: 10px;
            color: white;
            font-weight: bold;
        }
        .dropdown__arrow {
            border-bottom: 2px solid #fff;
            border-right: 2px solid #fff;
            position: absolute;
            top: 50%;
            right: 30px;
            width: 7px;
            height: 7px;
            transform: rotate(45deg) translateY(-50%);
            transform-origin: right;
        }
        .dropdown input {
            display: none;
        }
        .dropdown input:checked ~ .dropdown__items {
            top: calc(100% + 10px);
            visibility: visible;
            opacity: 1;
        }
        .dropdown__items{
            background-color: white;
        }
        .dropdown__items li{
            padding-bottom: 8px;
            padding-top: 5px;
        }
        .dropdown__items li img{
            width: 25px;
            border-radius: 50%;
        }
        .dropdown__items {
            padding: 10px;
            height: auto;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body data-preloader="1">
@include('frontend.layouts.menu.top')
