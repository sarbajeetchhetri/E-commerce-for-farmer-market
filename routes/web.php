<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/
/* FrontEnd Location */
Route::get('/','IndexController@index')->name('welcome');
Route::get('/list-products','IndexController@shop');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}','IndexController@detialpro');
Route::get('/contactus','IndexController@contact');
Route::get('/aboutus','IndexController@about');
Route::get('/newsfeed','IndexController@newsfeed');
Route::get('/help','IndexController@help');
////// get Attribute ////////////
Route::get('/get-product-attr','IndexController@getAttrs');
///// Cart Area /////////
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::get('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
/////////////////////////
/// Apply Coupon Code
Route::post('/apply-coupon','CouponController@applycoupon');
/// Simple User Login /////
Route::get('/login_page','UsersController@index');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');

//farmer//

Route::get('/farmer_login','UsersController@farmerloginpage');
/*
Route::post('/register_farmer','FarmerinfoController@register');
Route::post('/login_farmer','FarmerinfoController@loginfarmer');
Route::get('/logout_farmer','FarmerinfoController@logout');
*/

////// User Authentications ///////////
Route::group(['middleware'=>'FrontLogin_middleware'],function (){
    Route::get('/myaccount','UsersController@account');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::put('/update-password/{id}','UsersController@updatepassword');
    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    Route::get('/cod','OrdersController@cod');
    Route::get('/paypal','OrdersController@paypal');
    Route::get('/feedbackpage', 'UsersController@feedbackpage')->name('supplierfeedbackpage');
    Route::post('/addfeedbacks','UsersController@addfeedbacks')->name('supplieraddfeedbacks');
    Route::get('/feedback_lists', 'UsersController@Listfeedback')->name('supplierfeedbacklists');
    Route::get('/reply_index', 'UsersController@replyindex')->name('supplierreplyindex');
    Route::get('/reply_form/{id}','UsersController@replyform')->name('supplierreplyform');
    Route::put('/feedbackreplied/{id}','UsersController@updatereply')->name('supplierreplied');
});

Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');
    Route::get('/verify', 'AdminController@verifies');
    Route::get('/updateverification/{id}','AdminController@updateverification');
    Route::get('/country', 'AdminController@countryindex')->name('countryhome');
    Route::post('/countryadded','AdminController@addcountry')->name('addcountry');
    Route::get('/feedbackpage', 'AdminController@feedbackpage')->name('feedbackpage');
    Route::post('/addfeedbacks','AdminController@addfeedbacks')->name('addfeedbacks');
    Route::get('/feedback_lists', 'AdminController@Listfeedback')->name('feedbacklists');
    Route::get('/reply_index', 'AdminController@replyindex')->name('replyindex');
    Route::get('/reply_form/{id}','AdminController@replyform')->name('replyform');
    Route::put('/feedbackreplied/{id}','AdminController@updatereply')->name('replied');
///
});

///
Route::group(['middleware'=>'Farmer_middleware'],function (){
   Route::get('/farmerpanel', 'FarmerinfoController@indexfarmer')->name('farmer_home');
    /// Setting Area
    Route::get('/farmer/settings', 'FarmerinfoController@settingsfarmer');
    Route::get('/farmer/check-pwd','FarmerinfoController@chkPasswordfarmer');
    Route::post('/farmer/update-pwd','FarmerinfoController@updatefarmerPwd');
    /// Category Area
    Route::resource('/farmer/category','CategoryController');
    Route::get('/farmer/delete-category/{id}','CategoryController@destroy');
    Route::get('/farmer/check_category_name','CategoryController@checkCateName');
    /// Products Area
    Route::resource('/farmer/product','ProductsController');
    Route::get('/farmer/delete-product/{id}','ProductsController@destroy');
    Route::get('/farmer/delete-image/{id}','ProductsController@deleteImage');
    /// Product Attribute
    Route::resource('/farmer/product_attr','ProductAtrrController');
    Route::get('/farmer/delete-attribute/{id}','ProductAtrrController@deleteAttr');
    /// Product Images Gallery
    Route::resource('/farmer/image-gallery','ImagesController');
    Route::get('/farmer/delete-imageGallery/{id}','ImagesController@destroy');
    /// ///////// Coupons Area //////////
    Route::resource('/farmer/coupon','CouponController');
    Route::get('/farmer/delete-coupon/{id}','CouponController@destroy');
    Route::get('/farmer/checkorder', 'FarmerinfoController@checkorders');

    Route::get('/farmer/addkyc','FarmerinfoController@farmerprofile');
    Route::put('/farmer/update-kyc/{id}','FarmerinfoController@updatekyc');
    Route::get('/farmer/delete-citizenship/{id}','FarmerinfoController@deleteCitizen');

    Route::get('/farmerlogout','FarmerinfoController@logout');

    Route::get('/farmer/feedbackpage', 'FarmerinfoController@farmerfeedbackpage')->name('farmerfeedbackpage');
    Route::post('/farmer/addfeedbacks','FarmerinfoController@farmeraddfeedbacks')->name('farmeraddfeedbacks');
    Route::get('/farmer/feedback_lists', 'FarmerinfoController@farmerListfeedback')->name('farmerfeedbacklists');
    Route::get('/farmer/reply_index', 'FarmerinfoController@farmerreplyindex')->name('farmerreplyindex');
    Route::get('/farmer/reply_form/{id}','FarmerinfoController@farmerreplyform')->name('farmerreplyform');
    Route::put('/farmer/feedbackreplied/{id}','FarmerinfoController@farmerupdatereply')->name('farmerreplied');
});




// Admin Location 

