<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Carrier;
use App\Payment;
use App\Customer;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Hash;


class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idcart)
    {
        session(['url' => url()->current()]);
        $cart = Cart::content();
        $carriers = Carrier::all();
        $payments = Payment::all();
        $idcart = $idcart;
        return view('order',compact('cart','carriers','payments','idcart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function logoutcustomer()
    {
        session()->forget('customer');
        session()->forget('customer_id');

        return redirect()->back()->with(['success' => 'Login to continue order!']);
    }


    public function logincustomer(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        /*echo "string ".$request->password." hash ".Hash::check($request->password, $customer->password);
        print_r($customer);*/
         
        if(!empty($customer) && $customer!=NULL && Hash::check($request->password, $customer->password)){
            session(['customer_id' => $customer->id]);
            session(['customer_add' => $customer->delivery_address]);
            session(['customer' => $customer]);
 
            return redirect()->back()->with(['success' => 'Authentication success!']);
        }else{
            
            return redirect()->back()->with(['error' => 'User doesn\'t existe!']);
        }
    }

    public function savecustomer(Request $request)
    {
        $cart = Cart::content();

        $cust = Customer::where('email', $request->email)->first();
         

        if(!empty($cust) && $cust!=NULL){

            return redirect()->back()->with(['error' => 'Email already existe!']);

        }else{
            $customer = new Customer;

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->tel = $request->tel;
            $customer->password = bcrypt($request->password);
            $customer->delivery_address = $request->address;
            $customer->save();

            /*Session::set('customer_id', $customer->id);
            Session::set('customer_add', $customer->delivery_address);*/

            session(['customer_id' => $customer->id]);
            session(['customer_add' => $customer->delivery_address]);
            session(['customer' => $customer]);


            //Auth::loginUsingId($customer->id);

            return redirect()->back()->with(['success' => 'Client added successfully!']);
        }
    }

    public function savecarrier(Request $request)
    {
        //Session::set('carrier_id', $request->carrier);
        session(['carrier_id' => $request->carrier]);

         /*$id = session()->get('customer_id');

         echo "string ".$id;
         die("here id");*/

        /*$cart = Cart::content();

        print_r($cart);
        die("cart die");*/

    }

    public function savepayment(Request $request)
    {
        //Session::set('payment_id', $request->payment);
        session(['payment_id' => $request->payment]);
    }


    public function saveorder($idcart)
    {
        $cart = Cart::content();

        $order = new Order;


        $order->reference = substr(md5(microtime()),rand(0,26),5);
        $order->current_state = 'waiting for payment';
        $order->paid_ht = Cart::subtotal();
        $order->paid_ttc = Cart::total();
        $order->taxe = Cart::tax();
        $order->delivery_address = session()->get('customer_add');
        $order->idcart = $idcart;
        $order->id_carrier = session()->get('carrier_id');
        $order->id_customer = session()->get('customer_id');
        $order->id_payment = session()->get('payment_id');
        $order->save();
        
        $custname = Customer::where('id', $order->id_customer)->first();
        $pay = Payment::where('id', $order->id_payment)->first()->type;
        $carrier = Carrier::where('id', $order->id_carrier)->first();

        $comment = '<p>Bonjour, '.$custname->name.'.</p>'.
        '<p>La commande '.$order->reference.' en attente de '.$pay.'</p>
        <table>
            <tr>
                <td>Produit</td>
                <td>Qte</td>
                <td>Prix</td>
            </tr>';
        
        foreach ($cart as $ele) {
            $comment = $comment.'
            <tr>
                <td>'.$ele->name.'</td>
                <td>'.$ele->qty.'</td>
                <td>'.$ele->price * $ele->qty.'</td>
            </tr>';
        } 

        $comment = $comment.'</table><p>Livraison : '.$carrier->name.'</p><p>Prix livraison : '.$carrier->price.'</p><p>Total TTC: '.$order->paid_ttc.'</p>';

        
        $toEmail = $custname->email;
        Mail::to($toEmail)->send(new FeedbackMail($comment));

        Cart::destroy();
       
        //return 'Email has been sent to '. $toEmail;
        
        //return redirect('orderconfirm')->with(['orderref' => $order->reference, 'title' => 'Welcome', 'description' => '', 'page' => 'home']); 
        
        //return view('orderconfirm', array('order' => $order, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
     
    }

}
