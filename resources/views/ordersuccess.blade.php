@extends("masterpage")
@section("miss")
<style type="text/css">
   
    .bread-crumb-trail {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        white-space: nowrap;
    }
    .clearfix {
        clear: both;
    }
    .breadcrumb {
        padding: 15px 0 5px 0;
        list-style: none;
    }
    .breadcrumb li {
        display: inline-block;
        float: left;
        padding-right: 10px;
    }
    .breadcrumb li.active {
        color: #999;
    }
    .breadcrumb li + li::before {
        content: "› ";
        color: rgb(31, 38, 31);
        font-size: 13px;
    }
    .breadcrumb li a {
        color: #1f261f;
    }
    .cart-detail {
        display: block;
        width: 100%;
        font-size: 14px;
    }
    .pcol-0 {
        width: 100%;
        display: block;
    }
    .box-cart {
        display: block;
        width: 100%;
    }
    .box-cart .box-cart-content {
        display: block;
        padding: 9px 0;
        background: #fff;
        padding-top: 15px;
    }
    .box-cart .block-full {
        display: block;
        margin-bottom: 5px;
    }
    .cart-detail .order-thanks {
        display: block;
        width: 100%;
    }
    .cart-detail .order-thanks .order-thanks-icon {
        float: left;
    }
    .cart-detail .order-thanks .order-thanks-content {
        display: block;
        margin: 0 auto;
        float: left;
    }
    .cart-detail .order-thanks .success-title {
        font-size: 30px;
        display: block;
        margin: 10px 0 20px 0;
    }
    .cart-detail .order-thanks .order-thanks-content ul {
        display: block;
        margin-left: 20px;
    }
    ul {list-style: none;}
    .cart-detail .order-thanks .order-thanks-content {
        display: block;
        margin: 0 auto;
        float: left;
    }

    .clearfix:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
    }
    .pfull {
        width: 100%;
        display: block;
    }
    .cart-detail .back-link {
        margin: 10px 0 10px 0;
        padding: 15px 0;
        display: block;
        border-top: solid 1px #616161;
        border-bottom: solid 1px #616161;
    }
    .order-steps-hotline {
        display: block;
        margin: 50px 0;
    }
    .loginForm {
        border: 1px solid #e6eae6;
        margin-bottom: 45px;
        padding: 0 20px 20px;
        position: relative;
        display: block;
    }
    .messages {
        display: none;
        margin: 10px 0;
    }
    #groupRegister, .groupRegister {
        background: #f6f6f6;
        border: 1px solid #fafafa;
        
        border-radius: 2px;
        text-align: center;
    }
    .loginForm #formLogin {
        padding-left:10%;
        width: 42%;
        color: #1f261f;
        font-size: 13px;
    }
    .order-steps-hotline .hotline {
    display: block;
    border-bottom: solid 1px #eaeaea;
    text-align: center;
    font-size: 20px;
    padding-bottom: 10px;
}
#formLogin input.submit_btn:hover {
    background: #d10000;
}
#formLogin input.submit_btn {
    color: #fff;
    display: block;
    font-size: 16px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: #b20000;
    border: none;
    text-transform: uppercase;
    width: 200px;
    text-indent: 0;
    cursor: pointer;
}
.loginForm h3 {
    color: #1f261f;
    text-transform: uppercase;
    margin-top: 20px;
    margin-bottom: 10px;
}
#groupRegister, .groupRegister {
    background: #f6f6f6;
    border: 1px solid #fafafa;
    float: left;
    width: 50%;
    border-radius: 2px;
    text-align: center;
    padding: 21px 21px 41px;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.pcontainer {
    width: 84%;
    margin: 0 auto;
}
.footter-order
{
    list-style: none;
}
.footter-order li
{
    float:left;
    padding-left:10px;
}
</style>
<div class="pcontainer">        
    
<div class="bread-crumb-trail clearfix row">
    <ol class="breadcrumb clearfix col-md-12">
        <li><a href="/">Trang chủ</a></li>
        
        <li class="active">
            Hoàn thành đơn hàng</li>
        
    </ol>
</div>

    <div class="pcol-0 cart-detail row">
        
        <div class="pcol-0 col-md-12">
            <div class="box-cart row">
                <div class="box-cart-content col-md-12">
                    <div class="block-full">
                        <div class="order-thanks clearfix row">
                            <div class="order-thanks-icon col-md-5">
                                <img class="img-thumbnail" src="{{Asset('')}}public/image/finishcart_img.jpg" alt="dat hang thanh cong">
                            </div>
                            <div class="order-thanks-content col-md-7">
                                <div class="success-title row">
                                    Đặt hàng thành công!
                                </div>
                                <ul class="row">
                                    <li>Cảm ơn bạn <b>
                                        <?php if(Session::has("login_name")) echo Session::get("login_name"); else{ echo Session::get("name"); Session::forget("name");} ?></b> đã tin tưởng sản phẩm của chúng tôi!</li>
                                    
                                    <li style="color: #ff0000; font-size: 15px"><b>Chúng tôi sẽ liên hệ với bạn trong vòng
                                        24h để hoàn tất đơn hàng</b> </li>
                                    <li>Mọi chi tiết xin vui lòng liên hệ: <span class="order-code">
                                    @foreach($info as $values)
                                    @if($values->name == "phone" && $values->contents!="")
                                        <span style="font-size:15px;font-weight:bold;color:red">{{$values->contents}}</span>
                                     @endif
                                    @endforeach</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pfull clearfix row">
                <div class="loginForm clearfix col-md-12">
                    <h3>
                        Vui lòng đăng ký tài khoản để</h3>
                   
                    <div id="groupRegister" class="box-cart col-md-6">
                        <div class="list-note">
                            <ul style="list-style:inherit;text-align:left">
                                <li>Theo dõi và nhận thông báo về đơn hàng của bạn</li>
                                <li>Nhận mã giảm giá, khuyến mãi cho từng sản phẩm mà bạn quan tâm</li>
                            </ul>
                        </div>
                    </div>
                    <div id="formLogin" class="col-md-6">
                        
                        <a href="{{Asset('')}}registration.html" style="text-decoration:none"><input type="" value="đăng kí" class="submit_btn" id="btnx-reg"></a>
                        <div class="form_loading">
                        </div>
                        <iframe id="if_form_submit_register" name="if_form_submit_register" src="" class="hide" style="display: none;"></iframe>
                    </div>
                </div>
                
            </div>
                <div class="back-link row">
                    <ul style="" class="footter-order col-md-12">
                        <li><a href="/">Về trang chủ</a> </li>
                        <li><a href="san-pham-moi">Sản phẩm mới</a> </li>
                        <li><a href="san-pham-ban-chay">Sản phẩm bán chạy</a> </li>
                    </ul>
                    <div class="clear">
                </div>
            </div>
            
<div class="order-steps-hotline row">
    <div class="hotline col-md-12">
        <label>Hotline hỗ trợ đặt hàng online: </label><span>@foreach($info as $values)
                                    @if($values->name == "phone" && $values->contents!="")
                                        <span style="font-size:25px;font-weight:bold;color:red">{{$values->contents}}</span>
                                     @endif
                                    @endforeach</span>
    </div>
</div>

        </div>
        <div class="clear">
        </div>
    </div>
</div>
    @stop