@extends('layouts.master-page')

@section('title')
    Search with typeahead.js
@endsection


@section('css-header')
        <!-- Fav Icon -->
<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" >
<!--[if IE]><link rel="shortcut icon" href="{{ asset('favicon.ico') }}" ><![endif]-->

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">

<!-- Google Fonts usage: font-family: 'Open Sans', sans-serif;   -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic' rel='stylesheet' type='text/css'>

<!-- Jquery UI -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
@endsection


@section('content')
        <!-- Your Code Here... -->
<div class="wrapper"> <!-- Start - Wrapper -->
    <div class="container"> <!-- Start Container -->
        <div class="row"> <!-- Start Header Row-->
            <div class="jumbotron">
                <h1>
                    Search with typeahead.js
                </h1>
            </div>
        </div><!-- End Header Row -->

        <div class="row"> <!-- Start Search Row-->
            <input id="search" type="text" placeholder="Enter an address">

        </div><!-- End Search  Row -->
    </div> <!-- End Container-->
</div> <!-- End Wrapper-->
@endsection


@section('script-header')
<!-- Jquery Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!-- Jquery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- typeahead.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
<!-- typeahead.js + bundle-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script>
    $(document).ready(function ($){
        console.log('JQuery Loaded..');


        $( "#search" ).keyup(function(){
            var search_keyword = $.trim($(this).val());
            console.log(search_keyword);

            var engine = new Bloodhound({
                remote: '/query?term='+search_keyword,
                // '...' = displayKey: '...'
                datumTokenizer: Bloodhound.tokenizers.whitespace('username'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            engine.initialize();

            $("#search").typeahead({
                hint: true,
                highlight: true,
                minLength: 2
            }, {
                source: engine.ttAdapter(),
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'User_list',
                // the key from the array we want to display (name,id,email,etc...)
                displayKey: 'username',
                templates: {
                    empty: [
                        '<div class="empty-message">unable to find any</div>'
                    ]
                }
            });
        });  <!-- End Search -->

    }); <!-- End jQuery Document -->
</script>
@endsection

