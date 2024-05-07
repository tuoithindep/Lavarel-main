<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function update(Customer $customer){
        // dd($customer->is_paid);
        if($customer->is_paid == 0){
            $customer->is_paid = 1;
        }else{
            $customer->is_paid = 0;
        }
        $customer->save();
        return redirect()->back();
    }

    public function report(){
        $total_price_sale = Cart::selectRaw('pty*price as total')->get();
        $carts = Cart::with('product:id,price')->get();
        $price = 0;
        foreach($carts as $cart){
            $price += $cart->product->price*$cart->pty;
        }
        $price_get = 0;
        $customers = Customer::where('is_paid','1')->with('carts')->get();
        foreach($customers as $customer){
            foreach($customer->carts as $cart){
                $price_get += $cart->pty * $cart->price;
            }
        }


        return view('admin.carts.report',[
            'title'=> 'Thống kê',
            'total_price'=> $price,
            'total_price_sale' => $total_price_sale->sum('total'),
            'total_price_get' => $price_get,
            'total_bill_paid' => $customers->sum('is_paid')
        ]);
    }
}
