@extends('layouts.master-page')

@section('title')
    jQuery AJAX Search App Compilation
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
        <div class="row"> <!-- Start Main Row-->
            <div class="jumbotron">
                <h1>
                    jQuery AJAX Search App Compilation
                </h1>
            </div>

            <div class="row">
                <div class="form-group ui-widget">
                    <label for="usr">Search:</label>
                    <input type="text" class="form-control" id="search">

                </div>
                <h3>Search Query</h3>
                <table class="table table-condensed table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="name"></td>
                            <td class="email"></td>
                            <td class="phone"></td>
                            <td class="address"></td>
                            <td class="created"></td>
                            <td class="updated"></td>
                        </tr>

                    </tbody>
                </table>
            </div>


        </div><!-- End Main Row -->
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
<script>
    $(document).ready(function (){
        console.log('JQuery Loaded..');

        $( "#search" ).autocomplete({
            source: '/autocomplete',
            minLength: 1,
            delay:500,
            autoFocus: true,
            select: function( event, ui ) {
                $(".name").html(ui.item.value);
                $(".email").html(ui.item.emailadd);
                $(".phone").html(ui.item.phone);
                console.log(ui.item);
            }
        });

    });
</script>
@endsection



