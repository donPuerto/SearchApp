@extends('layouts.master-page')

@section('title')
    Native Php Search
@endsection


@section('css-header')
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <!--[if IE]>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"><![endif]-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">

    <!--
    Google Fonts
        usage:
            font-family: 'Open Sans', sans-serif;
    -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>

    <!-- Jquery UI -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'>

    <!-- Jquery UI Themes -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/hot-sneaks/theme.min.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Parsley CSS -->
    <link rel="stylesheet" href="http://parsleyjs.org/src/parsley.css">

    <!-- Jquery Confirm CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/2.5.1/jquery-confirm.min.css">

       <!-- qTIP2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css">

    <!-- Spin CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/spin.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/tableLayout.css') }}">
@endsection



@section('content')
    <!-- Your Code Here... -->
    <div class="wrapper"> <!-- Start - Wrapper -->
        <div class="container"> <!-- Start Container -->
            <div class="row"> <!-- Start Header Row-->
                <div class="jumbotron">
                    <h1>
                        Native Php Search (Basic)
                    </h1>
                </div>
            </div><!-- End Header Row -->


            <div class="row"> <!-- Start Search Row-->
                <div class="form-group">
                    <div class="relative">
                        {!! Form::open(array('url' => '/native-php-search/search', 'method' => 'GET')) !!}
                            <input type="search" class="form-control" id="search" name="q" placeholder="Search&hellip;">
                        {!! Form::close() !!}
                        <div class="absolute">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" cellpadding="0" cellspacing="0" style="margin-top: 0px; border-color: #a94442"  width = "80%">
                                    <tbody>
                                    @if(empty($contacts))
                                        <tr >
                                            <td style="border-left: 1.5px solid #ffccd4; border-right: 1.5px solid #ffccd4;border-bottom: 1.5px solid #ffccd4; border-top: 2px solid transparent;">Dude, FYI type a keyword..</td>
                                        </tr>
                                        @include('include.tr-information')

                                    @elseif($contacts->count())
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td width = "5%" style="border-left: 1.5px solid #ffccd4; border-right: 1.5px solid transparent;border-bottom: 1.5px solid #ffccd4; border-top: 2px solid transparent;">
                                                    <a href="#">
                                                        <img src="{{  $contact->imageUrl }}" alt="Dummy Photos" style="width:240px;height:260px";>

                                                    </a>

                                                </td>
                                                <td style="border-left: 1.5px solid #ffccd4; border-right: 1.5px solid #ffccd4;border-bottom: 1.5px solid #ffccd4; border-top: 2px solid transparent;">
                                                    <p style="margin: 0; font-family: 'Open Sans';"> Id: <strong>  {{ $contact->id }} </strong> </p>
                                                    <p style="margin: 0; font-family: 'Open Sans';">Created Date: <strong> {{ $contact->created_at }} </strong> || Updated Date: <strong>{{ $contact->updated_at }}  </strong></p>
                                                    <br>
                                                    <p style="margin: 0; font-family: 'Open Sans';">Name: <strong> {{ $contact->name }}  </strong></p>
                                                    <p style="margin: 0; font-family: 'Open Sans';">Job Title: <strong> {{ $contact->job_title }} </strong> </p>
                                                    <p style="margin: 0; font-family: 'Open Sans'; ">Company: <strong> {{ $contact->company }} </strong></p>

                                                    <br>

                                                    <p style="margin: 0; font-family: 'Open Sans' ">Phone 1: <strong>  {{ $contact->phone1 }} </strong> </p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Phone 2: <strong> {{ $contact->phone2 }}  </strong> </p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Email Address: <strong>  {{ $contact->emailadd }}  </strong></p>

                                                    <br>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Street Address 1: <strong>  {{ $contact->street_address1 }} </strong></p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Street Address 2: <strong> {{ $contact->street_address2 }}  </strong></p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">City: <strong> {{ $contact->city }}  </strong> </p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Postal Code: <strong> {{ $contact->postal_code }}  </strong></p>
                                                    <p style="margin: 0; font-family: 'Open Sans' ">Country: <strong> {{ $contact->country }}  </strong></p>


                                                </td>
                                            </tr>

                                        @endforeach
                                        @include('include.tr-information')

                                    @else

                                        <tr width="100%">
                                            <td style="border-left: 1.5px solid #ffccd4; border-right: 1.5px solid #ffccd4;border-bottom: 1.5px solid #ffccd4; border-top: 2px solid transparent;">Opps! Not your day... Records not found</td>
                                        </tr>
                                        @include('include.tr-information')

                                    @endif


                                    </tbody>


                                </table>
                            </div> <!-- Table Responsive -->
                        </div>
                    </div>




                </div>  <!-- Form Group -->


                <hr>
                <h3 style="font-family: 'Open Sans', sans-serif;font-weight: 600">What is Lorem Ipsum?</h3>
                <p style="text-align: justify; font-family: 'Open Sans', sans-serif;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                <h3 style="font-family: 'Open Sans', sans-serif;font-weight: 600">Where does it come from?</h3>
                <p style="text-align: justify; font-family: 'Open Sans', sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

                <h3 style="font-family: 'Open Sans', sans-serif;font-weight: 600">Why do we use it?</h3>
                <p style="text-align: justify; font-family: 'Open Sans', sans-serif;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

                <h3 style="font-family: 'Open Sans', sans-serif;font-weight: 600">Where can I get some?</h3>
                <p style="text-align: justify; font-family: 'Open Sans', sans-serif;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            </div> <!-- End Row -->


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


    }); <!-- End jQuery Document -->
</script>
@endsection

