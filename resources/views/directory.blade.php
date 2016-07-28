@extends('layouts.master-page')

@section('title')
    Home
@endsection


@section('css-header')
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" >
    <!--[if IE]><link rel="shortcut icon" href="{{ asset('favicon.ico') }}" ><![endif]-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">

    <!-- Google Fonts usage: font-family: 'Open Sans', sans-serif;   -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
@endsection


@section('content')
    <!-- Your Code Here... -->
    <div class="wrapper"> <!-- Start - Wrapper -->
        <div class="container"> <!-- Start Container -->
            <div class="row"> <!-- Start Main Row-->
                <div class="jumbotron">
                    <h1>
                        Search App Compilation Directory
                    </h1>
                </div>

                <ul>
                    <li><a href="{{ url('native-php-search') }}" target="_blank"> Native Php Search (Basic) using table with pagination and additional information </a></li>
                    <li><a href="{{ url('jquery-ui-search-autocomplete') }}" target="_blank">jQuery UI Ajax Search Autocomplete</a></li>
                    <li><a href="{{ url('jquery-ajax-live-data-search-app') }}" target="_blank">jQuery Ajax Live Data Search</a></li>
                    <li><a href="{{ url('jquery-ajax-live-data-search-with-popver') }}" target="_blank">jQuery Ajax Live Data Search with popover</a></li>
                    <li><a href="{{ url('search-with-typeahead') }}" target="_blank">Search with typeahead.js <span style="color:red">In Progress</span></a></li>
                </ul>
         </div><!-- End Main Row -->
        </div> <!-- End Container-->
    </div> <!-- End Wrapper-->
@endsection


@section('script-header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function (){
            console.log('JQuery Loaded..')

        });
    </script>
@endsection



