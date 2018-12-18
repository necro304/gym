<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|



*/

/*
 * user
 */

Route::Apiresource('users', 'User\UserController');
/*
 * Customer
 */
Route::Apiresource('customers.managements', 'User\CustomerManagementController',['only' => ['index']]);
Route::Apiresource('customers.sales', 'User\CustomerSaleController', ['only'=>['index']]);
Route::Apiresource('customers.debts', 'User\CustomerDebtController',['only'=>['index']]);
Route::Apiresource('customers.plans', 'User\CustomerPlanController',['only'=>['index']]);

/*
 * management
 */
Route::Apiresource('managements', 'Management\ManagementController');

/*
 * payment
 */

Route::Apiresource('payments', 'Payment\PaymentController');


/*
 * plan
 */
Route::Apiresource('plans', 'Plan\PlanController');
Route::Apiresource('plans', 'Plan\PlanCustomerController',['only' => ['index']]);

/*
 * Sales Master
 */

Route::Apiresource('salesMaster', 'Sale\SaleMasterController');
Route::Apiresource('salesMaster.products', 'Sale\SaleMasterProductController',['only' => ['index']]);

/*
 * Sales Details
 */
Route::Apiresource('salesDetails', 'Sale\SaleDetailController');


/*
 * products
 */
Route::Apiresource('products', 'Product\ProductController');
Route::Apiresource('products.categories', 'Product\ProductCategoryController',['only' => ['index']]);


/*
 * Categories
 */

Route::Apiresource('categories', 'Category\CategoryController');
Route::Apiresource('categories.products', 'Category\CategoryProductController',['only' => ['index']]);

/*
 * Debts
 */
Route::Apiresource('debtsCustomers', 'Debt\DebtCustomerController',['only'=>['index']]);


Route::Apiresource('debtsPayments', 'Debt\DebtPaymentController');


/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


