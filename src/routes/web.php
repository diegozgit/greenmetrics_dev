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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register user Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Register admin Routes
         */
        Route::get('/register-admin', 'RegisterController@showAdmin')->name('registerAdmin.show');
        Route::post('/register-admin', 'RegisterController@registerAdmin')->name('registerAdmin.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth:web,admin,supplier']], function() {
        /*
         *
         * Logout Routes
        */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /*
         *
         * Verification Routes
        */
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

        Route::group(['middleware' => ['verified', 'auth:web']], function() {
            /**
             * Contract Routes
             */
            Route::get('/addcontracts', 'ContractController@addContractIndex')->name('add-contract.index');
            Route::get('/mycontracts', 'ContractController@myContractsIndex')->name('my-contracts.index');
            Route::post('/addcontracts', 'ContractController@add')->name('add-contract');
            Route::delete('/mycontracts', 'ContractController@destroy')->name('delete-contract');

            /**
             * Carbon Footprint Routes
             */
            Route::get('/carbonfootprint', 'CarbonFootprintController@index')->name('carbon-footprint.index');
            Route::post('/carbonfootprint', 'CarbonFootprintController@estimate')->name('estimate');

            /**
             * Branch Routes
             */
            Route::get('/branches', 'BranchController@index')->name('branches.index');
            Route::post('/branches', 'BranchController@create')->name('create-branch');

            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
            Route::get('/dashboard/change-password', 'DashboardController@changePassword')->name('dashboard.change-password');
            Route::post('/dashboard/change-password', 'DashboardController@updatePassword')->name('update-password');
            Route::post('/dashboard', 'DashboardController@updateInfo')->name('update-info');
            Route::get('/dashboard/manage-branches', 'DashboardController@userBranches')->name('dashboard.manage-branches');
            Route::delete('/dashboard/manage-branches', 'DashboardController@destroyBranch')->name('dashboard.manage-branches.delete');
        });

        Route::group(['middleware' => ['verified', 'auth:admin']], function() {
            /**
            * Register supplier Routes
            */
            Route::get('/register-supplier', 'RegisterController@showSupplier')->name('registerSupplier.show');
            Route::post('/register-supplier', 'RegisterController@registerSupplier')->name('registerSupplier.perform');

        });

        Route::group(['middleware' => ['verified', 'auth:supplier']], function() {
            /**
             * offers Routes
             */
            Route::get('/addoffers', 'OfferController@addOfferIndex')->name('add-offer.index');
            Route::post('/addoffers', 'OfferController@add')->name('add-offer');
            //Route::delete('/myoffers', 'OfferController@destroy')->name('delete-offer');
        });

    });
});
Route::fallback(function () {
    return view('errors.custom'); // Personalizza il nome della vista e il percorso in base alle tue esigenze
});
