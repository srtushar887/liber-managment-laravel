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

Route::get('/', 'Auth\AdminLoginController@showLoginform');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //profile
        Route::get('/profile', 'Admin\AdminController@profile')->name('admin.profile');
        Route::post('/profile-update', 'Admin\AdminController@profile_update')->name('admin.profile.update');

        //change password
        Route::get('/change-password', 'Admin\AdminController@change_password')->name('admin.change.password');
        Route::post('/change-password-update', 'Admin\AdminController@change_password_update')->name('admin.password.update');

        //general settings
        Route::get('/general-setting', 'Admin\AdminController@general_setting')->name('admin.general.settings');
        Route::post('/general-setting-save', 'Admin\AdminController@general_setting_save')->name('admin.general.setting.update');


        //user management
        Route::get('/create-user', 'Admin\AdminUserController@create_user')->name('admin.create.user');
        Route::post('/create-user-save', 'Admin\AdminUserController@create_user_save')->name('admin.user.save');
        Route::get('/manage-users', 'Admin\AdminUserController@manage_users')->name('admin.manager.user');
        Route::get('/manage-users-get', 'Admin\AdminUserController@manage_users_get')->name('admin.get.users');
        Route::get('/edit-user/{id}', 'Admin\AdminUserController@edit_user')->name('admin.user.edit');
        Route::post('/update-user', 'Admin\AdminUserController@update_user')->name('admin.user.update');
        Route::post('/delete-user', 'Admin\AdminUserController@delete_user')->name('admin.user.delete');
        Route::post('/user-password-change-save', 'Admin\AdminUserController@user_change_password_save')->name('admin.user.chnage.password.save');


        //all category management
        Route::get('/category-management', 'Admin\AdminCategoryController@category_management')->name('admin.category.management');
        Route::post('/category-management-save', 'Admin\AdminCategoryController@category_management_save')->name('admin.category.save');
        Route::post('/category-management-update', 'Admin\AdminCategoryController@category_management_update')->name('admin.category.update');
        Route::post('/category-management-delete', 'Admin\AdminCategoryController@category_management_delete')->name('admin.category.delete');




        //rider managemnt
        Route::get('/rider-management', 'Admin\AdminRiderController@rider_management')->name('admin.riger.management');
        Route::post('/rider-status-change', 'Admin\AdminRiderController@rider_status_change')->name('admin.rider.status.change');


        //food item management
        Route::get('/foot-item', 'Admin\AdminRestaurantController@food_item')->name('admin.multivendor.food.item');
        Route::post('/foot-item-save', 'Admin\AdminRestaurantController@food_item_save')->name('admin.food.item.save');
        Route::post('/foot-item-update', 'Admin\AdminRestaurantController@food_item_update')->name('admin.food.item.update');
        Route::post('/foot-item-delete', 'Admin\AdminRestaurantController@food_item_delete')->name('admin.food.item.delete');


        //restaurant
        Route::get('/create-restaurant', 'Admin\AdminRestaurantController@create_restaurant')->name('admin.create.restaurant');
        Route::post('/restaurant-save', 'Admin\AdminRestaurantController@restaurant_save')->name('admin.restaurant.save');
        Route::get('/restaurant-manage', 'Admin\AdminRestaurantController@restaurant_manage')->name('admin.restaurant.manage');
        Route::get('/restaurant-edit/{id}', 'Admin\AdminRestaurantController@restaurant_edit')->name('admin.restaurant.edit');
        Route::post('/restaurant-update', 'Admin\AdminRestaurantController@restaurant_update')->name('admin.restaurant.update');
        Route::post('/restaurant-delete', 'Admin\AdminRestaurantController@restaurant_delete')->name('admin.restaurant.delete');


        //store management
        Route::get('/store-create', 'Admin\AdminMultivendorController@store_create')->name('admin.store.create');
        Route::post('/store-save', 'Admin\AdminMultivendorController@store_save')->name('admin.store.save');
        Route::get('/store-manage', 'Admin\AdminMultivendorController@store_manage')->name('admin.store.manage');
        Route::get('/store-edit/{id}', 'Admin\AdminMultivendorController@store_edit')->name('admin.store.edit');
        Route::post('/store-update', 'Admin\AdminMultivendorController@store_update')->name('admin.store.update');
        Route::post('/store-delete', 'Admin\AdminMultivendorController@store_delete')->name('admin.store.delete');

        //multivendor deliver boy
        Route::get('/delivery-boy', 'Admin\AdminMultivendorController@deliver_boy')->name('admin.deliver.boy');
        Route::post('/delivery-boy-save', 'Admin\AdminMultivendorController@deliver_boy_save')->name('admin.delivery.boy.save');
        Route::post('/delivery-boy-update', 'Admin\AdminMultivendorController@deliver_boy_update')->name('admin.delivery.boy.update');
        Route::post('/delivery-boy-delete', 'Admin\AdminMultivendorController@deliver_boy_delete')->name('admin.delivery.boy.delete');

        //provider management
        Route::get('/provider-create', 'Admin\AdminProviderController@create_provider')->name('admin.provider.create');
        Route::post('/provider-save', 'Admin\AdminProviderController@save_provider')->name('admin.provider.save');
        Route::get('/provider-manage', 'Admin\AdminProviderController@manage_provider')->name('admin.provider.manager');
        Route::get('/provider-edit/{id}', 'Admin\AdminProviderController@edit_provider')->name('admin.provider.edit');
        Route::post('/provider-update', 'Admin\AdminProviderController@update_provider')->name('admin.provider.update');
        Route::post('/provider-delete', 'Admin\AdminProviderController@delete_provider')->name('admin.provider.delete');
        Route::post('/provider-password-change', 'Admin\AdminProviderController@password_change_provider')->name('admin.provider.chnage.password.save');


       //driver management
        Route::get('/create-driver', 'Admin\AdminDriverController@create_driver')->name('admin.driver.create');
        Route::post('/save-driver', 'Admin\AdminDriverController@save_driver')->name('admin.driver.save');
        Route::get('/manage-driver', 'Admin\AdminDriverController@manage_driver')->name('admin.driver.manage');
        Route::get('/edit-driver/{id}', 'Admin\AdminDriverController@edit_driver')->name('admin.driver.edit');
        Route::post('/update-driver', 'Admin\AdminDriverController@update_driver')->name('admin.driver.update');
        Route::post('/delete-driver', 'Admin\AdminDriverController@delete_driver')->name('admin.driver.delete');
        Route::post('/password-change-driver', 'Admin\AdminDriverController@password_change_driver')->name('admin.driver.chnage.password.save');

    });
});
