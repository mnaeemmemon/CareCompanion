<?php

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
use App\Http\Controllers\Admin\AdminSearchController;


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
use App\Http\Controllers\Pharmacy\PharmacyAccountController;
use App\Http\Controllers\Pharmacy\PharmacySearchController;
// AUTHENTICATION START
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//it

// Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::get('registration', [AuthController::class, 'registration'])->name('register');
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pharmacysignup', [PharmacysignupController::class, "index"]);
Route::get('/pharmacysignin', [PharmacysignupController::class, "pharmacy_sign_in"])->name('pharmacy_sign_in');
Route::get('/', [PharmacysignupController::class, "pharmacy_sign_in"]);
Route::get('/adminlogin', [AdminloginController::class, "index"])->name('adminlogin');


//post
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('custom-login-pharmacy', [CustomAuthController::class, 'customLogin_PHARMACY'])->name('login.custom.pharmacy'); 
Route::post('custom-registration_pharmacy', [CustomAuthController::class, 'customRegistration_pharmacy'])->name('register.custom.pharmacy'); 

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// AUTHENTICATION END



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

Route::middleware(['Mid_For_Admin'])->group(function () 
{
    Route::get('/adminhome', [AdminhomeController::class, "index"]);
    Route::get('/adminchat', [AdminchatController::class, "index"]);

    //DELIVERY
    Route::get('/admindelivery', [AdmindeliveryController::class, "index"]);    // DONE                     //API DONE
    Route::get('/adminDeliveryAddRider', [AdmindeliveryController::class, "Add_Rider_PAGE"]);               //API NOT REQUIRED
    Route::post('admin_rider_add', [AdmindeliveryController::class, "Add_Rider"]);                          //API DONE
    Route::get('AdminUpdateRider/{id}', [AdmindeliveryController::class, "Update_Rider_PAGE"]);             //API NOT REQUIRED
    Route::post('update_rider_Confirm', [AdmindeliveryController::class, "update_rider_confirm"]);          //API DONE
    Route::get('AdminDeleteRider/{id}',  [AdmindeliveryController::class, "Delete_Rider"]);                 //API DONE
    Route::get('admindeliveriesSection', [AdmindeliveryController::class, "Index_Deliveries"]);             //API DONE
    
    //ADMIN PHARMACY SECTION
    Route::get('/AdminAddPharmacy', [AdminpharmacyController::class, "Add_Pharmacy_PAGE"]);                 //API DONE
    Route::post('admin_add_pharmacy', [AdminpharmacyController::class, "Add_Pharmacy"]);                    //API DONE
    Route::get('AdminUpdatePharmacy/{id}', [AdminpharmacyController::class, "Update_Pharmacy_PAGE"]);       //API DONE
    Route::post('admin_update_pharmacy', [AdminpharmacyController::class, "Update_Pharmacy"]);              //API DONE
    Route::get('AdminDeletePharmacy/{id}', [AdminpharmacyController::class, "Delete_Pharmacy"]);            //API DONE
    Route::get('/adminpharmacy', [AdminpharmacyController::class, "index"]);                                //API DONE
    
    
    //PAYMENT
    Route::get("AdminTransactions",[AdminAccountController::class, "Admin_Transactions"]);                  //API DONE
    Route::get("AdminSellerAccounts",[AdminAccountController::class, "AdminSellerAccounts"]);               //API DONE
    
    Route::get('AdminAccountStatus',[AdminAccountController::class, "AdminAccountStatus"]); //FOR THIS TO BE COMPLETED WE NEED TO HAVE AUTHENTICATION
                // BECAUSE AUTHENTICATED ADMIN'S ACCOUNT_ID WOULD BE USED TO FETCH CORRESPONDING RESULTS.
    
    
    
    
    
    
    
    
    // Route::get('/adminhome', [AdminhomeController::class, "index"]);
    Route::get('/admindetails', [AdmindetailsController::class, "index"]);
    
    Route::get('/adminnotifications', [AdminnotificationsController::class, "index"]);
    Route::get('mark_as_read/{id}',[AdminnotificationsController::class, "mark_as_read"]);
    
    Route::get('/adminorders', [AdminordersController::class, "index"]); // DONE
    
    Route::get('/orderdetails/{id}', [AdminorderdetailsController::class, "index"]); // DONE
    
    Route::get('/adminproducts', [AdminproductsController::class, "index"]);    //DONE
    
    Route::get('/adminresetpassword', [AdminresetpasswordController::class, "index"]);
    Route::get('/adminsettings', [AdminsettingsController::class, "index"]);
    Route::get('/adminsignup', [AdminsignupController::class, "index"]);
    
    Route::get('/adminuser', [AdminuserController::class, "index"]);        //WORKING
    
});



//Search
Route::post('Admin_Search',[AdminSearchController::class,'index']);



// Route::get('/checking',[AdminloginController::class, "checking"]);


// Route::get('/', [AdminloginController::class, "index"]); // default / would be for pharmacy.. admin login would be hidden.




//PHARMACY

//Search
Route::post('Pharmacy_Search',[PharmacySearchController::class,'index']);

Route::middleware(['Mid_For_Pharmacy'])->group(function () 
{
    //PRODUCT
    Route::post('/pharmacyaddmedicine_submit', [PharmacyAddMedicineController::class, "add_product"]);
    Route::get('/pharmacylist', [PharmacylistController::class, "index"]);  //PRODUCT READ
    Route::get('/pharmacyDeletemedicine/{id}',[PharmacyAddMedicineController::class, "delete_product"]);
    Route::post('/pharmacyUPDATEproduct', [PharmacyupdatemedicineController::class, "update_product"]);
    Route::get('/pharmacyupdatemedicine/{id}', [PharmacyupdatemedicineController::class, "index"]);  //PRODUCTUPDATE (PAGE)

    //category
    // Route::post('/add_medicine', [PharmacyAddMedicineController::class, "add_category"]);
    Route::post('/add_medicine', [PharmacyAddMedicineController::class, "add_category"]);
    Route::get('/pharmacycategorylist',[PharmacyAddMedicineController::class, "category_list"]);

    Route::get('/pharmacyDeleteCategory/{id}',[PharmacyAddMedicineController::class, "delete_category"]);

    Route::get('/pharmacyupdateCategory/{id}', [PharmacyAddMedicineController::class, "category_update_PAGE"]);  //PRODUCTUPDATE (PAGE)
    Route::post('/update_category', [PharmacyAddMedicineController::class, "update_category"]);




    //ORDER
    Route::get('/pharmacysales', [PharmacysalesController::class, "index"]);    //CRUD OF ORDER
    Route::get('/orderdetails2/{id}', [Pharmacyorderdetails2Controller::class, "index"]);
    Route::get('/deleteOrder/{id}', [PharmacysalesController::class, "delete_order"]);

    Route::get('updatePharmacyOrderStatus/{id}/{status}',[PharmacysalesController::class, "Update_order_status"]);

    //DELIVERY
    Route::get('/pharmacydelivery', [PharmacyDeliveryController::class, "index"]);
    Route::get('order/update/deliverystatus/{id}/{status}',[PharmacysalesController::class, "Update_del_order_status"]); //Status change //TESTED

    // Route::get('/adminDeliveryAddRider', [PharmacyDeliveryController::class, "Add_Rider"]);

    //PAYMENT
    Route::get('PharmacyTransactions', [PharmacyAccountController::class, "PharmacyTransactions"]);
    Route::get('PharmacyAccountStatus', [PharmacyAccountController::class, "PharmacyAccountStatus"]);


    //pharmacy SETTINGS
    Route::get('/pharmacyaccset', [PharmacyaccsetController::class, "index"]);
    Route::post('/Pharmacy_setting', [PharmacyaccsetController::class, "Pharmacy_Settings"]);

});

Route::get('/pharmacyhome', [PharmacyHomeController::class, "index"]);

Route::get('/pharmacynotifications', [PharmacynotificationsController::class, "index"]);
Route::get('/mark_as_read_pharmacy/{id}', [PharmacynotificationsController::class, "mark_as_read_pharmacy"]);










Route::get('/pharmacyaddcategory', [PharmacyAddCategoryController::class, "index"]);    //ADD CAT FORM PAGE.

Route::get('/pharmacyaddmedicine', [PharmacyAddMedicineController::class, "index"]);    //ADD DONE IN API

Route::get('/pharmacychat', [PharmacyChatController::class, "index"]);
// Route::get('/pharmacydelivery', [PharmacyDeliveryController::class, "index"]);
Route::get('/pharmacyinvoice', [PharmacyinvoiceController::class, "index"]);
Route::get('/pharmacyresetpassword', [PharmacyresetpasswordController::class, "index"]);

// Route::get('/pharmacysales', [PharmacysalesController::class, "index"]);    //CRUD OF ORDER

Route::get('/pharmacysalesor', [PharmacysalesorController::class, "index"]);

// Route::get('/pharmacylist', [PharmacylistController::class, "index"]);  //PRODUCT READ

Route::get('/pharmacyslip', [PharmacyslipController::class, "index"]);
// Route::get('/orderdetails2', [Pharmacyorderdetails2Controller::class, "index"]);

