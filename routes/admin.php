 <?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\HallController;
use App\Http\Controllers\Admin\HallsCategoryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageOptionsCategoryController;
use App\Http\Controllers\Admin\PackageOptionsController;
use App\Http\Controllers\Admin\SystemAdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromoCodeController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorAdminController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\AvailableDateController;
use App\Http\Controllers\Admin\BecomeVendorController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\FrontSettingsController;
use App\Http\Controllers\Admin\HallBookingController;
use App\Http\Controllers\Admin\WithDrawRequestController;
use App\Http\Controllers\DigitalCardController;
use App\Http\Controllers\WithDrawController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Settings;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\OccasionController;
use App\Models\Product;

Route::get('/subcategories/{category_id}', [ProductCategoryController::class, 'getSubcategories']);
Route::prefix('acp')->name('admin.')->group(function () {

    Route::get('updateAdminToken', [VendorAdminController::class, 'updateFToken'])->name('updateAdminToken');
    Route::get('push', [VendorAdminController::class, 'sendWebNotification'])->name('sendWebNotification');


    // start admin routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'loginPage',)->name('loginPage');
        Route::post('login', 'login')->name('login');
        Route::delete('logout', 'logout')->name('logout');
    });


    // start dashboard routes
    Route::middleware(['auth:admin', 'role:super-admin|admin|vendor-admin'])->group(function () {

        Route::get('/', function () {

            return redirect()->route('admin.dashboard');
        });

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


        // system-admins

        Route::controller(SystemAdminController::class)->prefix('system-admins')->name('system-admins.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // system-admins




        // vendor-admins

        Route::controller(VendorAdminController::class)->prefix('vendor-admins')->name('vendor-admins.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');

            Route::get('get-permission/{vendor}' , 'get_permission')->name('get_permission');
        });
        // vendor-admins


        // vendors

        Route::controller(VendorController::class)->prefix('vendors')->name('vendors.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');

            Route::get('company', 'company')->name('company');
            Route::get('individual', 'individual')->name('individual');
            Route::get('/{id}/show', 'show')->name('show');
        });
        // vendors





        // admin-categories

        Route::controller(AdminCategoriesController::class)->prefix('admin-categories')->name('admin-categories.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // admin-categories


        // user

        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/search', 'search')->name('search');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        });
        // user


        // counties

        Route::controller(CountryController::class)->prefix('countries')->name('countries.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/export', 'export')->name('export');
            // Route::get('/create', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            // Route::get('/{id}/edit', 'edit')->name('edit');
            // Route::put('/{id}/update', 'update')->name('update');
            // Route::put('/{id}/restore', 'restore')->name('restore');
            // Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // counties



        // cities

        Route::controller(CityController::class)->prefix('cities')->name('cities.')->group(function () {


            Route::get('', 'index')->name('index');



            Route::get('cityByCountryId/{id}', 'cityByCountryId')->name('cityByCountryId');
            // Route::get('cityByCountryId','cityByCountryId')->name('cityByCountryId');

            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');

            Route::get('/{id}/show', 'show')->name('show');
        });
        // cities

        // reports

        Route::controller(ReportController::class)->prefix('reports')->name('reports.')->group(
            function () {
                Route::get('registered-users','indexRegisteredUsers')->name('registered-users');
                Route::get('data-registered-users','dataRegisteredUsers')->name('data.registered-users');

                Route::get('area-users','indexAreaUsers')->name('area-users');
                Route::get('data-area-users','dataAreaUsers')->name('data.area-users');

                Route::get('gender-users','indexGenderUsers')->name('gender-users');
                Route::get('data-gender-users','dataGenderUsers')->name('data.gender-users');

                Route::get('area-statistics','indexAreaStatistics')->name('area-statistics');
                Route::get('data-area-statistics','dataAreaStatistics')->name('data.area-statistics');

                Route::get('orders-statistics','indexOrdersStatistics')->name('orders-statistics');
                Route::get('data-orders-statistics','dataOrdersStatistics')->name('data.orders-statistics');

                Route::get('orders-reports','indexOrdersReports')->name('orders-reports');
                Route::get('data-orders-reports','dataOrdersReports')->name('data.orders-reports');

                Route::get('orders-areas','indexOrdersAreas')->name('orders-areas');
                Route::get('data-orders-areas','dataOrdersAreas')->name('data.orders-areas');

                Route::get('halls-statistics','indexHallsStatistics')->name('halls-statistics');
                Route::get('data-halls-statistics','dataHallsStatistics')->name('data.halls-statistics');

                Route::get('halls-reports','indexHallsReports')->name('halls-reports');
                Route::get('data-halls-reports','dataHallsReports')->name('data.halls-reports');

                Route::get('registered-vendors-statistics','indexRegisteredVendorsStatistics')->name('registered-vendors-statistics');
                Route::get('data-registered-vendors-statistics','dataRegisteredVendorsStatistics')->name('data.registered-vendors-statistics');

                Route::get('vendors-areas','indexVendorsAreas')->name('vendors-areas');
                Route::get('data-vendors-areas','dataVendorsAreas')->name('data.vendors-areas');

                Route::get('products-statistics', 'indexProductsStatistics')->name('products-statistics');
                Route::get('data-products-statistics', 'dataProductsStatistics')->name('data.products-statistics');


            }
        );
        // reports

        // regions

        Route::controller(RegionController::class)->prefix('regions')->name('regions.')->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('/getById/{id}', 'getById');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        });
        // regions





        // halls

        Route::controller(HallController::class)->prefix('halls')->name('halls.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/hallsByVendorId', 'hallsByVendorId')->name('hallsByVendorId');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        });
        // halls



        // packages-options-categories

        Route::controller(PackageOptionsCategoryController::class)->prefix('packages-options-categories')->name('packages-options-categories.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // packages-options-categories



        // packages-options

        Route::controller(PackageOptionsController::class)->prefix('packages-options')->name('packages-options.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // packages-options


        // packages

        Route::controller(PackageController::class)->prefix('packages')->name('packages.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // packages


        // taxes

        Route::controller(TaxController::class)->prefix('taxes')->name('taxes.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        // taxes



        // shippings

        // Route::controller(ShippingController::class)->prefix('shippings')->name('shippings.')->group(function () {


        //     Route::get('','index')->name('index');
        //     Route::get('/export','export')->name('export');
        //     Route::get('/create', 'create')->name('create');
        //     Route::post('/store', 'store')->name('store');
        //     Route::get('/{id}/edit', 'edit')->name('edit');
        //     Route::put('/{id}/update', 'update')->name('update');
        //     Route::put('/{id}/restore', 'restore')->name('restore');
        //     Route::delete('/{id}/destroy', 'destroy')->name('destroy');


        // });
        // shippings


        //promo-codes

        Route::controller(PromoCodeController::class)->prefix('promo-codes')->name('promo-codes.')->group(function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        });
        //promo-codes



        // settings

        Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {

            Route::get('', 'index')->name('index');
            Route::put('/update', 'update')->name('update');
        });
        // settings






    });
    // start dashboard routes




    // products-categories

    Route::controller(ProductCategoryController::class)->prefix('products-categories')->name('products-categories.')->group(
        function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/subCategoryByParentId', 'subCategoryByParentId')->name('subCategoryByParentId');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        }
    );
    // products-categories

    // products

    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(
        function () {
            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/subCategoryByParentId', 'subCategoryByParentId')->name('subCategoryByParentId');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::put('/{id}/activation', 'activation')->name('activation');
            Route::put('/{id}/inactivation', 'inactivation')->name('inactivation');
            Route::get('/{id}/show', 'show')->name('show');
            Route::put('/{id}/updatePrice', 'updatePrice')->name('updatePrice');
            Route::put('/{id}/updateStock', 'updateStock')->name('updateStock');
            Route::get('/search', 'search')->name('search');

            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        }
    );
    // products

    // orders

    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(
        function () {


            Route::get('', 'index')->name('index');
            Route::get('newOrders', 'newOrders')->name('newOrders');
            Route::get('inprogressOrders', 'inprogressOrders')->name('inprogressOrders');
            Route::get('deliveredOrders', 'deliveredOrders')->name('deliveredOrders');
            Route::get('cancelledOrders', 'cancelledOrders')->name('cancelledOrders');

            //
            Route::post('/{id}/AddExtraFees', 'AddExtraFees')->name('AddExtraFees');
            Route::post('/{id}/AddSpecialDiscount', 'AddSpecialDiscount')->name('AddSpecialDiscount');

            Route::delete('/{orderId}/deleteExtraFees/{id}', 'deleteExtraFees')->name('deleteExtraFees');
            Route::delete('/{orderId}/deleteSpecialDiscount/{id}', 'deleteSpecialDiscount')->name('deleteSpecialDiscount');
            //
            Route::get('{type}/export', 'export')->name('export');
            Route::put('/{id}/inprogressAction', 'inprogressAction')->name('inprogressAction');
            Route::put('/{id}/deliveredAction', 'deliveredAction')->name('deliveredAction');
            Route::put('/{id}/updateComment', 'updateComment')->name('updateComment');
            Route::put('/{id}/updateCustomAddressFromAdmin', 'updateCustomAddressFromAdmin')->name('updateCustomAddressFromAdmin');

            Route::delete('/{id}/cancelledAction', 'cancelledAction')->name('cancelledAction');

            Route::get('/{id}/show', 'show')->name('show');
        }
    );
    // orders

    // notifications

    Route::controller(NotificationController::class)->prefix('notifications')->name('notifications.')->group(
        function () {
            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        }
    );
    // notifications

    Route::controller(HallBookingController::class)->prefix('bookings')->name('bookings.')->group(function () {


        Route::get('', 'index')->name('index');

        Route::get('successfullBookings', 'successfullBookings')->name('successfullBookings');
        Route::get('cancelledBookings', 'cancelledBookings')->name('cancelledBookings');
        Route::put('/{id}/successAction', 'successAction')->name('successAction');
        Route::delete('/{id}/cancelledAction', 'cancelledAction')->name('cancelledAction');
        Route::get('/show/{id}', 'show')->name('show');
    });



    Route::controller(AvailableDateController::class)->prefix('availabel_date')->name('availabel_date.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::put('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::controller(OccasionController::class)->prefix('occasion')->name('occasion.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::put('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');

    });



    Route::controller(ColorsController::class)->prefix('colors')->name('colors.')->group(function () {

        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::put('/{id}/restore', 'restore')->name('restore');
        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::controller(SizeController::class)->prefix('sizes')->name('sizes.')->group(function () {


        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::put('/{id}/restore', 'restore')->name('restore');

        Route::get('/{id}/destroy', 'destroy')->name('destroy');
    });

    Route::controller(ProductController::class)->prefix('product_request')->name('product_request.')->group(function () {


        Route::get('/{status}', 'product_request')->name('product_request');

        Route::get('/{id}/product_request_accept', 'product_request_accept')->name('product_request_accept');
        Route::get('/{id}/product_request_reject', 'product_request_reject')->name('product_request_reject');
        Route::get('/{id}/show', 'show')->name('show');


    });
    Route::controller(HallController::class)->prefix('hall_request')->name('hall_request.')->group(function () {


        Route::get('/{status}', 'hall_request')->name('hall_request');

        Route::get('/{id}/hall_request_accept', 'hall_request_accept')->name('hall_request_accept');
        Route::get('/{id}/hall_request_reject', 'hall_request_reject')->name('hall_request_reject');
        Route::get('/{id}/show', 'show')->name('show');


    });


    Route::controller(ContactMessageController::class)->prefix('contact-messages')->name('contact-messages.')->group(
        function () {

            Route::get('', 'index')->name('index');
            Route::get('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        }
    );

    Route::controller(ContactMessageReplyController::class)->prefix('contact-message-reply')->name('contact-message-reply.')->group(
        function () {

            Route::post('/{id}/reply', 'send_reply')->name('send_reply');
        }
    );

    // shippings

    Route::controller(ShippingController::class)->prefix('shippings')->name('shippings.')->group(
        function () {


            Route::get('', 'index')->name('index');
            Route::get('/export', 'export')->name('export');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::put('/{id}/restore', 'restore')->name('restore');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            Route::get('/{id}/show', 'show')->name('show');
        }
    );

    Route::controller(DigitalCardController::class)->prefix('digital-cart')->name('digital-cart.')->group(
        function () {
            Route::get('', 'index')->name('index');
        }
    );

    Route::controller(BecomeVendorController::class)->prefix('become')->name('become.')->group(function () {


        Route::get('/{status}', 'index')->name('index');
        Route::get('/status/edit/{id}', 'edit')->name('edit');
        Route::post('/status/accpted/{id}', 'update_accept')->name('accpted');
        Route::get('/status/reject/{id}', 'update_Reject')->name('reject');
        Route::get('/{id}/show', 'show')->name('show');
    });

    // shippings

    /////////////////////////////////////////////// With Draw ////////////////////////////////////
    Route::controller(WithDrawController::class)->prefix('admin')->name('with-draw-request.')->group(function () {
        Route::get('send-to-vendor', 'send_to_vendor')->name('send_to_vendor');
        Route::post('send-money', 'send_money')->name('send_money');
        Route::get('all' , 'all')->name('all');
        Route::get('filter-all' , 'filter_all')->name('filter_all');
        Route::get('from-you' , 'from_you')->name('from_you');
        Route::get('filter-from-you' , 'filter_from_you')->name('filter_from_you');
        Route::get('to-you' , 'to_you')->name('to_you');
        Route::get('filter-to-you' , 'filter_to_you')->name('filter_to_you');
        Route::post('accept-money/{request_id}' , 'accept_money')->name('accept_money') ;
        Route::post('reject-money/{request_id}' , 'reject_money')->name('reject_money') ;
        Route::get('get-vendor-order-balance/{vendor_email}/{key}/{order_number}' , 'get_vendor_order_balance')->name('get_vendor_order_balance');
        Route::get('get-vendor-balance/{vendor_email}/{key}' , 'get_vendor_balance')->name('get_vendor_balance');
        Route::get('total-withdraw' , 'total_withdraw')->name('total_withdraw');
        Route::get('filter-total-withdraw' , 'filter_total_withdraw')->name('filter_total_withdraw');
        Route::get('total-withdraw-per-month' , 'total_withdraw_per_month')->name('total_withdraw_per_month');

        /// vendor send request
        Route::get('send-request' , 'send_request')->name('send_request');
        Route::post('send-money-request' , 'send_money_request')->name('send_money_request');
        Route::get('withdraw-requests/{status}' , 'withdraw_requests')->name('withdraw_requests');
        Route::get('resend-money-requests/{request_id}' , 'resend_money_requests')->name('resend_money_requests');
        Route::get('filter-sent-request' , 'filter_sent_request')->name('filter_sent_request') ;
        Route::get('get-orders-based-on-key/{key}' , 'get_orders_based_on_key')->name('get_orders_based_on_key');
        Route::get('get-order-price/{key}/{order}' , 'get_order_price')->name('get_order_price');
    });

    Route::controller(HallBookingController::class)->prefix('admin')->name('hall-booking.')->group(function () {

        Route::get('pending', 'pendingBookings')->name('pendingBookings');
        Route::get('/canceled', 'cancelledBookings')->name('cancelledBookings');
        Route::get('/success', 'successfullBookings')->name('successfullBookings');
        Route::get('/{id}/show', 'show')->name('show');
    });


    // app settings [ web_site and application ]

    Route::controller(FrontSettingsController::class)->prefix('front-settings')->name('front-settings.')->group(function () {

        // top navbar
        Route::get('top-navbar', 'top_navbar')->name('top_navbar');
        Route::post('edit-top-navbar', 'edit_top_navbar')->name('edit_top_navbar');

        // view all products
        Route::get('view-all-products', 'view_all_products')->name('view_all_products');
        Route::post('edit-view-all-products/{id}', 'edit_view_all_products')->name('edit_view_all_products');

        // latest widding halls
        Route::get('latest-wedding-halls-section', 'latest_wedding_halls_section')->name('latest_wedding_halls_section');
        Route::post('edit-latest-wedding-halls-section/{id}', 'edit_latest_wedding_halls_section')->name('edit_latest_wedding_halls_section');

        // latest products
        Route::get('latest-products-section', 'latest_products_section')->name('latest_products_section');
        Route::post('edit-latest-products-section/{id}', 'edit_latest_products_section')->name('edit_latest_products_section');

        // explore category
        Route::get('explore-category', 'explore_category')->name('explore_category');
        Route::post('edit-explore_category/{id}', 'edit_explore_category')->name('edit_explore_category');

        // assign explore category
        Route::get('explore-category', 'explore_category')->name('explore_category');

        // best sellers
        Route::get('best-sellers', 'best_sellers')->name('best_sellers');
        Route::post('edit-best-sellers/{id}', 'edit_best_sellers')->name('edit_best_sellers');

        // shop by occasion
        Route::get('shop-by-occasion', 'shop_by_occasion')->name('shop_by_occasion');
        Route::post('edit-shop-by-occasion/{id}', 'edit_shop_by_occasion')->name('edit_shop_by_occasion');

        // shop by brands
        Route::get('shop-by-brands', 'shop_by_brands')->name('shop_by_brands');
        Route::post('edit-shop-by-brands/{id}', 'edit_shop_by_brands')->name('edit_shop_by_brands');

        // hint section
        Route::get('hints', 'hints')->name('hints');
        Route::post('edit-hints/{id}', 'edit_hints')->name('edit_hints');

        // last engagment
        Route::get('hints', 'hints')->name('hints');
        Route::post('edit-hints/{id}', 'edit_hints')->name('edit_hints');

        // last engagment
        Route::get('latest-engagments-halls', 'latest_engagments_halls')->name('latest_engagments_halls');
        Route::post('edit-latest-engagments-halls/{id}', 'edit_latest_engagments_halls')->name('edit_latest_engagments_halls');

        // last birthday halls
        Route::get('latest-birthday-halls', 'latest_birthday_halls')->name('latest_birthday_halls');
        Route::post('edit-latest-birthday-halls/{id}', 'edit_latest_birthday_halls')->name('edit_latest_birthday_halls');

        // features section
        Route::get('features-section', 'features_section')->name('features_section');
        Route::post('edit-features-section/{id}', 'edit_features_section')->name('edit_features_section');

        // news section
        Route::get('news-section', 'news_section')->name('news_section');
        Route::post('edit-news-section/{id}', 'edit_news_section')->name('edit_news_section');

        // top footer
        Route::get('top-footer', 'top_footer')->name('top_footer');
        Route::post('edit-top-footer/{id}', 'edit_top_footer')->name('edit_top_footer');

        // end footer [ main section ]
        Route::get('footer-main-section', 'footer_main_section')->name('footer_main_section');
        Route::post('edit-footer-main-section/{id}', 'edit_footer_main_section')->name('edit_footer_main_section');

        // end footer [ fast links section ]
        Route::get('footer-fast-links-section', 'footer_fast_links_section')->name('footer_fast_links_section');
        Route::post('edit-footer-fast-links-section/{id}', 'edit_footer_fast_links_section')->name('edit_footer_fast_links_section');
        Route::post('create-footer-fast-links-section', 'create_footer_fast_links_section')->name('create_footer_fast_links_section');
        Route::get('delete-footer-fast-links-section/{id}', 'delete_footer_fast_links_section')->name('delete_footer_fast_links_section');

        // end footer [ find us section ]
        Route::get('footer-find-us-section', 'footer_find_us_section')->name('footer_find_us_section');
        Route::post('edit-footer-find-us-section/{id}', 'edit_footer_find_us_section')->name('edit_footer_find_us_section');
        Route::post('create-footer-find-us-section', 'create_footer_find_us_section')->name('create_footer_find_us_section');
        Route::get('delete-footer-find-us-section/{id}', 'delete_footer_find_us_section')->name('delete_footer_find_us_section');

        // contact us footer
        Route::get('contact-us-footer', 'contact_us_footer')->name('contact_us_footer');
        Route::post('edit-contact-us-footer/{id}', 'edit_contact_us_footer')->name('edit_contact_us_footer');
    });

    Route::controller(AdvertisementController::class)->prefix('advertisements')->name('advertisements.')->group(function () {
        Route::get('outer-clients' , "outer_clients")->name("outer_clients");
        Route::post('add-outer-clients' , "add_outer_clients")->name("add_outer_clients");
        Route::post('edit-outer-clients/{id}' , "edit_outer_clients")->name("edit_outer_clients");
        Route::get('delete-outer-clients/{id}' , "delete_outer_clients")->name("delete_outer_clients");

        Route::get('advertisements' , "advertisements")->name("advertisements");
        Route::get('add-advertisements-page' , "add_advertisements_page")->name("add_advertisements_page");
        Route::post('add-advertisements' , "add_advertisements")->name("add_advertisements");
        Route::get('edit-advertisements-page/{id}' , "edit_advertisements_page")->name("edit_advertisements_page");
        Route::post('edit-advertisements/{id}' , "edit_advertisements")->name("edit_advertisements");
        Route::get('delete-advertisements/{id}' , "delete_advertisements")->name("delete_advertisements");

        Route::get('clients-ads' , "clients_ads")->name("clients_ads");
        Route::get('assign-outer-client-ad-page' , "assign_outer_client_ad_page")->name("assign_outer_client_ad_page");
        Route::get('assign-inner-client-ad-page' , "assign_inner_client_ad_page")->name("assign_inner_client_ad_page");
        Route::post('assign-client-ad' , "assign_client_ad")->name("assign_client_ad");
        Route::post('edit-client-ad/{id}' , "edit_client_ad")->name("edit_client_ad");
        Route::get('delete-client-ad/{id}' , "delete_client_ad")->name("delete_client_ad");

        Route::get('vendor-show-advertisements' , "vendor_show_advertisements")->name("vendor_show_advertisements");

    });
});
