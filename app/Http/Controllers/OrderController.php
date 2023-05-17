<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Customer;
use App\Models\Kitchen;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reports;
use App\Models\Statu;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index(){

     

     
return view('cart');
    }

    public function store(Request $request){

      $orderid = Helper::IDGenerator(new Order(), 'orderid', 4, 'ORD');


      
      // $orderdate = Carbon::now()->format('Y-m-d');
      // $ordertime = Carbon::now()->format('H:i:m');


      //   $order = new Order();
      //   $order->orderid = $orderid;
      //   $order->customerid = $request->customerid;
      //   // $order->productid = $request->productid;
      //   $order->customername = $request->customername;
      //   $order->mobile = $request->mobile;
      //   $order->quantity = $request->quantity;
      //   $order->price = $request->price;
      //   $order->ordertime = $ordertime;
      //   $order->orderdate = $orderdate;
       
      //   $order->save();


         $date = Carbon::now()->format('Y-m-d');
          $time = Carbon::now()->format('H:i:m');


        $productid = $request->productid;
        $customerid = $request->customerid;
        $name = $request->name;
        $mobile = $request->mobilenumber;
        $productname = $request->productname;
        $quantity = $request->itemquantity;
        $productprice = $request->productprice;
        $totalprice = $request->totalprice;

        
        $ordertime = $time;
        $orderdate = $date;
       
      


        for ($i=0; $i < count($productid); $i++){
          $datasave = [
            'customerid' => $customerid,
              'orderid' => $orderid,
              'productid'  => $productid[$i],
              'customername'  => $name[$i],
              'mobile'  => $mobile[$i],
              'productname'  => $productname[$i],
              'quantity'  => $quantity[$i],
              'productprice'  => $productprice[$i],
             'totalprice'  => $totalprice[$i],
              'ordertime'  => $ordertime,
             'orderdate'  => $orderdate,
             
          ];
          DB::table('orders')->insert($datasave);
          
      }


      
      // $reports = new Reports();
      // $reports->customerid = $request->customerid;
      // $reports->orderdate = $request->orderdate;
      // $reports->orderstatus = $request->orderstatus;
      // $reports->restcode = $request->restcode;
      // $reports->mobile = $request->mobile;
      // $reports->customername = $request->customername;
      // $reports->customeraddress = $request->customeraddress;
      // $reports->transactionstatus = $request->transactionstatus;
      // $reports->orderid = $request->orderid;
      // $reports->itemcount = $request->itemcount;
      // $reports->totalprice = $request->price;
      // $reports->deliverycharge = $request->deliverycharge;
      // $reports->CGST = $request->CGST;
      // $reports->SGST = $request->SGST;
      // $reports->cashsale = $request->cashsale;
      // $reports->save();

        return redirect('customers');
    }


    public function orders($id){
            
      $data = Customer::find($id);
      $items = Product::find($id);

      $product = Product::all();

      

      $value = Customer::find($id);

      // $prod = Menu::find($id);

    

     $user = DB::table('carts')->where('customerid', $value->customerid)->get();

   // return $orders = DB::table('products')->where('productid', $carts->productid)->first();

     $reports = DB::table('orders')->where('customerid', $value->customerid)->get();

   
      $datareports = DB::table('customers')->where('customerid', $value->customerid)->get();
     $list = DB::table('carts')->where('customerid', $value->customerid)->count();



     $report = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('price'));

     $totalquantity = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('quantity'));

     $total = DB::table('orders')->where('mobile', $value->mobile)->where('orderdate', Carbon::now()->format('Y-m-d'))->where('ordertime', Carbon::now()->format('H:i:m'))->sum(DB::raw('totalprice'));

     $cart = Menu::find($id);
         // $order = DB::table('products')->whereIn('productid', '=', $cart->productid)->get();

          $order = DB::select('SELECT * FROM products WHERE productid IN (SELECT productid FROM carts)');

      return view('order', compact('data', 'items', 'id', 'product', 'value', 'user', 'report', 'totalquantity', 'list', 'total', 'reports', 'datareports', 'cart', 'order'));
      
    }

    public function list(){
      $data = Order::orderBy("ordertime", "asc")->get();;

      return view('orders.index', compact('data'));
    }

    public function status($id){


          $orders = Order::find($id);
          $orders->status = 'completed';
          $orders->save();
          return redirect()->back()->with('success', 'Item completed successfully');
        }

        public function destroy($id){

          $order = Menu::findOrFail($id);
          $order->delete();

          return back();
        }

        public function updateQuantity(Request $request)
        {
            $quant = Menu::find($request->cart_id); 
            $quant->quantity = $request->quantity;
            $quant->save();
            return response()->json('message', 'Quantity changed!');
        }
  
}
