<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loadedlet  by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\AdminLoginController@showLoginform')->name('custom.login');
Route::post('/custom-login-submit', 'CustomLoginController@custom_login')->name('user.custom.login.submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

//admin start

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


        //all taxi category management
        Route::get('/taxi-category-management', 'Admin\AdminCategoryController@taxi_category_management')->name('admin.taxt.category.management');
        Route::post('/taxi-category-management-save', 'Admin\AdminCategoryController@taxi_category_management_save')->name('admin.category.save');
        Route::post('/taxi-category-management-update', 'Admin\AdminCategoryController@taxi_category_management_update')->name('admin.category.update');
        Route::post('/taxi-category-management-delete', 'Admin\AdminCategoryController@taxi_category_management_delete')->name('admin.category.delete');



        //all truck category management
        Route::get('/truck-category-management', 'Admin\AdminCategoryController@truck_category_management')->name('admin.truck.category.management');
        Route::post('/truck-category-management-save', 'Admin\AdminCategoryController@truck_category_management_save')->name('admin.truck.category.save');
        Route::post('/truck-category-management-update', 'Admin\AdminCategoryController@truck_category_management_update')->name('admin.truck.category.update');
        Route::post('/truck-category-management-delete', 'Admin\AdminCategoryController@truck_category_management_delete')->name('admin.truck.category.delete');

        //all machinery category management
        Route::get('/machinery-category-management', 'Admin\AdminCategoryController@machinery_category_management')->name('admin.machinery.category.management');
        Route::post('/machinery-category-management-save', 'Admin\AdminCategoryController@machinery_category_management_save')->name('admin.machinery.category.save');
        Route::post('/machinery-category-management-update', 'Admin\AdminCategoryController@machinery_category_management_update')->name('admin.machinery.category.update');
        Route::post('/machinery-category-management-delete', 'Admin\AdminCategoryController@machinery_category_management_delete')->name('admin.machinery.category.delete');

        //all machinery category management
        Route::get('/store-category-management', 'Admin\AdminCategoryController@store_category_management')->name('admin.store.category.management');
        Route::post('/store-category-management-save', 'Admin\AdminCategoryController@store_category_management_save')->name('admin.store.category.save');
        Route::post('/store-category-management-update', 'Admin\AdminCategoryController@store_category_management_update')->name('admin.store.category.update');
        Route::post('/store-category-management-delete', 'Admin\AdminCategoryController@store_category_management_delete')->name('admin.store.category.delete');

        //all restaurant category management
        Route::get('/restaurant-category-management', 'Admin\AdminCategoryController@restaurant_category_management')->name('admin.restaurant.category.management');
        Route::post('/restaurant-category-management-save', 'Admin\AdminCategoryController@restaurant_category_management_save')->name('admin.restaurant.category.save');
        Route::post('/restaurant-category-management-update', 'Admin\AdminCategoryController@restaurant_category_management_update')->name('admin.restaurant.category.update');
        Route::post('/restaurant-category-management-delete', 'Admin\AdminCategoryController@restaurant_category_management_delete')->name('admin.restaurant.category.delete');


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
//admin end
Route::group(['middleware' => ['auth:multivendorstore']], function() {
    Route::prefix('multivendorstore')->group(function() {

        Route::get('/', 'MultivendorStore\MultivendorStoreController@index')->name('multivendorstore.dashboard');

        //category
        Route::get('/category', 'MultivendorStore\MultivendorStoreCategoryController@category')->name('multivendor.store.category');
        Route::post('/category-save', 'MultivendorStore\MultivendorStoreCategoryController@category_save')->name('multivendorstore.category.save');
        Route::post('/category-update', 'MultivendorStore\MultivendorStoreCategoryController@category_update')->name('multivendorestore.category.update');
        Route::post('/category-delete', 'MultivendorStore\MultivendorStoreCategoryController@category_delete')->name('multivendorestore.category.delete');

        //products
        Route::get('/product-list', 'MultivendorStore\MultivendorStoreProductController@products_list')->name('multivendor.store.products');
        Route::get('/product-create', 'MultivendorStore\MultivendorStoreProductController@products_create')->name('multivendorstore.create.product');
        Route::post('/product-save', 'MultivendorStore\MultivendorStoreProductController@products_save')->name('multivendorstore.product.save');
        Route::get('/product-edit/{id}', 'MultivendorStore\MultivendorStoreProductController@products_edit')->name('multivendorestore.edit.product');
        Route::post('/product-update', 'MultivendorStore\MultivendorStoreProductController@products_update')->name('multivendorstore.product.update');
        Route::post('/product-delete', 'MultivendorStore\MultivendorStoreProductController@products_delete')->name('multivendorestore.product.delete');


    });
});



Route::group(['middleware' => ['auth:provider']], function() {
    Route::prefix('provider')->group(function() {

        Route::get('/', 'Provider\ProviderController@index')->name('provider.dashboard');


    });
});


Route::group(['middleware' => ['auth:restaurant']], function() {
    Route::prefix('restaurant')->group(function() {

        Route::get('/', 'Restaurant\RestaurantController@index')->name('restaurant.dashboard');


        //category
        Route::get('/category', 'Restaurant\RestaurantCategoryController@category')->name('restaurant.category');
        Route::post('/category-save', 'Restaurant\RestaurantCategoryController@category_save')->name('restaurant.category.save');
        Route::post('/category-update', 'Restaurant\RestaurantCategoryController@category_update')->name('restaurant.category.update');
        Route::post('/category-delete', 'Restaurant\RestaurantCategoryController@category_delete')->name('restaurant.category.delete');

        //food item
        Route::get('/food-item-list', 'Restaurant\RestaurantFoodController@food_list')->name('restaurant.food');
        Route::post('/food-item-save', 'Restaurant\RestaurantFoodController@food_item_save')->name('restaurant.food.save');
        Route::post('/food-item-update', 'Restaurant\RestaurantFoodController@food_item_update')->name('restaurant.food.update');
        Route::post('/food-item-delete', 'Restaurant\RestaurantFoodController@food_item_delete')->name('restaurant.food.delete');



    });
});

