@extends('layouts.master-page')

@section('title')
    jQuery AJAX Live Data Search App
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
                        jQuery AJAX Live Data Search App
                    </h1>
                </div>
            </div><!-- End Header Row -->

            <div class="row"> <!-- Start Search Row-->
                <div class="form-group ui-widget">
                    <label for="search">Search:</label>
                    <input type="text" class="form-control" id="search" name="search">
                </div>

                <h3>Search Query</h3>
                <table class="table table-responsive table-borderless search-query"></table>

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
<script>
    $(document).ready(function (){
        console.log('JQuery Loaded..');


        $( "#search" ).keyup(function(){
            var search_keyword = $.trim($(this).val());
            var dataString = 'term=' + search_keyword;
            console.log(dataString);
            if( search_keyword != ''){
                $.ajax({
                    type: "GET",
                    url: "api/contact",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        console.log(data);

                        $('#seacrh').on('change','input', function(){
                            console.log('hello world');
                        });
                            $.each(data, function(key, value) {
                                /*console.log('key: ' + key + '\n' + 'value: ' + value.name);*/
                                console.log(value.emailadd);
                                $('.search-query').append(
                                        '<tbody style="border: 1px solid #f2f2f2; color: #696969">' +
                                        '<tr ><td><span style="font-weight:bold ">Name: </span> <a href="#">' +  value.name + '</a></td><td><span style="font-weight:bold" ; "align=right" >Address: </span>' + value.address + '</td></tr>' +
                                        '<tr><td><span style="font-weight:bold ">Phone: </span>' + value.phone + '</td><td><span style="font-weight:bold ">Email Address:  </span>' + value.emailadd + '</td></tr>' +
                                        '<tr><td><span style="font-weight:bold ">Date Created: </span>' + value.created_at + '</td><td><span style="font-weight:bold ">Date Updated: </span>' + value.updated_at + '</td></tr>' +
                                        '</tbody>'
                                ).delay(500).slideDown("slow");
                            });
                    }



                });
            }
            $('.search-query').empty();
        });  <!-- End Search -->

    }); <!-- End jQuery Document -->
</script>
@endsection

