<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\Slider;
use App\CatePost;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CustomerController extends Controller
{ 
    public function AuthLogin(){
        
        if(Session::get('login_normal')){

            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            } 
        
    }
    public function add_customer(){
        $this->AuthLogin();
    	return view('admin.add_Customer');
    }
    public function all_customer(){
        $this->AuthLogin();
    	//$all_brand_product = DB::table('tbl_brand')->get(); //static huong doi tuong
        // $all_brand_product = Brand::all(); 
        $all_customer = Customer::orderBy('customer_id','DESC')->paginate(6);
    	$manager_customer  = view('admin.all_customer')->with('all_customer',$all_customer);
    	return view('admin_layout')->with('admin.all_customer', $manager_customer);


    }
    public function save_customer(Request $request){
        $this->AuthLogin();
        $data = $request->all();

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_password = $data['customer_password'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->save();
       
    	// $data = array();
    	// $data['brand_name'] = $request->brand_product_name;
        // $data['brand_slug'] = $request->brand_slug;
    	// $data['brand_desc'] = $request->brand_product_desc;
    	// $data['brand_status'] = $request->brand_product_status;
    	// DB::table('tbl_brand')->insert($data);
        
    	Session::put('message','Thêm khách hàng thành công');
    	return Redirect::to('add-customer');
    }
/*    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');

    }*/
    public function edit_customer($customer_id){
        $this->AuthLogin();

        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $edit_customer = Customer::where('customer_id',$customer_id)->get();
        $manager_customer  = view('admin.edit_customer')->with('edit_customer',$edit_customer);

        return view('admin_layout')->with('admin.edit_customer', $manager_customer);
    }
    public function update_customer(Request $request,$customer_id){
        $this->AuthLogin();
        $data = $request->all();
        $customer = Customer::find($customer_id);
        // $brand = new Brand();
        $customer->customer_name = $data['customer_name'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_password = $data['customer_password'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_slug'] = $request->brand_slug;
        // $data['brand_desc'] = $request->brand_product_desc;
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật khách hàng thành công');
        return Redirect::to('all-customer');
    }
    public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('tbl_customers')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('all-customer');
    }


    //End Function Admin Page
}


