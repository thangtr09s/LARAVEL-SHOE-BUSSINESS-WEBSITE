@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật khách hàng
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_customer as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-customer/'.$edit_value->customer_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
                                    <input type="text" value="{{$edit_value->customer_name}}"  name="customer_name" class="form-control" id="slug" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$edit_value->customer_email}}" onkeyup="ChangeToSlug();" name="customer_email" class="form-control" id="convert_slug" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật Khẩu</label>
                                    <input type="text" value="{{$edit_value->customer_password}}" name="customer_password" class="form-control" id="convert_slug" >
                                </div>
                                <label for="exampleInputPassword1">Số Điện Thoại</label>
                                <input type="text" value="{{$edit_value->customer_phone}}" name="customer_phone" class="form-control" id="convert_slug" ><br>
                                <button type="submit" name="update_customer" class="btn btn-info">Cập nhật khách hàng</button>
                                </form>
                            </div>
                            @endforeach 

                           
                        </div>
                    </section>

            </div>
@endsection