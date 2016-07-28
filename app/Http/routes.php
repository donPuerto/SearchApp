<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Contact;

use Illuminate\Support\Facades\Response;

//Directory - Link Navigation
Route::get('/', function () {
    return view('directory');
});

/*
## Road Map
* ~~Native Php Search (Basic) using table~~ Want to add pagination and extra information
* Native Php Search with Highlighter
* Jquery Hide and Seek Search Plugin
* ~~Jquery AutoComplete Search (Basic)~~
* Jquery AutoComplete with multiple rows
* Twitter Plugin Search
* Elastic Search
* Algolia Search
*/

/*Native Php Search (Basic) using table with pagination and additional information*/
//View Page
Route::get('/native-php-search', function () {
    return view('pages/native-php-search')->with('contacts', Contact::take(0)->get());
});

//Do Search
Route::get('/native-php-search/search', function() {
    $query = trim(preg_replace('/[\s\t\n\r\s]+/', ' ', strtolower(Request::input('q'))));

    //Search if not equal not empty
    if (!$query =="") {
        $contacts = Contact::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('job_title', 'LIKE', '%' . $query . '%')
            ->orWhere('company', 'LIKE', '%' . $query . '%')
            ->orWhere('phone1', 'LIKE', '%' . $query . '%')
            ->orWhere('phone2', 'LIKE', '%' . $query . '%')
            ->orWhere('emailadd', 'LIKE', '%' . $query . '%')
            ->orWhere('postal_code', 'LIKE', '%' . $query . '%')
            ->orWhere('street_address1', 'LIKE', '%' . $query . '%')
            ->orWhere('street_address2', 'LIKE', '%' . $query . '%')
            ->orWhere('country', 'LIKE', '%' . $query . '%')
            ->paginate(5);

        return view('pages/native-php-search', compact('contacts'));
    }else{
        return view('pages/native-php-search')->with('contacts', '');
    }
});
/*Native Php Search (Basic) using table*/





Route::get('/jquery-ui-search-autocomplete', function () {
    return view('jQueryUISearchAutocomplete');
});



Route::get('/autocomplete', function (Request $request) {

    //get character entry
    $term = $request->term;
    $contact = Contact::
         where('name','LIKE', '%' . $term .'%')
        ->take(10)
        ->get();

    $result = [];
    foreach($contact as $key => $val){
        $result[] = [
            'id' => $val->id,
            'value' => $val->name
        ];
    }

    return Response::json($result);
});


/*jQuery Ajax Live Data Search*/
Route::get('/api/contact', function (Request $request) {
    if($request->ajax()){
        $term = $request->get('term');
        $contact = Contact::where('name','LIKE', '%' . $term .'%')
            ->orWhere('emailadd', 'LIKE', '%'.  $term .'%')
            ->orWhere('phone', 'LIKE', '%'.  $term .'%')
            ->take(10)
            ->get();
        return Response::json($contact);
    }

});

Route::get('/jquery-ajax-live-data-search-app', function (Request $request) {

    return view('AjaxLiveDataSearch');

});


/*jQuery Ajax Live Data Search with Popover*/
Route::get('/jquery-ajax-live-data-search-with-popver', function (Request $request) {

    return view('AjaxLiveDataSearchWithPopover');

});






/*Typeahead Search*/
Route::get('/search-with-typeahead', function (Request $request) {

    return view('SearchWithTypeAhead');

});
Route::get('/query', function (Request $request) {

    $term = Input::get('term');
    return  $term;
    $res   = Contact::where('name', 'LIKE', '%' . $term .'%')->get();
    return Response::json($res);


});

