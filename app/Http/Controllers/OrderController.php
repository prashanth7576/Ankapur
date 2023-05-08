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
      
      //  $sum = Order::all();
      
      $data = Customer::find($id);
      $items = Product::find($id);

      $product = Product::all();

      $carts = Menu::find($id);

      $value = Customer::find($id);

      $prod = Menu::find($id);

    

     $user = DB::table('carts')->where('customerid', $value->customerid)->get();

   //  $orders = DB::table('products')->where('productid', $prod->productid)->get();

     $reports = DB::table('orders')->where('customerid', $value->customerid)->get();

    // return $tax = Order::where('customerid', $value->customerid)->select(DB::raw('sum(totalprice*2.5) as total'))->get();

      $datareports = DB::table('customers')->where('customerid', $value->customerid)->get();
     $list = DB::table('carts')->where('customerid', $value->customerid)->count();



     $report = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('price'));

     $totalquantity = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('quantity'));

     $total = DB::table('orders')->where('mobile', $value->mobile)->where('orderdate', Carbon::now()->format('Y-m-d'))->where('ordertime', Carbon::now()->format('H:i:m'))->sum(DB::raw('totalprice'));

   //  return $sum = DB::table('orders')->with('customername')->get();

// return $sum = DB::table('orders')->where('status', 'preparing')->select(DB::raw('customerid as customer'))->groupBy('customer')->get();

  // ray()->models($sum);
 //return  $users = DB::table('orders')->distinct()->groupBy('customername')->orderBy('id', 'desc')->get();


 // return $deposit = DB::select('SELECT * FROM orders WHERE orderid IN   (SELECT orderid FROM orders where (status = "preparing") GROUP BY orderid )');

//  $ord = DB::table('orders')->selectRaw('orderid, productid, totalprice')->groupBy('orderid')->get();

      return view('order', compact('data', 'items', 'id', 'product', 'value', 'user', 'report', 'totalquantity','carts', 'list', 'total', 'reports', 'datareports'));
      
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
  
}
