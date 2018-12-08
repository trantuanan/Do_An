 <?php

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
//  Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
//     Route::group(['middleware' => 'locale'], function() {
//         Route::get('change-language/{language}', 'HomeController@changeLanguage')
//             ->name('user.change-language');
//     });
// Route::group(['prefix' => '{language}'], function ($language) {
//     config(['app.locale' => $language]); //đặt dòng này ở đầu
    

   
    //Front end
    Route::get('/About', function () {
        return view('About');
    });

    Route::get('/Contact', function () {
        return view('Contact');
    })->name('contact');

    Route::group(['prefix' => '/cart'], function() {
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::post('/', 'CartController@store')->name('cart.store');
        Route::delete('/{id}', 'CartController@destroy')->name('cart.destroy');
        Route::post('/update', 'CartController@update')->name('cart.update');
    });

    Route::group(['prefix' => '/'], function() {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/service/{id}', 'HomeController@singleProduct')->name('singleProduct');
        Route::get('/product/{id}', 'HomeController@singleProductComplete')->name('singleProductComplete');
        Route::get('/post/{id}', 'HomeController@singlePost')->name('singlePost');
    });

    Route::group(['prefix' => '/products'], function() {
        Route::get('/', 'HomeController@products')->name('products');
        Route::get('/CNC', 'HomeController@productsCNC')->name('products.CNC');
        Route::get('/LED', 'HomeController@productsLED')->name('products.LED');
        Route::get('/GC', 'HomeController@productsGC')->name('products.GC');
        Route::get('/TT', 'HomeController@productsTT')->name('products.TT');
        Route::get('/TL', 'HomeController@productsTL')->name('products.TL');
        Route::get('/CD', 'HomeController@productsCD')->name('products.CD');
    });

    Route::group(['prefix' => '/services'], function() {
        Route::get('/LED', 'HomeController@servicesLED')->name('services.LED');
        Route::get('/CNC', 'HomeController@servicesCNC')->name('services.CNC');
        Route::get('/GC', 'HomeController@servicesGC')->name('services.GC');
        Route::get('/TL', 'HomeController@servicesTL')->name('services.TL');
        Route::get('/TT', 'HomeController@servicesTT')->name('services.TT');
        Route::get('/CD', 'HomeController@servicesCD')->name('services.CD');
    });

    Route::group(['prefix' => '/search'], function() {
        Route::get('/', 'HomeController@searchProductComplete')->name('search.productComplete');
        Route::get('/products', 'HomeController@searchProduct')->name('search.product');
        Route::get('/news', 'HomeController@searchNews')->name('search.news');
    });

    Route::get('/news', 'HomeController@news')->name('news');

    Route::group(['prefix' => '/customer'], function() {
        Route::get('/', 'CustomerController@index')->name('customer.dashboard');
        Route::get('/bills', 'CustomerController@bills')->name('customer.bills');
        Route::get('/design', 'CustomerController@findDes')->name('customer.findDesign');
        Route::get('/bills/{id}', 'CustomerController@showBillDetails')->name('customer.show');
        Route::delete('/bills/{id}', 'CustomerController@deleteBill')->name('customer.delete');
        Route::get('/findsp','CustomerController@findSP');
        Route::get('/createbill','CustomerController@showCreateBill')->name('customer.create.bill');
        Route::post('/createbill','CustomerController@CreateBill')->name('customer.create.submit');
        Route::post('/storebilldetails','CustomerController@storeBillDetails')->name('customer.store');
        Route::post('/destroybilldetails','CustomerController@destroyBillDetails')->name('customer.destroy');
        Route::post('/editbilldetails','CustomerController@editBillDetails')->name('customer.edit');
        Route::put('/updatebill/{id}','CustomerController@updateBill')->name('customer.update');
        Route::get('/changepassword', 'CustomerController@show')->name('customer.changepassword');
        Route::post('/change', 'CustomerController@change')->name('customer.changepassword.submit');
    	Route::get('/login','Auth\CustomerLoginController@showLoginForm')->name('customer.login');
    	Route::post('/login','Auth\CustomerLoginController@login')->name('customer.login.submit');
        Route::get('/register','Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
        Route::post('/register','Auth\CustomerRegisterController@register')->name('customer.register.submit');
    	Route::get('/logout','Auth\CustomerLoginController@logout')->name('customer.logout');
        Route::get('/alert', function() { return view('alert.customerAlert');})->name('customer.alert');
    });
    //End frontend

    //Back end
    Route::get('/admin', 'DashboardController@index')->name('admin');

    Route::resource('/admin/quanlytaikhoan','UserController');

    Route::resource('/admin/quanlyphanquyen','RoleController');

    Route::get('/admin/findRole','RoleController@find');

    Route::post('/admin/changeNameRole','RoleController@change');

    Route::post('/admin/updateRole','RoleController@store');

    Route::post('/admin/deleteRole','RoleController@delete');

    Route::post('/admin/quanlytaikhoan/destroy','UserController@destroy');

    Route::post('/admin/quanlytaikhoan/edit_tk', 'UserController@update')->name('quanlytaikhoan.update');

    Route::get('/admin/quanlytaikhoan/profile/view', 'UserController@profileShow')->name('quanlytaikhoan.profile');

    Route::post('/admin/quanlytaikhoan/profile/update', 'UserController@profileEdit')->name('quanlytaikhoan.profileEdit');

    Auth::routes();

    Route::resource('/admin/quanlykhachhang','CustomerBEController');

    Route::post('/admin/quanlykhachhang/destroy','CustomerBEController@destroy');

    Route::post('/admin/quanlykhachhang/edit_kh', 'CustomerBEController@update')->name('quanlykhachhang.update');

    Route::resource('/admin/quanlytintuc','PostController');

    Route::post('/admin/quanlytintuc/destroy','PostController@destroy');

    Route::post('/admin/quanlytintuc/edit_tt', 'PostController@update')->name('quanlytintuc.update');

    Route::resource('/admin/quanlyloaitintuc','CategoryPostController');

    Route::post('/admin/quanlyloaitintuc/destroy','CategoryPostController@destroy');

    Route::get('/admin/findCategoryPost','CategoryPostController@find');

    Route::post('/admin/updateCategoryPost','CategoryPostController@store');

    Route::resource('/admin/quanlysanphamht','ProductCompleteController');

    Route::post('/admin/quanlysanphamht/edit_sanphamht', 'ProductCompleteController@update')->name('quanlysanphamht.update');

    Route::post('/admin/quanlysanphamht/destroy','ProductCompleteController@destroy');

    Route::resource('/admin/quanlyloaisanpham','CategoryProductController');

    Route::get('/admin/findCategoryProduct','CategoryProductController@find');

    Route::post('/admin/updateCategoryProduct','CategoryProductController@store');

    Route::post('/admin/quanlyloaisanpham/destroy','CategoryProductController@destroy');

    Route::resource('/admin/quanlysanpham','ProductsController');

    Route::post('/admin/quanlysanpham/edit_sanpham', 'ProductsController@update')->name('quanlysanpham.update');

    Route::post('/admin/quanlysanpham/destroy','ProductsController@destroy');

    Route::resource('/admin/quanlydonhang','BillController');

    Route::get('/admin/findkh','BillController@findKH');

    Route::get('/admin/findsp','BillController@findSP');

    Route::get('/admin/duyetBill','BillController@duyet');

    Route::post('/admin/quanlychitietdh/design','BillDetailsController@chooseDesign')->name('quanlychitietdh.design');

    Route::post('/admin/quanlychitietdh/store','BillDetailsController@store')->name('quanlychitietdh.store');

    Route::post('/admin/quanlychitietdh/destroy','BillDetailsController@destroy')->name('quanlychitietdh.destroy');

    Route::post('/admin/quanlychitietdh/edit','BillDetailsController@edit')->name('quanlychitietdh.edit');

    Route::resource('/admin/quanlythietke','DesignsController');

    Route::post('/admin/quanlythietke/destroy','DesignsController@destroy')->name('quanlythietke.destroy');

    Route::get('/admin/findDesigns','DesignsController@find')->name('quanlythietke.find');

    Route::get('/admin/findListDesigns','DesignsController@findlist')->name('quanlythietke.findlist');

    Route::resource('/admin/quanlybaohanh','WarrantyController');

    Route::resource('/admin/yeucausanxuat','YcsxController');

    Route::resource('/admin/chitietycsx','YcsxDetailsController');

    Route::resource('/admin/quanlyhoadon','InvoiceController');

    Route::get('/admin/quanlyhoadon/{id}/print','InvoiceController@print')->name('quanlyhoadon.print');

    Route::resource('/admin/quanlyncc','NCCController');

    Route::resource('/admin/quanlyvattu','SuppliesController');

    Route::resource('/admin/vatlieu','MaterialController');

    Route::resource('/admin/kehoachvattu','KhvtController');

    Route::resource('/admin/quanlytiendo','TdsxController');

    Route::resource('/admin/quanlykhohang','KhohangController');

    Route::resource('/admin/quanlyphieunhap','PhieuNhapController');

    Route::resource('/admin/chitietphieunhap','PhieuNhapDetailsController');

    Route::resource('/admin/quanlyphieuxuat','PhieuxuatController');

    Route::resource('/admin/chitietphieuxuat','PhieuxuatDetailsController');

    Route::resource('/admin/yeucauxuatnhap','YcnxController');

    Route::resource('/admin/chitietyeucaunx','YcnxDetailsController');

    Route::post('/admin/chitietphieunhap/session','PhieuNhapDetailsController@session')->name('chitietphieunhap.session');

    Route::post('/admin/chitietphieuxuat/session','PhieuxuatDetailsController@session')->name('chitietphieuxuat.session');

    Route::post('/admin/chitietyeucaunx/session','YcnxDetailsController@session')->name('chitietyeucaunx.session');

    Route::post('/admin/chitietphieunhap/session/soluong','PhieuNhapDetailsController@updateSoLuong')->name('chitietphieunhap.soluong');

    Route::post('/admin/chitietphieuxuat/session/soluong','PhieuxuatDetailsController@updateSoLuong')->name('chitietphieuxuat.soluong');

    Route::post('/admin/chitietyeucaunx/session/soluong','YcnxDetailsController@updateSoLuong')->name('chitietyeucaunx.soluong');

    Route::post('/admin/chitietphieunhap/session/baohanh','PhieuNhapDetailsController@updatebaohanh')->name('chitietphieunhap.baohanh');

    Route::delete('/admin/chitietphieunhap/session/{id}','PhieuNhapDetailsController@delete')->name('chitietphieunhap.delete');

    Route::delete('/admin/chitietphieuxuat/session/{id}','PhieuxuatDetailsController@delete')->name('chitietphieuxuat.delete');

    Route::delete('/admin/chitietyeucaunx/session/{id}','YcnxDetailsController@delete')->name('chitietyeucaunx.delete');

    Route::get('/admin/chitietphieuxuat/session/refresh','PhieuxuatController@refresh');

    Route::get('/admin/chitietyeucaunx/session/refresh','YcnxController@refresh');

    Route::get('/admin/chitietphieuxuat/session/selectKho','PhieuxuatController@selectKho');

    Route::post('/admin/chitietphieunhap/edit/soluong','PhieuNhapDetailsController@editsoluong')->name('chitietphieunhap.editsoluong');

    Route::post('/admin/chitietphieuxuat/edit/soluong','PhieuxuatDetailsController@editsoluong')->name('chitietphieuxuat.editsoluong');

    Route::post('/admin/chitietphieunhap/edit/baohanh','PhieuNhapDetailsController@editbaohanh')->name('chitietphieunhap.editbaohanh');

    Route::post('/admin/chitietphieunhap/edit/delete','PhieuNhapDetailsController@deleterow')->name('chitietphieunhap.deleterow');

    Route::post('/admin/chitietphieuxuat/edit/delete','PhieuxuatDetailsController@deleterow')->name('chitietphieuxuat.deleterow');

    Route::get('/admin/findncc','SuppliesController@findncc');

    Route::put('/admin/quanlytiendo/{id}/done','TdsxController@done')->name('quanlytiendo.done');

    Route::post('/admin/quanlybaohanh/destroy','WarrantyController@destroy')->name('quanlybaohanh.destroy');

    Route::post('/admin/quanlyncc/destroy','NCCController@destroy')->name('quanlyncc.destroy');

    Route::post('/admin/quanlyvattu/destroy','SuppliesController@destroy')->name('quanlyvattu.destroy');

    Route::post('/admin/editSL','MaterialController@editSL')->name('vatlieu.editsl');

    Route::post('/admin/deleteVL','MaterialController@destroy')->name('vatlieu.destroy');

    Route::post('/admin/deleteSP','YcsxDetailsController@destroy')->name('chitietycsx.destroy');

    Route::post('/admin/editDesign','YcsxDetailsController@chooseDesign')->name('chitietycsx.design');

    Route::post('/admin/createYCSX','BillController@createYCSX')->name('quanlyhoadon.createYCSX');

    Route::group(['prefix' => '/quanlysanphamsx'], function() {
        Route::get('/', 'TTSXController@index')->name('quanlysanphamsx.index');
        Route::get('/create', 'TTSXController@create')->name('quanlysanphamsx.create');
        Route::put('/{id}', 'TTSXController@destroy')->name('quanlysanphamsx.destroy');
        Route::post('/store', 'TTSXController@store')->name('quanlysanphamsx.store');
    });

    Route::group(['prefix' => '/quanlysanphamloi'], function() {
        Route::get('/', 'SPLController@index')->name('quanlysanphamloi.index');
        Route::get('/create', 'SPLController@create')->name('quanlysanphamloi.create');
        Route::post('/store', 'SPLController@store')->name('quanlysanphamloi.store');
        Route::put('/{id}', 'SPLController@destroy')->name('quanlysanphamloi.destroy');
    });

    Route::group(['prefix' => '/danhsachtonkho'], function() {
        Route::get('/', 'TonkhoController@index')->name('danhsachtonkho.index');
    });

    Route::group(['prefix' => '/baocaotonkho'], function() {
        Route::get('/', 'BaoCaotonKhoController@index')->name('baocaotonkho.index');
        Route::get('/phieunhap', 'BaoCaotonKhoController@phieunhap')->name('baocaotonkho.phieunhap');
        Route::get('/phieuxuat', 'BaoCaotonKhoController@phieuxuat')->name('baocaotonkho.phieuxuat');
        Route::post('/export', 'BaoCaotonKhoController@ExportExcel')->name('baocaotonkho.export');
        Route::post('/exportPN', 'BaoCaotonKhoController@ExportExcelPN')->name('baocaotonkho.exportPN');
        Route::post('/exportPX', 'BaoCaotonKhoController@ExportExcelPX')->name('baocaotonkho.exportPX');
    });

    Route::group(['prefix' => '/thongkesanxuat'], function() {
        Route::get('/', 'ThongKeSanXuatController@index')->name('thongkesanxuat.index');
    });

    Route::group(['prefix' => '/thongkewebsite'], function() {
        Route::get('/', 'ThongKeWebsiteController@index')->name('thongkewebsite.index');
    });

    Route::group(['prefix' => '/quanlyphanhoi'], function() {
        Route::get('/', 'ReportsController@index')->name('quanlyphanhoi.index');
        Route::post('/create', 'ReportsController@create')->name('quanlyphanhoi.create');
        Route::delete('/{id}', 'ReportsController@destroy')->name('quanlyphanhoi.delete');
    });
    //End backend
// });