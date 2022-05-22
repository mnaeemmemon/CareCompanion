<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminchatController;
use App\Http\Controllers\Admin\AdmindeliveryController;
use App\Http\Controllers\Admin\AdmindetailsController;
use App\Http\Controllers\Admin\AdminhomeController;
use App\Http\Controllers\Admin\AdminuserController;
use App\Http\Controllers\Admin\AdminloginController;
use App\Http\Controllers\Admin\AdminnotificationsController;
use App\Http\Controllers\Admin\AdminordersController;
use App\Http\Controllers\Admin\AdminorderdetailsController;
use App\Http\Controllers\Admin\AdminpharmacyController;
use App\Http\Controllers\Admin\AdminproductsController;
use App\Http\Controllers\Admin\AdminresetpasswordController;
use App\Http\Controllers\Admin\AdminsettingsController;
use App\Http\Controllers\Admin\AdminsignupController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminSearchControllerAPI;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Pharmacy\PharmacyAccountController;
use App\Http\Controllers\Pharmacy\PharmacyaccsetController;
use App\Http\Controllers\Pharmacy\PharmacyAddCategoryController;
use App\Http\Controllers\Pharmacy\PharmacyAddMedicineController;
use App\Http\Controllers\Pharmacy\PharmacyChatController;
use App\Http\Controllers\Pharmacy\PharmacyDeliveryController;
use App\Http\Controllers\Pharmacy\PharmacyHomeController;
use App\Http\Controllers\Pharmacy\PharmacyinvoiceController;
use App\Http\Controllers\Pharmacy\PharmacylistController;
use App\Http\Controllers\Pharmacy\PharmacyslipController;
use App\Http\Controllers\Pharmacy\Pharmacyorderdetails2Controller;
use App\Http\Controllers\Pharmacy\PharmacynotificationsController;
use App\Http\Controllers\Pharmacy\PharmacyresetpasswordController;
use App\Http\Controllers\Pharmacy\PharmacysalesController;
use App\Http\Controllers\Pharmacy\PharmacysalesorController;
use App\Http\Controllers\Pharmacy\PharmacysignupController;
use App\Http\Controllers\Pharmacy\PharmacyupdatemedicineController;
// use App\Http\Controllers\Pharmacy\PharmacySaleOrAPIController;
use App\Http\Controllers\Pharmacy\PharmacySaleOrAPIController;
use App\Http\Controllers\Pharmacy\PharmacySearchControllerAPI;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\UserHandlingControllerAPI;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PDFController;
/*


use App\Http\Controllers\PDFController;


|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    // dd($request->user()->pharmacist);
    // return $request->user()->role;

    if($request->user()->role == 1)
    {
        // dd('pharmacy');
        auth()->user()->tokens()->delete();
        return ['msg' => 'logout'];
    }
    elseif($request->user()->role == 2)
    {
        auth()->user()->tokens()->delete();
        return ['msg' => 'logout'];
        // dd('Admin');
    }


});



//PHARMACY INVOICE PDF
Route::post('generate-pharmacy-invoice', [PDFController::class, 'pharmacy_invoice']);
Route::get('/invoice/{id}',[PDFController::class, 'pharmacy_invoice_get']);

//ROUGH APIs ( NO USE JUST IMG SETTING PURPOSE IN START OF PROJECT.)
Route::post('/editRider/{id}', [AdmindeliveryController::class, "API_FOR_IMAGE_IN_RIDER"]); //ROUGH API
Route::post('/editPharmacyPIC/{id}', [AdminpharmacyController::class, "API_FOR_IMAGE_IN_PHARMACY"]); //ROUGH API
Route::post('/editUser/{id}', [AdminuserController::class, "API_FOR_IMG_IN_USERS"]); //ROUGH API


Route::get('getSelection',[PharmacysalesorController::class,'CONTROL_FOR_SELECTION_SALESOR']);





// ADMIN AUTHENTICATION


Route::middleware('auth:sanctum')->get('/check', function (Request $request) {
    if($request->user()->role != 2)
    {
        // dd('pharmacy');
        // auth()->user()->tokens()->delete();
        return ['msg' => 'NOT ADMIN'];
    }
    return ['msg' => 'ADMIN'];
});






//  ADMIN

//ORDER
Route::middleware('auth:sanctum')->get('/adminorders', [AdminordersController::class, "index_API"]); //checked
Route::middleware('auth:sanctum')->get('/orderdetails/{id}', [AdminorderdetailsController::class, "index_API"]); //checked

//PRODUCT
Route::middleware('auth:sanctum')->get('/adminproducts', [AdminproductsController::class, "index_API"]); //checked

//DELIVERY
Route::middleware('auth:sanctum')->get('/admindelivery', [AdmindeliveryController::class, "index_API"]); //checked
Route::middleware('auth:sanctum')->post('admin_rider_add', [AdmindeliveryController::class, "Add_Rider_API"]);                      //TESTED
Route::middleware('auth:sanctum')->post('update_rider/{id}', [AdmindeliveryController::class, "update_rider_confirm_API"]);         //TESTED
Route::middleware('auth:sanctum')->get('AdminDeleteRider/{id}',  [AdmindeliveryController::class, "Delete_Rider_API"]);             //TESTED
Route::middleware('auth:sanctum')->get('AdminDeliverySection', [AdmindeliveryController::class, "Index_Deliveries_API"]);           //TESTED

//  ADMIN PHARMACY SECTION
Route::middleware('auth:sanctum')->get('/adminpharmacy', [AdminpharmacyController::class, "index_API"]);                            //TESTED      
Route::middleware('auth:sanctum')->post('admin_add_pharmacy', [AdminpharmacyController::class, "Add_Pharmacy_API"]);                //TESTED    
Route::middleware('auth:sanctum')->post('admin_update_pharmacy/{id}', [AdminpharmacyController::class, "Update_Pharmacy_API"]);     //TESTED   
Route::middleware('auth:sanctum')->get('AdminDeletePharmacy/{id}', [AdminpharmacyController::class, "Delete_Pharmacy_API"]);        //TESTED   

//USER
Route::middleware('auth:sanctum')->get('/adminuser', [AdminuserController::class, "index_API"]); //checked

//PAYMENT
Route::middleware('auth:sanctum')->get("AdminTransactions",[AdminAccountController::class, "Admin_Transactions_API"]);    //TESTED           
Route::middleware('auth:sanctum')->get("AdminSellerAccounts",[AdminAccountController::class, "AdminSellerAccounts_API"]); //TESTED          
    
Route::middleware('auth:sanctum')->get('AdminAccountStatus/{id}',[AdminAccountController::class, "AdminAccountStatus_API"]); 
    

//SEARCH
Route::middleware('auth:sanctum')->get('search/{helper}/{search}',[AdminSearchControllerAPI::class, "Search_ADMIN"]); 

//NOTIFICATIONS
Route::middleware('auth:sanctum')->get('/adminnotifications', [AdminnotificationsController::class, "index_API"]);
Route::middleware('auth:sanctum')->get('mark_as_read/{id}',[AdminnotificationsController::class, "mark_as_read_API"]);
















//PHARMACY

//PRODUCT IN PHARMACY
// Route::post('/pharmacyaddmedicine', [PharmacyAddMedicineController::class, "add_product"]);
Route::middleware('auth:sanctum')->post('/pharmacyaddmedicine/{pharm_id}', [PharmacyAddMedicineController::class, "add_product_API"]); // API //TESTED
// Route::post('/pharmacyUPDATEproduct', [PharmacyupdatemedicineController::class, "update_product"]);
Route::middleware('auth:sanctum')->post('/pharmacyUPDATEproduct/{pharm_id}/{id}', [PharmacyupdatemedicineController::class, "update_product_API"]); // API // TESTED
// Route::get('/pharmacyDeletemedicine/{id}',[PharmacyAddMedicineController::class, "delete_product"]);
Route::middleware('auth:sanctum')->get('/pharmacyDeletemedicine/{pharm_id}/{id}',[PharmacyAddMedicineController::class, "delete_product_API"]);    //API //TESTED
// Route::get('/pharmacylist', [PharmacylistController::class, "index"]);  //PRODUCT READ
// Route::middleware('auth:sanctum')->get('/pharmacylist/{pharm_id}', [PharmacylistController::class, "index_api"]);  //API //TESTED
Route::middleware('auth:sanctum')->get('/pharmacylist', [PharmacylistController::class, "index_api"]);  //API //TESTED

//ADD CATEGORY
// Route::post('/add_category', [PharmacyAddMedicineController::class, "add_category_API"]);

Route::middleware('auth:sanctum')->post('/category/add',[PharmacyAddMedicineController::class, "Add_cat"]);                                 //TESTED
Route::middleware('auth:sanctum')->get('/categories',[PharmacyAddMedicineController::class, "category_list_API"]);                          //TESTED
Route::middleware('auth:sanctum')->get('/category/{id}',[PharmacyAddMedicineController::class, "category_by_id_API"]);                      //TESTED
Route::middleware('auth:sanctum')->get('/category/delete/{id}',[PharmacyAddMedicineController::class, "delete_category_API"]);              //TESTED
Route::middleware('auth:sanctum')->post('/category/update/{id}', [PharmacyAddMedicineController::class, "update_category_API"]);            //TESTED




//ORDER IN PHARMACY
// Route::middleware('auth:sanctum')->get('/pharmacysales/{id}', [PharmacysalesController::class, "index_API"]);   //VIEW //TESTED
Route::middleware('auth:sanctum')->get('/pharmacysales', [PharmacysalesController::class, "index_API"]);   //VIEW //TESTED
Route::middleware('auth:sanctum')->get('/orderdetails_of_order_id/{id}', [Pharmacyorderdetails2Controller::class, "index_API"]); // Details //TESTED
Route::middleware('auth:sanctum')->get('/deleteOrder/{id}', [PharmacysalesController::class, "delete_order_API"]);  // Delete Order //TESTED
Route::middleware('auth:sanctum')->get('order/update/status/{id}/{status}',[PharmacysalesController::class, "Update_order_status_API"]); //Status change //TESTED


//DELIVERY IN PHARMACY
// Route::middleware('auth:sanctum')->get('/pharmacydelivery/{id}', [PharmacyDeliveryController::class, "index_API"]); //TESTED
Route::middleware('auth:sanctum')->get('/pharmacydelivery', [PharmacyDeliveryController::class, "index_API"]); //TESTED
Route::middleware('auth:sanctum')->get('order/update/deliverystatus/{id}/{status}',[PharmacysalesController::class, "Update_del_order_status_API"]); //Status change //TESTED

//SALES in PHARMACY
// Route::get('/pharmacysalesor/{mode}/{id}', [PharmacySaleOrAPIController::class, "all"]);
Route::middleware('auth:sanctum')->get('/pharmacysalesor/{mode}', [PharmacySaleOrAPIController::class, "all"]);
// Route::get('/pharmacysalesor', [PharmacysalesorController::class, "index"]);


//PAYMENT in PHARMACY
// Route::middleware('auth:sanctum')->get('PharmacyTransactions/{id}', [PharmacyAccountController::class, "PharmacyTransactions_API"]); //TESTED
Route::middleware('auth:sanctum')->get('PharmacyTransactions', [PharmacyAccountController::class, "PharmacyTransactions_API"]); //TESTED
// Route::middleware('auth:sanctum')->get('PharmacyAccountStatus/{id}', [PharmacyAccountController::class, "PharmacyAccountStatus_API"]); //TESTED
Route::middleware('auth:sanctum')->get('PharmacyAccountStatus', [PharmacyAccountController::class, "PharmacyAccountStatus_API"]); //TESTED

//NOTIFICATIONS

// Route::middleware('auth:sanctum')->get('/pharmacynotifications/{pharm_id}', [PharmacynotificationsController::class, "index_API"]);
Route::middleware('auth:sanctum')->get('/pharmacynotifications', [PharmacynotificationsController::class, "index_API"]);
Route::middleware('auth:sanctum')->get('/mark_as_read_pharmacy/{id}', [PharmacynotificationsController::class, "mark_as_read_pharmacy_API"]);


//SEARCH
Route::middleware('auth:sanctum')->get('search/{id}/{helper}/{search}',[PharmacySearchControllerAPI::class, "Search_PHARM"]); 








//PHARMACY REGISTRATION & SETTINGS
Route::post('register/pharmacy', [CustomAuthController::class, 'customRegistration_pharmacy_API']); 
Route::post('login/pharmacy', [CustomAuthController::class, 'customLogin_API']); 
Route::post('settings/pharmacy', [PharmacyaccsetController::class, "Pharmacy_Settings_API"]);

//ADMIN LOGIN
Route::post('login/admin', [CustomAuthController::class, 'customLogin_ADMIN_API']); 







//CART 
Route::middleware('auth:sanctum')->post('/add_to_cart',[CartController::class, 'add_to_cart']); //API //TESTED
Route::middleware('auth:sanctum')->get('delete_to_cart/{id}',[CartController::class, 'delete_to_cart']);    //API //TESTED

//USER REGISTRATION & SETTINGS
Route::post('register/user', [CustomAuthController::class, 'customRegistration_API']); 
Route::post('login/user', [CustomAuthController::class, 'customLogin_USER_API']);
Route::middleware('auth:sanctum')->post('logout/user', [CustomAuthController::class, 'signOut_USER_API']); 
// Route::get('', [CustomAuthController::class, 'signOut_USER_API']);
Route::middleware('auth:sanctum')->post('settings/user', [UserHandlingControllerAPI::class, 'Settings_Done_API']); 
//User setting acc info
Route::middleware('auth:sanctum')->post('accountSettings/user', [CustomAuthController::class, 'set_user_Account_INFO']); 
//USER ORDER & ORDERDETAIL API
Route::middleware('auth:sanctum')->post('enter/order', [UserHandlingControllerAPI::class, 'enter_order_api']); 
Route::middleware('auth:sanctum')->post('enter/orderdetails', [UserHandlingControllerAPI::class, 'enter_order_detail_api']); 
//MAKING A NOTIFICATION API
Route::middleware('auth:sanctum')->post('create/notification', [NotificationController::class, 'Create_Notification_API']); 
Route::middleware('auth:sanctum')->get('seen/notification/{id}', [NotificationController::class, 'change_status_API']); 