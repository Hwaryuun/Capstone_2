<?php


use Illuminate\Support\Facades\Route;

//Admin Route Import
use App\Http\Controllers\ViewControllers\AuditLogController;
use App\Http\Controllers\ViewControllers\OverviewController;
use App\Http\Controllers\ViewControllers\OrdersController;
use App\Http\Controllers\ViewControllers\PermisionController;
use App\Http\Controllers\ViewControllers\UserLevelController;
use App\Http\Controllers\ViewControllers\UsersController;

use App\Http\Controllers\ViewControllers\FeaturedNTemplatesController;
use App\Http\Controllers\ViewControllers\DesignController;
use App\Http\Controllers\ViewControllers\TemplatesController;

use App\Http\Controllers\ViewControllers\PapersController;
use App\Http\Controllers\ViewControllers\PaperTypesController;
use App\Http\Controllers\ViewControllers\PaperSpecsController;
use App\Http\Controllers\ViewControllers\PaperAddController;

use App\Http\Controllers\ViewControllers\ProductsController;
use App\Http\Controllers\ViewControllers\SizeController;

use App\Http\Controllers\ViewControllers\CategoryController;
use App\Http\Controllers\ViewControllers\CategoryTypeController;
use App\Http\Controllers\ViewControllers\DimentionalController;
use App\Http\Controllers\ViewControllers\QuantityController;
use App\Http\Controllers\ViewControllers\LeafQuantityController;
use App\Http\Controllers\ViewControllers\TransactionHistoryController;
use App\Http\Controllers\ViewControllers\ReportsController;

use App\Http\Controllers\ViewControllers\PartialController;
use App\Http\Controllers\ViewControllers\EmployeeController;
use App\Http\Controllers\ViewControllers\PricingController;
use App\Http\Controllers\ViewControllers\PricingTypeController;
use App\Http\Controllers\ViewControllers\ProductPricingController;
use App\Http\Controllers\LogControllers\LoginController;
use App\Http\Controllers\LogControllers\RegisterController;
use App\Http\Controllers\LogControllers\LogoutController;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfAuthenticated;

//use App\Http\Controllers\UpdateControllers\UCategoryController;
//Customer Route Import
//Auth
use App\Http\Controllers\Customers\Auth\CustomerLoginController;
use App\Http\Controllers\Customers\Auth\CustomerRegisterController;
use App\Http\Controllers\Customers\Auth\CustomerLogoutController;
//Page
use App\Http\Controllers\Customers\Page\DashboardController;
use App\Http\Controllers\Customers\Page\HeroController;
use App\Http\Controllers\Customers\Page\ShopController;
use App\Http\Controllers\Customers\Page\ShopProductController;
use App\Http\Controllers\Customers\Page\ShopSpecificationController;
use App\Http\Controllers\Customers\Page\ShopTemplatesController;
use App\Http\Controllers\Customers\Page\ShopOrderViewController;
use App\Http\Controllers\Customers\Payment\PaymentController;
use App\Http\Controllers\PrintPDFController;

/*
Route::get('/', function () {
    return view('Customer.Page.Hero');
})->middleware(['guest:customer', 'guest:web']);
*/
Route::get('/', [HeroController::class,'index'])->middleware(['guest:customer', 'guest:web']);
Route::get('DSProducts/{id}', [HeroController::class,'DSProducts'])->name('DSProducts')->middleware(['guest:customer', 'guest:web']);
Route::get('DSTemplates/{id}', [HeroController::class,'DSTemplates'])->name('DSTemplates')->middleware(['guest:customer', 'guest:web']);
Route::post('/', [HeroController::class,'store'])->name('sendmail')->middleware(['guest:customer', 'guest:web']);
Route::get('Infos',[HeroController::class, 'Infos'])->name('Infos');

// Route::group(['prefix' => 'admin'],function(){
    // Route::resource('Login',LoginController::class)->only('index','store');
    // Route::resource('Register',RegisterController::class)->middleware(RedirectIfAuthenticated::class);
    // Route::get('/logout', [LogoutController::class, 'store'])->name('logout');
// });

Route::group(['prefix' => 'customer'],function(){
    Route::middleware(['guest:customer'])->group(function(){
        Route::resource('CustomerLogin',CustomerLoginController::class)->only('index','store')->middleware(RedirectIfAuthenticated::class);
        Route::resource('CustomerRegister',CustomerRegisterController::class)->middleware(RedirectIfAuthenticated::class);
        Route::get('Verify{verification_code}',[CustomerRegisterController::class, 'Verify'])->name('Verify');
    });
    Route::middleware(['auth:customer'])->group(function(){
        Route::resource('CustomerDashboard',DashboardController::class)->only('index','store');//changes in ui
        Route::get('DsInfo',[DashboardController::class,'DsInfo'])->name('DsInfo');

        Route::resource('Shopping',ShopController::class);
        Route::get('ShopProducts/{id}',[ShopProductController::class,'SProducts'])->name('SProducts');
      
        Route::get('ShopSpecificataion/{id}',[ShopSpecificationController::class,'quotation'])->name('quotation');
        Route::resource('ShopSpecs',ShopSpecificationController::class);
        Route::post('test', [ShopSpecificationController::class, 'test'])->name('test');

        Route::get('ShopTemp/{id}',[ShopTemplatesController::class, 'ViewTemp'])->name('ViewTemp');
        Route::get('ShopTemps/[{id},{id2}]',[ShopTemplatesController::class, 'SpecsTemps'])->name('SpecsTemps');
        Route::resource('ShopTemp',ShopTemplatesController::class);
    

        Route::resource('OrderView',ShopOrderViewController::class);
        Route::get('OrderSummary/{id}',[ShopOrderViewController::class, 'OrderSummary'])->name('OrderSummary');
        Route::get('OrderSummaryV2/{id}',[ShopOrderViewController::class, 'OrderSummaryV2'])->name('OrderSummaryV2');
        Route::post('CartAdd',[ShopOrderViewController::class, 'CartAdd'])->name('CartAdd');

        Route::get('PlaceOrder',[PaymentController::class, 'PlaceOrder'])->name('PlaceOrder');
        Route::get('PlaceOrderPartial',[PaymentController::class, 'PlaceOrderPartial'])->name('PlaceOrderPartial');
        Route::get('PlaceOrderPaidPartial',[PaymentController::class, 'PlaceOrderPaidPartial'])->name('PlaceOrderPaidPartial');
        Route::get('MyOrders',[PaymentController::class, 'MyOrders'])->name('MyOrders');
        Route::delete('HistoDestroyer/{id}',[PaymentController::class,'HistoDestroyer'])->name('HistoDestroyer');
        Route::resource('Payd',PaymentController::class);
        
        Route::post('CartAdd',[ShopOrderViewController::class, 'CartAdd'])->name('CartAdd');
        Route::get('/Customerlogout', [CustomerLogoutController::class, 'store'])->name('Customerlogout');
        // Route::get('OrderSummary/[{id},{id2},{id3},{id4},{id5},{id6}]',[ShopOrderViewController::class, 'OrderSummary'])->name('OrderSummary');
    });

});
//Route::prefix('admin')->middleware(['auth:web'])->group( function(){
//  Route::group(['middleware' => 'auth'],function()
Route::group(['prefix' => 'admin'],function(){

    Route::middleware(['guest:web'])->group(function(){     
        Route::resource('Login',LoginController::class)->only('index','store');
       // Route::resource('Register',RegisterController::class)->middleware(RedirectIfAuthenticated::class);    
    });
   
    Route::middleware(['auth:web'])->group(function(){

        Route::resource('Audit',AuditLogController::class);

        Route::get('/logout', [LogoutController::class, 'store'])->name('logout');
        Route::resource('Orders',OrdersController::class);
        Route::get('OrdersProgress',[OrdersController::class,'OrdersProgress'])->name('OrdersProgress');
        Route::get('OrdersFinished',[OrdersController::class,'OrdersFinished'])->name('OrdersFinished');
        Route::get('OrdersUpdate/{id}',[OrdersController::class,'OrdersUpdate'])->name('OrdersUpdate');

        Route::resource('Partial',PartialController::class);
        Route::get('PartialProgress',[PartialController::class,'PartialProgress'])->name('PartialProgress');
        Route::get('PartialFinished',[PartialController::class,'PartialFinished'])->name('PartialFinished');
        Route::get('PartialUpdate/{id}',[PartialController::class,'PartialUpdate'])->name('PartialUpdate');

        Route::get('PrintPdfr/{id}',[PrintPDFController::class,'PrintPdfr'])->name('PrintPdfr');
        Route::get('PrintPdfrPar/{id}',[PrintPDFController::class,'PrintPdfrPar'])->name('PrintPdfrPar');

        Route::get('PrintPdfrPROD',[PrintPDFController::class,'PrintPdfrPROD'])->name('PrintPdfrPROD');
        Route::get('PrintPdfrREPO',[PrintPDFController::class,'PrintPdfrREPO'])->name('PrintPdfrREPO');
        Route::get('PrintPdfrWTRNS',[PrintPDFController::class,'PrintPdfrWTRNS'])->name('PrintPdfrWTRNS');
        Route::get('PrintPdfrMTRNS',[PrintPDFController::class,'PrintPdfrMTRNS'])->name('PrintPdfrMTRNS');
        Route::get('PrintPdfrATRNS',[PrintPDFController::class,'PrintPdfrATRNS'])->name('PrintPdfrATRNS');
        Route::get('PrintPdfrSRVCS',[PrintPDFController::class,'PrintPdfrSRVCS'])->name('PrintPdfrSRVCS');
        Route::get('PrintPdfrORDR',[PrintPDFController::class,'PrintPdfrORDR'])->name('PrintPdfrORDR');
        Route::get('PrintPdfrINPRGS',[PrintPDFController::class,'PrintPdfrINPRGS'])->name('PrintPdfrINPRGS');
        Route::get('PrintPdfrFNSHD',[PrintPDFController::class,'PrintPdfrFNSHD'])->name('PrintPdfrFNSHD');



        Route::resource('Overview',OverviewController::class);

        Route::get('FeaturedNTemplates/FTarchive',[FeaturedNTemplatesController::class,'FTarchive'])->name('FTarchive');
        Route::put('FeaturedNTemplates/FTarchive/{id}',[FeaturedNTemplatesController::class,'FTstore'])->name('FTstore');
        Route::delete('FeaturedNTemplates/FTarchive/{id}',[FeaturedNTemplatesController::class,'FTdestroy'])->name('FTdestroy');
        Route::resource('FeaturedNTemplates',FeaturedNTemplatesController::class);

        Route::get('Design/DSarchive',[DesignController::class,'DSarchive'])->name('DSarchive');
        Route::put('Design/DSarchive/{id}',[DesignController::class,'DSstore'])->name('DSstore');
        Route::delete('Design/DSarchive/{id}',[DesignController::class,'DSdestroy'])->name('DSdestroy');
        Route::resource('Design',DesignController::class);

        Route::get('Templates/TPLarchive',[TemplatesController::class,'TPLarchive'])->name('TPLarchive');
        Route::put('Templates/TPLarchive/{id}',[TemplatesController::class,'TPLstore'])->name('TPLstore');
        Route::delete('Templates/TPLarchive/{id}',[TemplatesController::class,'TPLdestroy'])->name('TPLdestroy');
        Route::resource('Templates',TemplatesController::class);

        Route::get('Category/Archive',[CategoryController::class,'archiveindex'])->name('archiveindex');
        Route::put('Category/Archive/{id}',[CategoryController::class,'restorecategory'])->name('restorecategory');
        Route::delete('Category/Archive/{id}',[CategoryController::class,'destroycategory'])->name('destroycategory');
        Route::resource('Category',CategoryController::class);

        Route::get('CategoryType/PTArchive',[CategoryTypeController::class,'printingTypeindex'])->name('printingTypeindex');
        Route::put('CategoryType/PTArchive/{id}',[CategoryTypeController::class,'printingTyperestore'])->name('printingTyperestore');
        Route::delete('CategoryType/PTArchive/{id}',[CategoryTypeController::class,'printingTypedestroy'])->name('printingTypedestroy');
        Route::resource('CategoryType',CategoryTypeController::class);

        Route::get('Products/PDTrchive',[ProductsController::class,'productsindex'])->name('productsindex');
        Route::put('Products/PDTrchive/{id}',[ProductsController::class,'productsstore'])->name('productsstore');
        Route::delete('Products/PDTrchive/{id}',[ProductsController::class,'productsdestroy'])->name('productsdestroy');
        Route::resource('Products',ProductsController::class);

        Route::get('Dimentional/DMarchive',[DimentionalController::class,'DMindex'])->name('DMindex');
        Route::put('Dimentional/DMarchive/{id}',[DimentionalController::class,'DMstore'])->name('DMstore');
        Route::delete('Dimentional/DMarchive/{id}',[DimentionalController::class,'DMdestroy'])->name('DMdestroy');
        Route::resource('Dimentional',DimentionalController::class);

        Route::get('Quantity/Qarchive',[QuantityController::class,'Qindex'])->name('Qindex');
        Route::put('Quantity/Qarchive/{id}',[QuantityController::class,'Qstore'])->name('Qstore');
        Route::delete('Quantity/Qarchive/{id}',[QuantityController::class,'Qdestroy'])->name('Qdestroy');
        Route::resource('Quantity',QuantityController::class);

        Route::get('Leaf/LQarchive',[LeafQuantityController::class,'LQindex'])->name('LQindex');
        Route::put('Leaf/LQarchive/{id}',[LeafQuantityController::class,'LQstore'])->name('LQstore');
        Route::delete('Leaf/LQarchive/{id}',[LeafQuantityController::class,'LQdestroy'])->name('LQdestroy');
        Route::resource('Leaf',LeafQuantityController::class);

        Route::get('Size/SZarchive',[SizeController::class,'szindex'])->name('szindex');
        Route::put('Size/SZarchive/{id}',[SizeController::class,'sztore'])->name('sztore');
        Route::delete('Size/SZarchive/{id}',[SizeController::class,'szdestroy'])->name('szdestroy');
        Route::resource('Size',SizeController::class);

        Route::get('Papers/PPRarchive',[PapersController::class,'papersindex'])->name('papersindex');
        Route::put('Papers/PPRarchive/{id}',[PapersController::class,'paperstore'])->name('paperstore');
        Route::delete('Papers/PPRarchive/{id}',[PapersController::class,'paperdestroy'])->name('paperdestroy');
        Route::resource('Papers',PapersController::class);

        Route::get('PaperTypes/PTTarchive',[PaperTypesController::class,'ptypeindex'])->name('ptypeindex');
        Route::put('PaperTypes/PTTarchive/{id}',[PaperTypesController::class,'ptypetore'])->name('ptypetore');
        Route::delete('PaperTypes/PTTarchive/{id}',[PaperTypesController::class,'ptypedestroy'])->name('ptypedestroy');
        Route::resource('PaperTypes',PaperTypesController::class);

        Route::get('PaperSpecs/PSarchive',[PaperSpecsController::class,'spcindex'])->name('spcindex');
        Route::put('PaperSpecs/PSarchive/{id}',[PaperSpecsController::class,'spcstore'])->name('spcstore');
        Route::delete('PaperSpecs/PSarchive/{id}',[PaperSpecsController::class,'spcdestroy'])->name('spcdestroy');
        Route::resource('PaperSpecs',PaperSpecsController::class);

        Route::resource('PaperAdd',PaperAddController::class);

        Route::get('PricingType/PRCTarchive',[PricingTypeController::class,'prtindex'])->name('prtindex');
        Route::put('PricingType/PRCTarchive/{id}',[PricingTypeController::class,'prtstore'])->name('prtstore');
        Route::delete('PricingType/PRCTarchive/{id}',[PricingTypeController::class,'prtdestroy'])->name('prtdestroy');
        Route::resource('PricingType',PricingTypeController::class);

        Route::get('Pricing/Parchive',[PricingController::class,'pindex'])->name('pindex');
        Route::put('Pricing/Parchive/{id}',[PricingController::class,'pstore'])->name('pstore');
        Route::delete('Pricing/Parchive/{id}',[PricingController::class,'pdestroy'])->name('pdestroy');
        Route::resource('Pricing',PricingController::class);

        Route::resource('PriceD',ProductPricingController::class);
        Route::resource('Permision',PermisionController::class);

        Route::get('Employee/Earchive',[PermisionController::class,'EMindex'])->name('EMindex');
        Route::put('Employee/Earchive/{id}',[PermisionController::class,'EMstore'])->name('EMstore');
        Route::delete('Employee/Earchive/{id}',[PermisionController::class,'EMdestroy'])->name('EMdestroy');
        
        Route::resource('Employee',EmployeeController::class);

        Route::resource('UserLevel',UserLevelController::class);

        Route::get('Transac/monthly',[TransactionHistoryController::class,'monthlyindex'])->name('monthlyindex');
        Route::get('Transac/allhistory',[TransactionHistoryController::class,'allhistoryindex'])->name('allhistoryindex');
        Route::resource('Transac',TransactionHistoryController::class);
      
        Route::resource('Reports',ReportsController::class);
      
       
        Route::get('Users/Usrarchive',[UsersController::class,'Usrindex'])->name('Usrindex');
        Route::put('Users/Usrarchive/{id}',[UsersController::class,'Usrstore'])->name('Usrstore');
        Route::delete('Users/Usrarchive/{id}',[UsersController::class,'Usrdestroy'])->name('Usrdestroy');
        Route::resource('Users',UsersController::class);  
      
    });
});



