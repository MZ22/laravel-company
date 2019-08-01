<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Cart_product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
 

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		//update/ add new item to cart 
		/*$method = $request->method();
		
		if ($request->isMethod('post') && $request->get('product_id')) {
			$product_id = $request->get('product_id');
			$product = Product::where('idprod', $product_id)->first();
			Cart::add(array('id' => $product_id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price));
			
			$cart = Cart::content();
			
			/*$pid = $request->get('product_id');
			
			$rowId = Cart::content()->where('id', $pid)->first()->rowId;*/
			
			/*echo "<pre>";
			print_r($cart);
			die('fdfdfdfdf'); 
			echo "</pre>"; */
			
			/*return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
		}else{
			$cart = Cart::content();
			return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
		}*/
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
 
			/*$cart = Cart::create(
				[
				 'gift' => $request->gift,
				 'reduction' => $request->reduction,
				]
			);
			$cart_prod = Cart_product::create(
				[
				 'idcart' => $cart->id,
				 'idprod' => $request->reduction,
				 'qty' => $request->quantity,
				]
			);
			return redirect('/order/'.$cart->id); */
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
	

	public function clearcart()
    {
    	Cart::destroy();
    	
    	return redirect()->back();
    }
	
	public function cartadd($id) {
		//update/ add new item to cart 
		$product = Product::where('idprod', $id)->first();

        if(!$product) {
            abort(404);
        }

		Cart::add(array('id' => $id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price));
		
		$cart = Cart::content();
		
		//return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
		return redirect()->back()->with(['success' => 'Product added to cart successfully!']);
	} 
	
	public function cart()
    {
		$cart = Cart::content();
		if($cart) {
			return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
		}else{
			abort(404);
		}
    }
	
	
	public function cartupdate(Request $request) {
		
		//increment the quantity
		if ($request->get('product_id') && ($request->get('increment')) == 1) {
			/*$rowId = Cart::search(array('id' => $request->get('product_id')));*/
			
			$pid = $request->get('product_id');
			
			$rowId = Cart::content()->where('id', $pid)->first()->rowId;
	 
			/*Cart::search(function($cartItem, rowId) {
				return $cartItem->id === $pid; 
			});*/
			
			$item = Cart::get($rowId);

			Cart::update($rowId, $item->qty + 1);
		}

		//decrease the quantity
		if ($request->get('product_id') && ($request->get('decrease')) == 1) {
			$pid = $request->get('product_id');
			
			$rowId = Cart::content()->where('id', $pid)->first()->rowId;
			
			$item = Cart::get($rowId);
			if($item->qty>1){
				Cart::update($rowId, $item->qty - 1);
			}
		}
		
		echo "before delete ".$request->get('product_id')." delete ".$request->get('delete');

		if ($request->get('product_id') && ($request->get('delete')) == 1) {
			$pid = $request->get('product_id');
			
			$rowId = Cart::content()->where('id', $pid)->first()->rowId;
			echo "string ".$rowId;
			 
			Cart::remove($rowId);
		}

		$cart = Cart::content();

		return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
	}
	
	public function savecart(Request $request)
    {
		$cart = Cart::content();
		
		$carts = new Carts;
		
		if($request->gift){
			$carts->gift = $request->gift;
		}else{
			$carts->gift = 0;
		}
		
		$carts->reduction = $request->reduction;
		$carts->save();
		
		
		foreach($cart as $item){
			$cartprod = new Cart_product;
			$cartprod->idcart = $carts->id;
			$cartprod->idprod = $item->id;
			$cartprod->qty = $request->quantity;
			$cartprod->save();			
		}
		
		//Cart::destroy();
		 
		return redirect('order/'.$carts->id); 

		//return redirect('order')->with('cartid', $carts->id);

		
		//return view('order', array('cartid' => $carts->id, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
	 
    }
}
