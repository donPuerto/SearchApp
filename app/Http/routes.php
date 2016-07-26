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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('home');
});
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

