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

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/vendor', 'Auth\LoginController@showVendorLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/vendor', 'Auth\RegisterController@showVendorRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/vendor', 'Auth\LoginController@vendorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/vendor', 'Auth\RegisterController@createVendor');


// Route::get('site/shutdown', function(){
// return Artisan::call('down --allow=220.247.129.245');
// });

// Route::get('site/live', function(){
// return Artisan::call('up');
// });




//pagescontroller

Route::get('/' ,'PageController@index')->name('home');

Route::get('/home' ,'PageController@index');
Route::get('/products/{id}' ,'ProductController@show')->name('products.show');


Route::get('/about' ,'PageController@aboutus')->name('about');
Route::get('/delivery/info' ,'PageController@deliveryus')->name('delivery');
Route::get('/policy/info' ,'PageController@policyus')->name('policy');
Route::get('/contact' ,'PageController@contactus')->name('contact');
Route::get('/contact/map' ,'PageController@contactmap')->name('contact.map');


  // ...... brand and category shot ...... //

Route::get('/category/sort/{id}' ,'ProductController@category_sort')->name('category.shot');
Route::get('/brand/sort/{id}' ,'ProductController@brand_sort')->name('brand.shot');
Route::get('/vendor/product/sort/{id}' ,'ProductController@vendor_sort')->name('vendor.shot');

Route::get('/vendor/store/all','ProductController@vendor_store_all')->name('vendor.store.all');


Route::get('all/categories/show' ,'ProductController@category_show_all')->name('category.show.all');


// ...... blog ...... //

Route::get('/blog/details/{id}' ,'ProductController@blog_detail_show')->name('blog.details.show');
Route::post('/blogcomment','ProductController@blogcomment_store')->name('blog.blogcomment.store');

// ...... Newslater ...... //

Route::post('/newslater','ProductController@newslater_store')->name('newslater.store');



 // ...... comment ...... //

Route::post('/product_store','ProductController@comment_store')->name('comment.store');
Route::get('/search' ,'PageController@search')->name('search');
Route::get('/products' ,'PageController@product')->name('product.index');

// price filter search
Route::post('/price search' ,'PageController@pricesearch')->name('price.search');

// ...... order track ...... //


Route::get('/order/track' ,'PageController@order_track')->name('order_track');
Route::get('/order/track/search' ,'PageController@order_track_search')->name('order_track_search');

Route::get('/ads/checkout/{id}' ,'PageController@adsCheckout')->name('ad.checkout');
Route::post('/ads/checkout/post' ,'PageController@adsCheckoutPost')->name('ad.checkout.post');


Route::get('locale/{locale}',function($locale){
  Session::put('locale',$locale);
  return redirect()->back();
});



 Route::group(['prefix' => 'compare'] , function(){

        Route::post('/store','CartsController@compare_store')->name('compare.store');
        Route::get('/' ,'CartsController@compare_show')->name('compare.show');
        Route::get('/product/delete/{id}','CartsController@compare_delete')->name('compare.delete');


   });

  Route::group(['prefix' => 'carts'] , function(){


        Route::get('/' ,'CartsController@index')->name('carts.show');
        Route::post('/store','CartsController@store')->name('carts.store');
        Route::get('/delete/{id}','CartsController@delete')->name('carts.delete');
        Route::post('/update/{id}','CartsController@update')->name('carts.update');

        Route::post('/admin/update/{id}','CartsController@admin_carts_update')->name('admin.carts.show');




   });

   Route::group(['prefix' => 'checkout'] , function(){


        Route::get('/' ,'CheckoutController@index')->name('checkout');
        Route::post('/store','CheckoutController@carts_store')->name('checkout.store');

        Route::get('/success/{id}' ,'CheckoutController@success')->name('frontend.success.index');


   });


// ...... Backend Admin Route  ...... //

 Route::group(['prefix' => 'admin'] , function(){

         Route::get('/','AdminPagesController@index')->name('admin.index');


    // ...... Product Route  ...... //

        Route::get('/product/create','AdminPagesController@product_create')->name('backend.pages.product.create');
        Route::get('/manage_products','AdminPagesController@manage_products')->name('backend.pages.product.index');
        Route::post('/product_store','AdminPagesController@product_store')->name('admin.product.store');

        Route::get('/product/edit/{id}','AdminPagesController@product_edit')->name('backend.pages.product.edit');
        Route::post('/product/update/{id}','AdminPagesController@product_update')->name('backend.pages.product.update');
        Route::get('/product/delete/{id}','AdminPagesController@product_delete')->name('backend.pages.product.delete');


        // multiple image

        Route::get('/product/show/{id}','AdminPagesController@show_image')->name('backend.pages.product.show_image');
        Route::get('/product/imageedit/{id}','AdminPagesController@edit_image')->name('backend.pages.productimage.edit');
        Route::post('/product/imageupdate/{id}','AdminPagesController@update_image')->name('backend.pages.productimage.update');
        Route::get('/product/imagedelete/{id}','AdminPagesController@productimage_delete')->name('backend.pages.productimage.delete');

        Route::get('add/product/image/{id}','AdminPagesController@add_multiple_image')->name('backend.pages.product.add_multiple_image');

        Route::post('add/product/imageadd','AdminPagesController@add_image')->name('backend.pages.productimage.add');

        //--- sell Product ---//
        Route::get('/manage_products_sell','AdminPagesController@manage_products_sell')->name('backend.pages.product.manage_products_sell');

        Route::get('/product_sell/edit/{id}','AdminPagesController@product_edit_sell')->name('backend.pages.product.edit_sell');
        Route::post('/now/product_sell/update/{id}','AdminPagesController@product_update_sell')->name('backend.pages.product.update_sell.now');

        //--- Display Product  manage_products_sell ---//
        Route::get('/display/product/active','AdminPagesController@active_product')->name('active.product.show');
        Route::get('/display/category','AdminPagesController@display_catregory')->name('display.category.show');
        Route::get('/display/edit/{id}','AdminPagesController@display_sell')->name('display.category.sell.edit');
        Route::post('/product_sell/update/{id}','AdminPagesController@display_update')->name('display.category.sell.update');
        Route::get('/active/product/{id}','AdminPagesController@active_product_req')->name('active.product.req');
        Route::post('/product/active/req/update/{id}','AdminPagesController@product_update_active_req')->name('backend.pages.product.active_req');


        Route::get('/newslater/details' ,'AdminPagesController@newslater_detail')->name('newslater.details.show');
        Route::get('/newslater/delete/{id}','AdminPagesController@newslater_delete')->name('newslater.details.delete');

        //--- Just For You Product ---//


        Route::get('/product_jfu/edit/{id}','AdminPagesController@product_edit_jfu')->name('backend.pages.product.edit_jfu');
        Route::post('/now/product_jfu/update/{id}','AdminPagesController@product_update_jfu')->name('backend.pages.product.update_jfu.now');


         // liquid
        Route::get('/product/liquid/{id}','AdminPagesController@product_liquid')->name('backend.pages.product.liquid');
        Route::post('/product/liquid/store','AdminPagesController@product_liquid_store')->name('admin.liquid.store');
        Route::get('/product/liquid_delete/{id}','AdminPagesController@product_liquid_delete')->name('backend.pages.product_liquid.delete');

        // color
        Route::get('/product/color/{id}','AdminPagesController@product_color')->name('backend.pages.product.color');
        Route::post('/product/color/store','AdminPagesController@product_color_store')->name('admin.color.store');
        Route::get('/product/color_delete/{id}','AdminPagesController@product_color_delete')->name('backend.pages.product_color.delete');


        // vendor Info....
        Route::get('/vendor/create','AdminPagesController@vendor_create')->name('admin.vendor.create');
        Route::post('/vendor/store','AdminPagesController@vendor_store')->name('admin.vendor.store');
        Route::get('/vendor/show','AdminPagesController@vendor_show')->name('admin.vendor.show');
        Route::get('/vendor/edit/{id}','AdminPagesController@vendor_edit')->name('backend.pages.vendor.editvendorinfo');
        Route::post('/vendor/edit/{id}','AdminPagesController@vendor_update')->name('admin.vendor.update');
        Route::get('/vendor/delete/{id}','AdminPagesController@vendor_delete')->name('admin.vendor.delete');


 // ...... Category Route  ...... //

        Route::get('/Category','CategoryController@index')->name('backend.pages.Category.index');
        Route::get('/category/create','CategoryController@category_create')->name('backend.pages.category.create');
        Route::post('/category_store','CategoryController@category_store')->name('admin.category.store');

        Route::get('/category/delete/{id}','CategoryController@delete')->name('backend.pages.category.delete');
	      Route::get('/Category/edit/{id}','CategoryController@edit')->name('backend.pages.category.edit');
        Route::post('/Category/update/{id}','CategoryController@update')->name('backend.pages.category.update');

        Route::get('/must/category/delete/{id}','CategoryController@delete_must')->name('backend.pages.category.delete.must');


        Route::get('show/display/category','CategoryController@display_catregory')->name('ondisplay.category.show');
        Route::get('/display/show/display/{id}','CategoryController@display_sell_category')->name('ondisplay.category.show.edit');
        Route::post('/display/category/show/update/{id}','CategoryController@display_update')->name('ondisplay.category.show.update');


        Route::get('show/display/sort_by_category/category','CategoryController@displaysort_by_category_catregory')->name('ondisplaysort_by_category.category.show');
        Route::get('/display/show/display/sort_by_category/{id}','CategoryController@displaysort_by_category_sell_category')->name('ondisplaysort_by_category.category.show.edit');
        Route::post('/display/category/show/sort_by_category/update/{id}','CategoryController@displaysort_by_category_update')->name('ondisplaysort_by_category.category.show.update');


 // ...... Brand Route  ...... //


       Route::get('/institute','BrandController@index')->name('admin.brand');
       Route::get('/institute/create','BrandController@brand_create')->name('admin.brand.create');
       Route::get('/institute/delete/{id}','BrandController@delete')->name('admin.brand.delete');
       Route::post('/adminbrand','BrandController@brand_store')->name('admin.brand.store');
       Route::get('/institute/edit/{id}','BrandController@edit')->name('admin.brand.edit');
       Route::post('/institute/update/{id}','BrandController@update')->name('admin.brand.update');


 // ...... Blog Route  ...... //

      Route::get('/blog','BlogController@index')->name('admin.blog');

      Route::get('/blog_create','BlogController@blog_create')->name('admin.blog.create');
      Route::post('/adminblog','BlogController@blog_store')->name('admin.blog.store');
      Route::get('/blog/edit/{id}','BlogController@edit')->name('admin.blog.edit');
      Route::get('/blog/delete/{id}','BlogController@delete')->name('admin.blog.delete');
      Route::post('/blog/update/{id}','BlogController@update')->name('admin.blog.update');


      Route::get('/blogcomment/details' ,'BlogController@blog_comment_show')->name('blog.comment.show');
      Route::get('/blogcomment/edit/{id}' ,'BlogController@blog_comment_edit')->name('admin.blogcomment.edit');
      Route::post('/blogcomment/update/{id}','BlogController@blog_comment_update')->name('admin.blogcomment.store');


// ...... contact Route  ...... //

      // Route::get('/contact','ContactController@index')->name('admin.contact');
      Route::get('/contact/delete/{id}','ContactController@delete')->name('admin.contact.delete');
      Route::get('/contact/edit/{id}','ContactController@edit')->name('admin.contact.edit');
      Route::post('/contact/update/{id}','ContactController@update')->name('admin.contact.update');
      Route::get('/contacts','ContactController@index')->name('admin.contacts');

      Route::get('/aboutsite/delete/{id}','ContactController@aboutsite_delete')->name('admin.aboutsite.delete');
      Route::get('/aboutsite/edit/{id}','ContactController@aboutsite_edit')->name('admin.aboutsite.edit');
      Route::post('/aboutsite/update/{id}','ContactController@aboutsite_update')->name('admin.aboutsite.update');
      Route::get('/aboutsite','ContactController@aboutsite_index')->name('admin.aboutsite');


      // ...... policy Route  ...... //
      Route::get('/policy/edit/{id}','ContactController@policy_edit')->name('admin.policy.edit');
      Route::post('/policy/update/{id}','ContactController@policy_update')->name('admin.policy.update');
      Route::get('/policy','ContactController@policy_index')->name('admin.policy');

// ...... delivery Route  ...... //
      Route::get('/delivery/edit/{id}','ContactController@delivery_edit')->name('admin.delivery.edit');
      Route::post('/delivery/update/{id}','ContactController@delivery_update')->name('admin.delivery.update');
      Route::get('/delivery','ContactController@delivery_index')->name('admin.delivery');


// ...... contact Route  ...... //

      // Route::get('/contact','ContactController@index')->name('admin.contact');

      Route::get('/comments','ContactController@index_comment')->name('admin.index_comment');
      Route::get('/comment/edit/{id}','ContactController@edit_comment')->name('admin.comment.edit');
      Route::post('/comment/update/{id}','ContactController@comment_update')->name('admin.comment.update');


    // ...... Order Route  ...... //

      Route::get('ads/manage_order','OrderController@ad_manage_order')->name('backend.pages.ads.order.index');
      Route::get('ads/order/view/{id}','OrderController@ads_view')->name('admin.ads.order.view');
      Route::post('ads/order/paid_done/update/{id}','OrderController@ad_paid_update')->name('ads.order.update');
      Route::get('/manage_order','OrderController@manage_order')->name('backend.pages.order.index');
      Route::get('/order/view/{id}','OrderController@view')->name('admin.order.view');
      Route::post('/order/update/{id}','OrderController@update')->name('admin.order.seen');
      Route::post('/order/complete/update/{id}','OrderController@complete_update')->name('complete.order.seen');
      Route::post('/order/order_done/update/{id}','CheckoutController@order_update')->name('complete.order.out');
      Route::post('/order/paid_done/update/{id}','OrderController@paid_update')->name('paid.order.update');
      Route::post('/order/invoice/update/{id}','OrderController@invoice_update')->name('order.invoice.update');

      Route::get('/order/delete/{id}','OrderController@delete')->name('admin.order.delete');


      Route::get('/report/export/dailydata','OrderController@dailydatas')->name('export.report.dailydata');
      Route::get('/report/export/monthdata','OrderController@monthdatas')->name('export.report.monthdata');
      Route::get('/report/export/yeardata','OrderController@yeardatas')->name('export.report.yeardata');



        // ..... Image .... //

       Route::get('/products/image' ,'ImageController@image_create')->name('image.show');
       Route::post('/bannerimage','ImageController@image_store')->name('admin.image.store');
       Route::get('/products/image/manage' ,'ImageController@manage_image')->name('image.manage');
       Route::get('/image/edit/{id}','ImageController@edit')->name('admin.image.edit');
       Route::get('/image/delete/{id}','ImageController@delete')->name('admin.slider.delete');
       Route::post('/image/update/{id}','ImageController@update')->name('admin.image.update');


       Route::get('/products/image2' ,'ImageController@image_create2')->name('image2.show');
       Route::post('/bannerimage2','ImageController@image_store2')->name('admin.image2.store');
       Route::get('/products/image2/manage' ,'ImageController@manage_image2')->name('image2.manage');
       Route::get('/image2/edit/{id}','ImageController@edit2')->name('admin.image2.edit');
       Route::post('/image2/update/{id}','ImageController@update2')->name('admin.image2.update');


       Route::get('/products/image3/manage' ,'ImageController@manage_image3')->name('image3.manage');
       Route::get('/image3/edit/{id}','ImageController@edit3')->name('admin.image3.edit');
       Route::post('/image3/update/{id}','ImageController@update3')->name('admin.image3.update');


       Route::get('/products/image4' ,'ImageController@image_create4')->name('image4.show');
       Route::post('/bannerimage4','ImageController@image_store4')->name('admin.image4.store');
       Route::get('/products/image4/manage' ,'ImageController@manage_image4')->name('image4.manage');
       Route::get('/image4/edit/{id}','ImageController@edit4')->name('admin.image4.edit');
       Route::post('/image4/update/{id}','ImageController@update4')->name('admin.image4.update');




             // ...... sales data Route  ...... //

      Route::post('/data','OrderController@insert')->name('test.create');
      Route::get('/sales_data','OrderController@show')->name('test.show');
      Route::get('/sales_data/{invoice_id}','OrderController@view_sales')->name('admin.sales_data.view');

      Route::post('/is_sales/paid/update/{sales_id}','OrderController@sales_is_paid')->name('is_sales.paid.update');

      Route::get('/pick/edit/{sales_id}','OrderController@pick')->name('admin.pick.view');
      Route::post('/shipping/store','OrderController@shipping_store')->name('admin.shipping.store');
      Route::post('/is_sales/shipped/update/{sales_id}','OrderController@sales_is_shipped')->name('is_sales.shipped.update');
      Route::post('/is_sales/paid/updates/{sales_id}','OrderController@sales_is_paids')->name('is_sales.paid.updates');


           //........ inventory data ........ //

     Route::get('/inventory/support','AdminPagesController@inventory_support_with_date')->name('backend.pages.inventory_support_with_date');
     Route::get('/inventory/support/category/{date}','AdminPagesController@inventory_support_with_category')->name('backend.pages.inventory_support_with_category');
     Route::get('/inventory/support/product/{id}/{date}','AdminPagesController@inventory_support_with_product')->name('backend.pages.inventory_support_with_product');
     Route::get('/report/export/category/data/{id}/{date}','AdminPagesController@category_data')->name('export.report.category_data');




     //........ vendor send product data ........ //

     Route::get('vendor/custom/support','AdminPagesController@vendor_support_product')->name('backend.pages.vendor_support_product');
     Route::get('vendor/custom/support/{id}','AdminPagesController@vendor_wise_product')->name('backend.pages.vendor_wise_product');
     Route::get('/report/export/product/data/{id}','AdminPagesController@vendor_wise_product_data')->name('export.report.vendor_wise_product_data');

     //seo ........................ //
     Route::get('seo','AdminPagesController@seoSystem')->name('backend.pages.seoSystem');
     Route::get('seo/{id}','AdminPagesController@seoSystemId')->name('backend.pages.seoSystemId');
     Route::post('seo/post/{id}','AdminPagesController@seoSystemIdPost')->name('backend.pages.seoSystemIdPost');


          });


Route::group(['prefix' => 'vendor'] , function(){

Route::get('/vendorindex','VendorController@index')->name('member.vendor.index');
Route::get('/vendorindex','VendorController@order_count_vendor_p');

Route::get('/vendor/store/create','VendorController@vendor_info_create')->name('vendor.info.create');
Route::get('/vendor/store','VendorController@vendor_info_store')->name('vendor.info.store');
Route::get('/product/create','VendorController@product_create')->name('vendor.pages.product.create');
Route::get('/manage_products','VendorController@manage_products')->name('vendor.pages.product.index');
Route::post('/product_store','VendorController@product_store')->name('vendor.product.store');
Route::get('/product/edit/{id}','VendorController@product_edit')->name('vendor.pages.product.edit');
Route::post('/product/update/{id}','VendorController@product_update')->name('vendor.pages.product.update');
Route::get('/product/delete/{id}','VendorController@product_delete')->name('vendor.pages.product.delete');



// multiple image

        Route::get('/product/show/{id}','VendorController@show_image')->name('vendor.pages.product.show_image');
        Route::get('/product/imageedit/{id}','VendorController@edit_image')->name('vendor.pages.productimage.edit');
        Route::post('/product/imageupdate/{id}','VendorController@update_image')->name('vendor.pages.productimage.update');
        Route::get('/product/imagedelete/{id}','VendorController@productimage_delete')->name('vendor.pages.productimage.delete');



Route::get('/Category','VendorController@category_index')->name('vendor.pages.Category.index');
Route::get('/category/create','VendorController@category_create')->name('vendor.pages.category.create');
Route::post('/category_store','VendorController@category_store')->name('vendor.admin.category.store');
Route::get('/category/delete/{id}','VendorController@category_delete')->name('vendor.pages.category.delete');
Route::get('/Category/edit/{id}','VendorController@category_edit')->name('vendor.pages.category.edit.delete');
Route::post('/Category/update/{id}','VendorController@category_update')->name('vendor.pages.category.update');

Route::get('/manage_order','VendorController@manage_order')->name('vendor.pages.order.index');
Route::get('/order/view/{id}','VendorController@view')->name('vendor.order.view');
Route::get('/sales/data/show','VendorController@sales_show')->name('vendor.pages.sales.index');
Route::get('/sales_data/{invoice_id}','VendorController@view_sales')->name('vendor.sales_data.view');
Route::post('/order/invoice/update/{id}','VendorController@invoice_update')->name('order.invoice.update.vendor');

  Route::post('/order/paid_done/update/{id}','VendorController@paid_update')->name('paid.order.update.vendor');

  Route::post('/order/order_done/update/{id}','VendorController@order_update')->name('complete.order.out.vendor');


  Route::get('/manage_products_sell','VendorController@manage_products_sell')->name('vendor.pages.product.manage_products_sell');

  Route::get('/product_sell/edit/{id}','VendorController@product_edit_sell')->name('vendor.pages.product.edit_sell');
  Route::post('/product_sell/update/{id}','VendorController@product_update_sell')->name('vendor.pages.product.update_sell');
  Route::get('/pick/edit/{sales_id}','VendorController@pick')->name('vendor.pick.view');


Route::post('/data','VendorController@insert')->name('test.create.vendor');



      Route::get('/report/export/dailydata','VendorController@dailydatas')->name('export.report.dailydatas');
      Route::get('/report/export/monthdata','VendorController@monthdatas')->name('export.report.monthdatas');
      Route::get('/report/export/yeardata','VendorController@yeardatas')->name('export.report.yeardatas');



Route::get('/test','VendorController@test');

       });
