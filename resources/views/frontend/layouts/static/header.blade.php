<!DOCTYPE html>
<html lang="tr" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{setting('speed_site_title')." | "}}@yield('title', trans('Anasayfa'))</title>
    <meta name="description" content="@yield('description', trans(setting('speed_meta_descriptions')))">

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
            width: 100px;
            filter: url(#goo);
        }

        .dropdown__face, .dropdown__items {
            background-color: transparent;
            border: 1px solid #fff;
            padding: 5px;
            border-radius: 15px;
        }
        .dropdown__face {
            display: flex;
            position: relative;
            justify-content: space-between;
            align-items: center;
            background: white;
        }
        .dropdown__items {
            min-width: 100px;
            margin: 0;
            position: absolute;
            right: 0;
            top: 50%;
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: space-between;
            visibility: hidden;
            z-index: -1;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.93, 0.88, 0.1, 0.8);
        }

        .dropdown__text {
            background: none;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 6px;
            text-transform: uppercase;
            font-size: 12px;
            color: black;
        }
        .dropdown__arrow {
            border-bottom: 2px solid #000;
            border-right: 2px solid #000;
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
        .dropdown__items li {
            padding: 10px;
            padding-bottom: 8px;
            padding-top: 5px;
            border-radius: 5px;
            transition: .4s;
        }
        .dropdown__items li:hover {
            background: #181c20;
            color: white !important
        }
        .dropdown__items li:hover .langSpan {
            color: white;
        }
        .dropdown__items li a{
            color: black;
            text-transform: uppercase;
            font-size: 10px;

        }
        .dropdown__items li a span{
            margin-top: 3px;
        }
        .dropdown__items li img{
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .dropdown__items li.active{
            border-bottom: 1px solid rgb(220 220 220 / 50%);
            background: #181c20;
            color: white !important
        }
        .langSpan{
            color: black;
        }
        .dropdown__items li.activesp{
            color: white !important
        }
        .dropdown__items {
            /*padding: 10px;*/
            height: auto;
            width: 100px;

            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body data-preloader="1">
@include('frontend.layouts.menu.top')
