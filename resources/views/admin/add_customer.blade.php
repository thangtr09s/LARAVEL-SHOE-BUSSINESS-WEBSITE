@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Khách hàng
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-customer')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" name="customer_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail khách hàng</label>
                                    <input type="text" name="customer_email" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="customer_password" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Mật Khẩu">
                                </div>
                                                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Điện Thoại</label>
                                    <input type="text" name="customer_phone" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Số Điện Thoại">
                                </div>

                               
                                <button type="submit" name="add_customer" class="btn btn-info">Thêm khách hàng</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection