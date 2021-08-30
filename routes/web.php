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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');
        // ALL PROJECTS ROUTES
        Route::get('/project/add-project', 'ProjectController@showAddProject')->name('showAddProject');
        Route::post('/project/store-project', 'ProjectController@storeProject')->name('storeProject');
        Route::get('/project/all-project', 'ProjectController@allProject')->name('allProject');
        Route::get('/project/all-datatable','ProjectController@projectData');
        Route::get('/project/edit-project/{id}', 'ProjectController@editProject')->name('editProject');
        Route::post('/project/update-project/{id}', 'ProjectController@updateProject')->name('updateProject');
        Route::get('/project/delete-project/{id}', 'ProjectController@deleteProject')->name('deleteProject');

        // ALL LAND OWNERS ROUTES
        Route::get('/landowner/add-landowner', 'LandownerController@showAddLandowner')->name('showAddLandowner');
        Route::post('/landowner/store-landowner', 'LandownerController@storeLandowner')->name('storeLandowner');
        Route::get('/landowner/all-landowner', 'LandownerController@allLandowner')->name('allLandowner');
        Route::get('/landowner/all-datatable','LandownerController@landownerData');
        Route::get('/landowner/edit-landowner/{id}', 'LandownerController@editLandowner')->name('editLandowner');
        Route::get('/landowner/view-landowner-details/{id}', 'LandownerController@viewLandownerDetails')->name('viewLandownerDetails');
        Route::post('/landowner/update-landowner/{id}', 'LandownerController@updateLandowner')->name('updateLandowner');
        Route::get('/landowner/delete-landowner/{id}', 'LandownerController@deleteLandowner')->name('deleteLandowner');

        // ALL LAND S ROUTES
        Route::get('/landbuybook/add-landbuybook', 'LandBuyBookController@showAddLandbuybook')->name('showAddLandbuybook');
        Route::post('/landbuybook/store-landbuybook', 'LandBuyBookController@storeLandbuybook')->name('storeLandbuybook');
        Route::get('/landbuybook/all-landbuybook', 'LandBuyBookController@allLandbuybook')->name('allLandbuybook');
        Route::get('/landbuybook/all-datatable','LandBuyBookController@landbuybookData');
        Route::get('/landbuybook/edit-landbuybook/{id}', 'LandBuyBookController@editLandbuybook')->name('editLandbuybook');
        Route::post('/landbuybook/update-landbuybook/{id}', 'LandBuyBookController@updateLandbuybook')->name('updateLandbuybook');
        Route::get('/landbuybook/delete-landbuybook/{id}', 'LandBuyBookController@deleteLandbuybook')->name('deleteLandbuybook');

        // ALL PRODUCTS ROUTES
        Route::get('/product/add-product', 'ProductController@showAddProduct')->name('showAddProduct');
        Route::post('/product/store-product', 'ProductController@storeProduct')->name('storeProduct');
        Route::get('/product/all-product', 'ProductController@allProduct')->name('allProduct');
        Route::get('/product/edit-product/{id}', 'ProductController@editProduct')->name('editProduct');
        Route::get('/product/view-details-product/{id}', 'ProductController@viewDetailsProduct')->name('viewDetailsProduct');
        Route::post('/product/update-product/{id}', 'ProductController@updateProduct')->name('updateProduct');
        Route::get('/product/delete-product/{id}', 'ProductController@deleteProduct')->name('deleteProduct');

        // ALL CUSTOMER ROUTES
        Route::get('/customer/add-customer', 'CustomerController@showAddCustomer')->name('showAddCustomer');
        Route::post('/customer/store-customer', 'CustomerController@storeCustomer')->name('storeCustomer');
        Route::get('/customer/all-customer', 'CustomerController@allCustomer')->name('allCustomer');
        Route::get('/customer/all-datatable','CustomerController@customerData');
        Route::get('/customer/edit-customer/{id}', 'CustomerController@editCustomer')->name('editCustomer');
        Route::post('/customer/update-customer/{id}', 'CustomerController@updateCustomer')->name('updateCustomer');
        Route::get('/customer/delete-customer/{id}', 'CustomerController@deleteCustomer')->name('deleteCustomer');

        // ALL Employee ROUTES
        Route::get('/employee/add-employee', 'EmployeeController@showAddEmployee')->name('showAddEmployee');
        Route::post('/employee/store-employee', 'EmployeeController@storeEmployee')->name('storeEmployee');
        Route::get('/employee/all-employee', 'EmployeeController@allEmployee')->name('allEmployee');
        Route::get('/employee/all-datatable','EmployeeController@employeeData');
        Route::get('/employee/edit-employee/{id}', 'EmployeeController@editEmployee')->name('editEmployee');
        Route::post('/employee/update-employee/{id}', 'EmployeeController@updateEmployee')->name('updateEmployee');
        Route::get('/employee/delete-employee/{id}', 'EmployeeController@deleteEmployee')->name('deleteEmployee');


        // ALL Vendor ROUTES
        Route::get('/vendor/add-vendor', 'VendorController@showAddVendor')->name('showAddVendor');
        Route::post('/vendor/store-vendor', 'VendorController@storeVendor')->name('storeVendor');
        Route::get('/vendor/all-vendor', 'VendorController@allVendor')->name('allVendor');
        Route::get('/vendor/all-datatable','VendorController@vendorData');
        Route::get('/vendor/edit-vendor/{id}', 'VendorController@editVendor')->name('editVendor');
        Route::post('/vendor/update-vendor/{id}', 'VendorController@updateVendor')->name('updateVendor');
        Route::get('/vendor/delete-vendor/{id}', 'VendorController@deleteVendor')->name('deleteVendor');

        // ALL SALES ROUTES
        Route::get('/sales/add-sales', 'SalesController@showAddSales')->name('showAddSales');
        Route::post('/sales/store-sales', 'SalesController@storeSales')->name('storeSales');
        Route::get('/sales/all-sales', 'SalesController@allSales')->name('allSales');
        Route::get('/sales/all-datatable','SalesController@salesData');
        Route::get('/sales/edit-sales/{id}', 'SalesController@editSales')->name('editSales');
        Route::post('/sales/update-sales/{id}', 'SalesController@updateSales')->name('updateSales');
        Route::get('/sales/delete-sales/{id}', 'SalesController@deleteSales')->name('deleteSales');

        // ALL item ROUTES
        Route::get('/item/add-item', 'ItemController@showAddItem')->name('showAddItem');
        Route::post('/item/store-item', 'ItemController@storeItem')->name('storeItem');
        Route::get('/item/all-item', 'ItemController@allItem')->name('allItem');
        Route::get('/item/all-datatable','ItemController@itemData');
        Route::get('/item/edit-item/{id}', 'ItemController@editItem')->name('editItem');
        Route::post('/item/update-item/{id}', 'ItemController@updateItem')->name('updateItem');
        Route::get('/item/delete-item/{id}', 'ItemController@deleteItem')->name('deleteItem');

        // ALL requisition ROUTES
        Route::get('/requisition/add-requisition', 'RequisitionController@showAddRequisition')->name('showAddRequisition');
        Route::post('/requisition/store-requisition', 'RequisitionController@storeRequisition')->name('storeRequisition');
        Route::get('/requisition/all-requisition', 'RequisitionController@allRequisition')->name('allRequisition');
        Route::get('/requisition/edit-requisition/{id}', 'RequisitionController@editRequisition')->name('editRequisition');
        Route::post('/requisition/update-requisition/{id}', 'RequisitionController@updateRequisition')->name('updateRequisition');
        Route::get('/requisition/delete-requisition/{id}', 'RequisitionController@deleteRequisition')->name('deleteRequisition');

        // ALL requisition confirmed ROUTES
        Route::get('/rqn-confirmed/add-rqn-confirmed', 'RequisitionConfirmedController@showAddRQNConfirmed')->name('showAddRQNConfirmed');
        Route::post('/rqn-confirmed/store-rqn-confirmed', 'RequisitionConfirmedController@storeRQNConfirmed')->name('storeRQNConfirmed');
        Route::get('/rqn-confirmed/all-rqn-confirmed', 'RequisitionConfirmedController@allRQNConfirmed')->name('allRQNConfirmed');
        Route::get('/rqn-confirmed/edit-rqn-confirmed/{id}', 'RequisitionConfirmedController@editRQNConfirmed')->name('editRQNConfirmed');
        Route::post('/rqn-confirmed/update-rqn-confirmed/{id}', 'RequisitionConfirmedController@updateRQNConfirmed')->name('updateRQNConfirmed');
        Route::get('/rqn-confirmed/delete-rqn-confirmed/{id}', 'RequisitionConfirmedController@deleteRQNConfirmed')->name('deleteRQNConfirmed');

        // ALL requisition details ROUTES
        Route::get('/requisition-details/add-requisition-details', 'RequisitionDetailsController@showAddRequisitionDetails')->name('showAddRequisitionDetails');
        Route::post('/requisition-details/store-requisition-details', 'RequisitionDetailsController@storeRequisitionDetails')->name('storeRequisitionDetails');
        Route::get('/requisition-details/all-requisition-details', 'RequisitionDetailsController@allRequisitionDetails')->name('allRequisitionDetails');
        Route::get('/requisition-details/edit-requisition-details/{id}', 'RequisitionDetailsController@editRequisitionDetails')->name('editRequisitionDetails');
        Route::post('/requisition-details/update-requisition-details/{id}', 'RequisitionDetailsController@updateRequisitionDetails')->name('updateRequisitionDetails');
        Route::get('/requisition-details/delete-requisition-details/{id}', 'RequisitionDetailsController@deleteRequisitionDetails')->name('deleteRequisitionDetails');
   
        // ALL order ROUTES
        Route::get('/order/add-order', 'OrderController@showAddOrder')->name('showAddOrder');
        Route::post('/order/store-order', 'OrderController@storeIOrder')->name('storeIOrder');
        Route::get('/order/all-order', 'OrderController@allOrder')->name('allOrder');
        Route::get('/order/edit-order/{id}', 'OrderController@editOrder')->name('editOrder');
        Route::post('/order/update-order/{id}', 'OrderController@updateOrder')->name('updateOrder');
        Route::get('/order/delete-order/{id}', 'OrderController@deleteOrder')->name('deleteOrder');

    //--------Bank ROUTES---------//
       Route::get('/banks/add-bank', 'BankController@showAddBank')->name('showAddBank');
       Route::get('/banks/create-bank', 'BankController@create')->name('banks.create');
       Route::post('/banks/store-bank', 'BankController@store')->name('storeBank');
       Route::get('/banks/all-datatable','BankController@bankInfoData');
       Route::get('/banks/edit-bank/{id}', 'BankController@editBank')->name('editBank');
       Route::post('/banks_update', 'BankController@update')->name('banks_update');
       Route::get('/delete_bank/{id}','BankController@destroy')->name('delete_bank');

    //--------Ledger Type ROUTEs------//
    Route::get('/ledgertype/add', 'LtypeController@showAddLedger')->name('showAddLadger');
    Route::get('/ledgertype/create-ledger', 'LtypeController@create')->name('ledgers.create');
    Route::post('/ledgertype/store-ledger', 'LtypeController@store')->name('storeLedger');
    Route::get('/ledgertype/all-datatable','LtypeController@ladgerInfoData');
    Route::get('/ledgertype/edit/{id}', 'LtypeController@editladger')->name('editLadger');
    Route::post('/ledgertype_update', 'LtypeController@update')->name('ledgertype_update');
    Route::get('/ledgertype_delete/{id}','LtypeController@destroy')->name('delete_ledger');

    //--------Ledger Group ROUTEs------//
    //Route::resource('lgroup', 'LgroupController');
    Route::get('/ledgergroup/add', 'LgroupController@showAddLedgerGroup')->name('showAddLadgerGroup');
    Route::get('/ledgergroup/create-ledgergroup', 'LgroupController@create')->name('ledgergroup.create');
    Route::post('/ledgergroup/store-ledgergroup', 'LgroupController@store')->name('storeledgergroup');
    Route::get('/ledgergroup/all-datatable','LgroupController@ladgerGroupInfoData');
    Route::get('/ledgergroup/edit/{id}', 'LgroupController@editladgerGroup')->name('editLadgerGroup');
    Route::post('/ledgergroup-update', 'LgroupController@update')->name('ledgergroup_update');
    Route::get('/ledgergroup_delete/{id}','LgroupController@destroyladgerGroup')->name('delete_ledgergroup');

    //--------Ledger Name ROUTEs------//
    //Route::resource('lname', 'LnameController');
    Route::get('/ledgername/add', 'LnameController@showAddLedgerName')->name('showAddLadgerName');
    Route::get('/ledgername/create-ledgername', 'LnameController@create')->name('ledgername.create');
    Route::post('/ledgername/store-ledgername', 'LnameController@store')->name('storeledgername');
    Route::get('/ledgername/all-datatable','LnameController@ladgerNameInfoData');
    Route::get('/ledgername/edit/{id}', 'LnameController@editladgerName')->name('editLadgerName');
    Route::post('/ledgername_update', 'LnameController@update')->name('ledgername_update');
    Route::get('/ledgernames_delete/{id}','LnameController@destroyladgerName')->name('delete_LedgerName');

    //--------Initial Balance ROUTEs------//
    // Route::resource('initial', 'InitialController');
    // Route::get('/initialledger', 'InitialController@ledgerIndex')->name('initialledger');
    Route::get('/initial/balance','InitialController@index')->name('add.initial.balance');
    Route::post('/store/initial/balance','InitialController@store')->name('store.initialBalance');
    Route::get('/initial/balance/list','InitialController@listData')->name('list.data');
    Route::get('/initial/balance/datatable','InitialController@initialData');
    Route::get('/edit/initial/balance/{id}','InitialController@edit')
    ->name('edit.initial.balance');
    Route::post('/initials/balance/{id}', 'InitialController@updateinitials')->name('updateInitials');
    Route::get('/delete/initials/balance/{id}','InitialController@deleteInitialBalance');

    Route::get('voucher/allcreditvoucher/datatable','VoucherController@allcreditvoucherDataTable')->name('allcreditvoucher');


    Route::get('voucher/credit/all','VoucherController@index')->name('allCreditVoucher');
    Route::get('/allcreditvoucher/datatable','VoucherController@allcreditvoucherDataTable');    
    Route::get('voucher/credit/create','VoucherController@creditvoucher')->name('createCreditVoucher');
    Route::post('voucher/credit/save','VoucherController@save_credit')->name('save_credit');

    Route::get('voucher/debit/all','VoucherController@alldebitvoucher')->name('alldebitvoucher');
    Route::get('/alldebitvoucher/datatable','VoucherController@allDebitVoucherDataTable');
    Route::get('voucher/debit/create','VoucherController@debitvoucher')->name('debitvoucher');
    Route::post('voucher/debit/save','VoucherController@save_debit')->name('save_debit');

    //--------JOURNAL ROUTES------//
    Route::get('voucher/journal/all','VoucherController@alljournalvoucher')->name('alljournalvoucher');
    Route::get('voucher/journal/create','VoucherController@journalvoucher')->name('journalvoucher');
    Route::post('voucher/journal/save','VoucherController@save_journal')->name('save_journal');

    // ------- ALL ADJUSTMENT ROUTES ------- //
    Route::get('voucher/adjustment/all','AdjustmentController@index')->name('allAdjustment');
    Route::get('voucher/adjustment/create','AdjustmentController@create')->name('createAdjustment');
    Route::post('voucher/adjustment/store','AdjustmentController@store')->name('storeAdjustment');
    Route::get('voucher/adjustment/edit/{id}','AdjustmentController@edit')->name('editAdjustment');
    Route::post('voucher/adjustment/update/{id}','AdjustmentController@update')->name('updateAdjustment');
    Route::get('voucher/adjustment/delete/{id}','AdjustmentController@delete')->name('deleteAdjustment');
    
    //--------CONTRA VOUCHER ROUTES------//
    Route::get('voucher/contra/create','ContraVoucherController@create')->name('createContraVoucher');
    Route::get('voucher/contra/all','ContraVoucherController@index')->name('allContraVoucher');
    Route::post('voucher/contra/store','ContraVoucherController@store')->name('storeContraVoucher');
    Route::get('voucher/contra/edit/{id}','ContraVoucherController@edit')->name('editContraVoucher');
    Route::post('voucher/contra/update/{id}', 'ContraVoucherController@update')->name('updateContraVoucher');
    Route::get('voucher/contra/delete/{id}','ContraVoucherController@delete')->name('deleteContraVoucher');

    //---------Total project count---------//
    Route::get('/total/project','ProjectController@totalProject');

    //-------Total Product count------//
    Route::get('/total/product','ProductController@totalProduct');

    //------Total Sell count--------//
    Route::get('/total/sell','SalesController@totalSells');

    //-------Total requisition count-------//
    Route::get('/total/requisition','RequisitionController@totalRequisition');

    //-------Total order count-------//
    Route::get('/total/order','OrderController@totalOrder');

    //-----total ledger type count------//
    Route::get('/total/ledgerType','LtypeController@totalLadgerType');

    //-----total ledger group count-----//
    Route::get('/total/ledgerGroup','LgroupController@totalLedgerGroup');

    //-----total ledger name count-----//
    Route::get('/total/ledgerName','LnameController@totalLedgerName');

    //-----total bank or cash-----//
    Route::get('/total/bankorcash','BankController@totalBankOrCash');

    //-----user count-----//
    Route::get('/total/user','UserController@totalUser');
    //user profile
    Route::get('/user/profile','UserController@profile');
    Route::post('update/userProfile','UserController@updateProfile')->name('update.profile');
    Route::post('/update/user/password','UserController@updatePassword')
    ->name('update.password');


    // ALL INSTALLMENT ROUTES 
    Route::get('/installment/all','InstallmentController@index');
    Route::get('/installment/create','InstallmentController@create');
    Route::post('/installment/store','InstallmentController@store');
    Route::get('/installment/edit/{id}','InstallmentController@edit')->name('editInstallment');
    Route::post('/installment/update/{id}','InstallmentController@update')->name('updateInstallment');
    Route::get('/installment/delete/{id}','InstallmentController@delete')->name('deleteInstallment');

    Route::get('/land-owner-data','InstallmentController@land_owner_data');

    //Daily Income summary sheet
    Route::get('/report/account/daily/income_summery/sheet','DailyIncomeSummarySheetController@dailyIncome');
    Route::get('/print/daily/income_summery/sheet','DailyIncomeSummarySheetController@printDailyIncome');

    //Project wise total amount
    Route::get('/projectwise/total/amount','VoucherController@projectWiseTotalAmount')->name('projectWiseTotalAmount');
    Route::get('/projectwise/total/amount/datatable','VoucherController@projectWiseTotalAmountDataTable')->name('projectWiseTotalAmountDataTable');

    //********Fund Transaction*******
    Route::get('/transaction/fund','TransactionController@index');
    

});

//*********Report ***********/
//Route::group(['middleware' => ['role:admin', 'accountent', 'sells-manager', 'purchage-manager']], function() {
    Route::get('/report/account/trading','TradingAccountController@index');
    Route::get('print/trading/accounts','TradingAccountController@printTradingAccounts');

    // profit_loss
    Route::get('/report/account/profit_loss','ProfitAndLossAccountController@index');
    Route::get('/print/profit_loss/account','ProfitAndLossAccountController@printProfitLossAccount');

    // balance-sheet
    Route::get('/report/account/balance-sheet','BalanceSheetController@index');
    Route::get('/print/balance-sheet','BalanceSheetController@printBalanceSheet');

    // trial balance
    Route::get('/report/account/trialbalance','TrialBlanceController@index');
    Route::get('/print/trialbalance','TrialBlanceController@printTrialBalace');

    //Daily expenducture summary sheet
    Route::get('/report/account/daily/expenditure_summery/sheet','DailyExpenditureSummarySheetController@dailyExpenditure');
    Route::get('/print/daily/expenditure_summery/sheet','DailyExpenditureSummarySheetController@printDailyExpenditure');
//});

Route::group(['middleware'=>['role:admin']],function () {
 Route::get('/new/system/user', 'UserController@create')->name('add.user');
 Route::post('/store/new/system/user', 'UserController@store')->name('store.system.user');
 Route::get('/system/user/list', 'UserController@index');
 Route::get('/alluser/datatable','UserController@allUserDataTable'); 
 Route::get('/edit/system/user/{id}', 'UserController@edit')->name('edit.system.user');
 Route::post('/update/system/user/{id}', 'UserController@update')->name('update.system.user');
 Route::get('/delete/system/user/{id}', 'UserController@deleteUser');
});