@extends('layout')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form action="{{URL::TO('/login-customer')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="name_tk" placeholder="Tên đăng nhập" />
                        <input type="password" name="password_tk" placeholder="Mật khẩu" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ ddawnh nhập
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký tài khoản!</h2>
                    <form action="{{URL::TO('/add-customer')}}" method="post">
                    {{csrf_field()}}
                        <input type="text" name="kh_ten" placeholder="Tên đăng nhập"/>
                        <input type="email" name="kh_email" placeholder="Địa chỉ email"/>
                        <input type="password" name="kh_matkhau" placeholder="Mật khẩu"/>
                        <input type="text" name="kh_sdt" placeholder="Số điện thoại"/>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection	