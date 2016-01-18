<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.




*/
//Admin
Route::get("admin/login","Admin\LoginAdminController@index");
Route::post("admin/login","Admin\LoginAdminController@login");
Route::get("admin/logout","Admin\LoginAdminController@logout");
Route::group(["middleware"=>'checklogin','prefix'=>'admin'],function(){
    Route::get("/","Admin\IndexController@index");
    Route::get("website/menu","Admin\WebsiteController@menu");
    Route::get("website/menu/add","Admin\WebsiteController@addmenu");
    Route::post("website/menu/add","Admin\WebsiteController@savemenu");
    Route::get("website/menu/edit","Admin\WebsiteController@editmenu");
    Route::post("website/menu/edit","Admin\WebsiteController@saveeditmenu");
    Route::post("website/menu/delete","Admin\WebsiteController@deletemenu");


    Route::get("category","Admin\CategoryAdminController@index");
    Route::get("category/add","Admin\CategoryAdminController@add");
    Route::post("category/add","Admin\CategoryAdminController@save");
    Route::get("category/edit","Admin\CategoryAdminController@edit");
    Route::post("category/edit","Admin\CategoryAdminController@saveedit");
    Route::post("category/delete","Admin\CategoryAdminController@delete");

    Route::get("tab","Admin\TabController@index");
    Route::get("tab/add","Admin\TabController@add");
    Route::post("tab/add","Admin\TabController@save");
    Route::get("tab/edit","Admin\TabController@edit");
    Route::post("tab/edit","Admin\TabController@saveedit");
    Route::post("tab/delete","Admin\TabController@delete");

    Route::get("product","Admin\ProductController@index");
    Route::get("product/add","Admin\ProductController@add");
    Route::post("product/add","Admin\ProductController@save");
    Route::get("product/edit","Admin\ProductController@edit");
    Route::post("product/edit","Admin\ProductController@saveedit");


    Route::post("ajax/loadfolder",function(){
    $path=public_path()."\\image\\";
                switch ($_POST['folder']) {
                    case 'folderupload':
                    $path.="upload";
                    break;
                    case 'foldersanpham':
                    $path.="product";
                    break;
                    
                    case 'foldernews':
                    $path.="news";
                    break;
                   
                    case 'folderslide':
                    $path.="slide";
                    break;
                  
                    
                    default:
                    return -1;
                    break;
                }

                $dir=scandir($path);

                unset($dir[0]);
                unset($dir[1]);


                $arr=array();
                

                foreach ($dir as $key) {
                    $time=filemtime($path."/".$key);
                    $size=filesize($path."/".$key);
                    list($width,$height)=getimagesize($path."/".$key);
                    array_push($arr, array("name"=>$key,"time"=>$time,"size"=>$size,"width"=>$width,"height"=>$height));
                }

                $leng=count($arr);

                for($i=0;$i<$leng;$i++){
                    for($j=$i+1;$j<$leng;$j++){
                        if($arr[$i]["time"]<$arr[$j]["time"]){
                            $temp=$arr[$i];
                            $arr[$i]=$arr[$j];
                            $arr[$j]=$temp;
                        }
                    }
                }

                foreach ($arr as &$value) {
                    $value['time']=date("d/m/Y H:i",$value['time']);
                }

                return json_encode($arr);
});
//Admin//






});

    Route::post("product/detail","Admin\ProductController@detail");
    Route::get("uploadimage","Admin\UploadController@upload");
    Route::post("uploadimage","Admin\UploadController@upload");
    Route::post("ajax/loadfolder","Admin\UploadController@loadfolder");
    Route::post("upload/checkfile","Admin\UploadController@checkfile");
    Route::post("ajax/removeimg","Admin\UploadController@removeimg");

/////////////////////////////////////////////////////////view
Route::get('/',"ViewController@index");
Route::get('shop-gird.html', function () {
    return view('shop-gird');
});



Route::get('products/{id}/{name}.html','ViewController@productDetail');
Route::get("tin-tuc/{id}/{name}.html",'ViewController@detailnews');
Route::get("tin-tuc",'ViewController@news');
Route::get("san-pham/gird/{category}",'ViewController@productsgird');
Route::get("san-pham/list/{category}",'ViewController@productslist');
Route::post("add-cart","ViewController@addcart");
Route::post("delete-cart","ViewController@deletecart");
Route::get("tim-kiem","ViewController@search"); ///tìm kiếm sản phẩm
Route::get("danh-muc/{category}","ViewController@category");
Route::get("tag/{tag}","ViewController@tag");
Route::get("signout","ViewController@signout");


Route::get('cart.html',"ViewController@cart");

Route::get('checkout-signin.html',"ViewController@checksignin");

Route::get('checkout-address.html',"ViewController@checkaddress");

Route::get("dat-hang-thanh-cong.html","ViewController@orderSuccess");
Route::get('checkout-shipping.html',"ViewController@checkoutshipping");

Route::get('checkout.html',"ViewController@payment");
Route::get("contact-us.html","ViewController@contact");
Route::get('my-account.html',"ViewController@myacount");
Route::get('registration.html','ViewController@registration');
Route::post("changepass","UserController@updatePass");
Route::post("order","ViewController@order");
Route::get("order","ViewController@orderget");
Route::get("info-account.html","ViewController@infoaccount");
Route::get("info-order.html","ViewController@infoorder");
Route::get('wishlist.html',"ViewController@wishlist");
Route::get('wishlist',"ViewController@postwishlist");
Route::post('deletewishlist',"ViewController@deletewishlist");
Route::post('signinCreate',"UserController@login");
Route::post('AccountCreate',"UserController@register");
Route::post("AccountUpdate","UserController@updateUser");
Route::get("upload",function(){
    return view("upload");
});
Route::get("{menu}","ViewController@getMenu");
Route::get("{menu1}/{menu2}","ViewController@getMenuSecond");
Route::get("{menu1}/{menu2}/{menu3}","ViewController@getMenuThree");

Route::get('about-us.html', function () {
    return view('about-us');
});
Route::get('my-cart-step-2-info.html', function () {
    return view('my-cart-step-2-info');
});
Route::get("test","ViewController@test");
/*Route::get("test1",function(){
    return Session::get("name_test");
});*/
