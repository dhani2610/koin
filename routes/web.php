<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// clear root view & cache

Route::get('all-clear', function () {
        Artisan::call('config:clear'); //config-clear
        Artisan::call('config:cache'); //config-cache
        Artisan::call('cache:clear'); //cache-clear
        Artisan::call('view:cache'); //view-cache
        Artisan::call('view:clear'); //view-clear
        Artisan::call('route:cache'); //route-cache
        Artisan::call('route:clear'); //route-clear

        return 'Configuration cache cleared! <br> Configuration cached successfully!';
});

Route::get('storage-link', function () {
        Artisan::call('storage:link');
        return 'The links have been created.';
});
//  logout user/customer
Route::get('logout-user', 'HomeController@logoutuser')
        ->name('logout-user');

Route::get('livewire', 'LivewireController@index');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')
        ->name('home');

Route::get('fetch-cart', 'HomeController@fetchcart');
Route::get('fetch-bestdeal', 'HomeController@fetchbestdeal');

Route::post('addbestdealhomeqty', 'HomeController@store');
Route::get('edit-student/{id}', 'HomeController@edit');

Route::get('about-us', 'AboutusController@index')
        ->name('about-us');

Route::get('shop-all', 'ShopallController@index')
        ->name('shop-all');

Route::get('deal', 'DealController@index')
        ->name('deal');

Route::get('rice', 'RiceController@index')
        ->name('rice');

Route::get('fruit', 'FruitController@index')
        ->name('fruit');

Route::get('meat-poultry', 'MeatpoultryController@index')
        ->name('meat-poultry');

Route::get('fish-seafood', 'FishseafoodController@index')
        ->name('fish-seafood');

Route::get('home-kitchen', 'HomekitchenController@index')
        ->name('home-kitchen');

Route::get('cleaning-supplies', 'CleaningsuppliesController@index')
        ->name('cleaning-supplies');

Route::get('personal-hygiene', 'PersonalhygieneController@index')
        ->name('personal-hygiene');

Route::get('babies', 'BabiesController@index')
        ->name('babies');

Route::get('most-popular', 'MostpopularController@index')
        ->name('most-popular');

Route::get('empety-bottle', 'EmpetybottleController@index')
        ->name('empety-bottle');


// Route::resource('detail-product', 'DetailproductController');

Route::get('detail-product/{id}', 'DetailproductController@index')
        ->name('detail-product');

Route::get('detail-empty-bottle/{id}', 'DetailemtpybottleController@index')
        ->name('detail-empty-bottle');

Route::get('checkout', 'CheckoutController@store')
        ->name('checkout');

Route::post('callback', 'CheckoutController@callback');


Route::get('customer-support', 'CustomersupportController@index')
        ->name('customer-support');


Route::get('cart', 'CartController@index')
        ->name('cart');

Route::get('co', 'CoController@index')
        ->name('co');

Route::get('success/{id}', 'CoController@success')
        ->name('success');


Route::middleware(['auth', 'preventBackHistory']) // ini diisi setelah instal middleware(satpam)
        // auth & admin, cek di kernel ada auth & admin
        ->group(function () {
                Route::get('wishlist', 'WishlistController@index')
                        ->name('wishlist');

                Route::resource('my-account', 'MyaccountController');
        });


Route::prefix('admin')
        ->namespace('Admin') 
        ->middleware(['auth', 'admin', 'preventBackHistory']) 
        ->group(function () {
                //koinpack
                Route::get('/', 'DashboardKoinpackController@index')
                        ->name('dashboard-koinpack');
                Route::resource('transactions', 'Koinpack_transactionController');
                Route::post('callback', 'Koinpack_transactionController@callback');
                Route::resource('products', 'Koinpack_productController');
                Route::resource('emptybottle', 'Koinpack_emptybottleController');
                Route::resource('locations', 'Koinpack_locationController');
                Route::resource('categories', 'Koinpack_categoryController');
                Route::resource('wishlists', 'Koinpack_wishlistController');
                Route::resource('shopping', 'Koinpack_shoping_cartController');
                Route::resource('vouchers', 'Koinpack_voucherController');
                Route::resource('slider-logo', 'Koinpack_sliderlogoController');
                Route::resource('customers', 'Koinpack_customerController');
                Route::get('user-profile/{id}', 'Koinpack_customerController@profile')->name('profile-user');
                Route::delete('status-customer/{id}', 'Koinpack_customerController@only_status')->name('customers_onlystatus');
                 
                 // send notification
                 Route::get('send-notification', 'SendnotificationController@index')
                 ->name('send-notification');
                 Route::post('save-token', 'SendnotificationController@saveToken')
                 ->name('save-token');
                 Route::post('send-notification', 'SendnotificationController@sendNotification')
                 ->name('send.notification');
                 Route::get('historynotification', 'SendnotificationController@historynotification')
                 ->name('historynotification');
                // send notification     

                Route::resource('settings', 'SettingController');

                Route::resource('content', 'ContentController');
                //my search navbar
                Route::post('/search', 'DashboardController@search')
                        ->name('searchnavbar');

                //koinpack

               
        });


Auth::routes(['verify' => true]);
