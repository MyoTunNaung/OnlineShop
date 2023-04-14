<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Item;

use App\Models\Order;
use App\Models\OrderItem;

use App\Models\Payment;

use App\Cart;
use Session;

class ProductController extends Controller
{
    public function listProduct()
    {
    	$categories = Category::all();
    	$items = Item::all();
    	$products = Product::all();

    	return view('product.list-product', [
    										'categories' => $categories,
    										'items' => $items,
    										'products' => $products
    		   						  ]);
    }

    public function createProduct(Request $request)
    {
    	$validator = validator( request()->all(),
    	[
    		"category_id" 		=> "required",
    		"item_id" 			=> "required",
    		"name_eng"  		=> "required",
    		"name_unicode"  	=> "required",
    		"price"  			=> "required",
    		"qty"  				=> "required",
    		
    	]);

		if($validator->fails())
		{
			return back()->with('info',"Please enter Data !");
		}

		$product 					= new Product();

		$product->category_id 		= request()->category_id;
		$product->item_id 			= request()->item_id;
		$product->name_eng 			= request()->name_eng;
		$product->name_unicode 		= request()->name_unicode;
		$product->price 			= request()->price;
		$product->qty 				= request()->qty;


		if($request->hasfile('photo1'))
		{
			$file   = $request->file('photo1');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo1=$name;

		}
		else
		{
			$product->photo1='';
		}

		if($request->hasfile('photo2'))
		{
			$file   = $request->file('photo2');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo2=$name;

		}
		else
		{
			$product->photo2='';
		}

		if($request->hasfile('photo3'))
		{
			$file   = $request->file('photo3');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo3=$name;

		}
		else
		{
			$product->photo3='';
		}

		if($request->hasfile('photo4'))
		{
			$file   = $request->file('photo4');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo4=$name;

		}
		else
		{
			$product->photo4='';
		}




		$product->remark =request()->remark;
		$product->save();

		return redirect('/admin/product/list');
    }

    public function deleteProduct()
    {
    	Product::find(request()->id)->delete();
    	return redirect('/admin/product/list');
    }

    public function updProduct()
    {
    	$categories = Category::all();
    	$items 		= Item::all();
    	$product 	= Product::find(request()->id);

    	return view('product.upd-product',  [
    											'categories' => $categories,
    											'items' => $items,
    											'product' => $product
    										]);

    }

    public function updateProduct(Request $request)
    {
    	$validator = validator( request()->all(),
    	[
    		"category_id" 		=> "required",
    		"item_id" 			=> "required",
    		"name_eng"  		=>"required",
    		"name_unicode"  	=>"required",
    		"price"  			=> "required",
    		"qty"  				=> "required",
    	]);

		if($validator->fails())
		{
			return back()->with('info',"Please enter Data !");
		}

		$product 					= Product::find(request()->id);

		$product->category_id 		= request()->category_id;
		$product->item_id 			= request()->item_id;
		$product->name_eng 			= request()->name_eng;
		$product->name_unicode 		= request()->name_unicode;
		$product->price 			= request()->price;
		$product->qty 				= request()->qty;

		if($request->hasfile('photo1'))
		{
			$file   = $request->file('photo1');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo1=$name;

		}

		if($request->hasfile('photo2'))
		{
			$file   = $request->file('photo2');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo2=$name;

		}

		if($request->hasfile('photo3'))
		{
			$file   = $request->file('photo3');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo3=$name;

		}

		if($request->hasfile('photo4'))
		{
			$file   = $request->file('photo4');
			$name   = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();

			$file->move('images/',$name);
			$product->photo4=$name;

		}

		$product->remark =request()->remark;
		$product->save();

		return redirect('/admin/product/list');
    }

    public function categoryView()
    {
    	$category_id 	= request()->id;

    	$products 		= Product::where("category_id","=",$category_id)->get();

    	return view('product.view-product',[ 
    											'products' => $products 
    										]);

    }
    public function itemView()
    {
    	$item_id 		= request()->id;

    	$products 		= Product::where("item_id","=",$item_id)->get();

    	return view('product.view-product',[ 
    											'products' => $products 
    										]);
    }

    public function detailView()
    {
    	$product_id 	= request()->id;

    	$product 		= Product::find($product_id);

    	return view('product.detail-product',[ 
    											'product' => $product 
    										]);

    }

    public function getAddToCartQty(Request $request)
    {
    	$id 		= request()->id;
    	$pqty		= request()->pqty;
    	$item 		= Product::find($id);


        $oldCart 	= Session::has('cart') ? Session::get('cart') : null;

        $cart 		= new Cart($oldCart);

        $cart->addQty($item, $id, $pqty);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getCart(Request $request)
    {
    	if(!Session::has('cart'))
        {
            return view('product.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart    = new Cart($oldCart);

        return view('product.shopping-cart',[ 	'products'        => $cart->items, 
						              			'totalPrice'      => $cart->totalPrice,
						              			'totalQty'        => $cart->totalQty,
						            		]);
    }

    public function getAddToCart(Request $request)
    {
    	$id 		= request()->id;
    	
    	$item 		= Product::find($id);

        $oldCart 	= Session::has('cart') ? Session::get('cart') : null;

        $cart 		= new Cart($oldCart);

        $cart->add($item, $id);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getSubToCart(Request $request)
    {
    	$id 		= request()->id;
    	
    	$item 		= Product::find($id);

        $oldCart 	= Session::has('cart') ? Session::get('cart') : null;

        $cart 		= new Cart($oldCart);

        $cart->sub($item, $id);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getRemoveFromCart(Request $request)
    {
        $id         = request()->id;
        
        $item       = Product::find($id);

        $oldCart    = Session::has('cart') ? Session::get('cart') : null;

        $cart       = new Cart($oldCart);

        $cart->remove($item, $id);

        $request->session()->put('cart',$cart);

        $checkcart = $request->session()->get("cart");

        if($checkcart->totalQty == 0)
        {
            return redirect('/product/clearCart');
        }

        return back();
    }

    public function getClearCart(Request $request)
    {
        if(Session::has('cart'))
        {
            $request->session()->forget('cart');

            return redirect("/");
        }
        else
        {
            return redirect("/");
        }
    }

    public function getOrder(Request $request)
    {
        if(!Session::has('cart'))
        {
            return redirect("/");
        }

        $oldCart = Session::get('cart');
        $cart    = new Cart($oldCart);

        $order = new Order();
            
            $order->user_id        = auth()->user()->id;
            $order->totalPrice     = $cart->totalPrice;         
            $order->totalQty       = $cart->totalQty;
            $order->remark         = "";           
         
        $order->save();


        $products = $cart->items;


        foreach ($products as $product)         
        {           
            $orderitem = new OrderItem();

            
                    $orderitem->order_id          = $order->id;
                    $orderitem->user_id           = auth()->user()->id;                 
                    
                    $orderitem->product_id        = $product['item']['id'];
                    $orderitem->name              = $product['item']['name_eng'];
                    $orderitem->price             = $product['item']['price'];
                    $orderitem->qty               = $product['qty'];               
                    $orderitem->amount            = $product['item']['price'] * $product['qty']; 
                    $orderitem->remark            = "";                   
                 
            $orderitem->save();

        }

        $order      = Order::find($order->id);
        $orderitems = OrderItem::where('order_id','=',$order->id)->get();

        if(Session::has('cart'))
        {
            $request->session()->forget('cart');
        }

        return view('boucher',[           
                                'order'         => $order, 
                                'orderitems'    => $orderitems                              
                            ]);
    }

     public function getPayment(Request $request)
    {

        $order_id       = request()->order_id;
       
        $payment_amount = Order::where("id","=","$order_id")->value("totalPrice");

        return view('payment',[
                                'order_id' => $order_id,
                                'payment_amount' => $payment_amount
                            ]);
    }

    public function createPayment(Request $request)
    {
        $order_id           = request()->order_id;
        $amount             = request()->payment_amount;
        $phone              = request()->phone;
        $transaction        = request()->transaction;

        $payment = new Payment();

            $payment->order_id      = $order_id;
            $payment->amount        = $amount;
            $payment->phone         = $phone;
            $payment->transaction   = $transaction;

        $payment->save();

        return redirect("/")->with('info',"အားပေးမှုကို ကျေးဇူးတင်ပါသည်");

    }

    public function searchProduct(Request $request)
    {
        $search     = request()->search;
        $lang       = request()->lang;

        $namecol = "name_".$lang;
               
        $products = Product::where([
                                    ["$namecol","LIKE","%{$search}%"],
                                  ])->get();

        return view('product.search-product',['products' => $products ]);
    }

    public function getItems(Request $request)
    {
        $category_id    = request()->category_id;

        $items          = Item::where([
                                        ["category_id","=","$category_id"],
                                    ])->get();

        return response()->json($items);
    }


}
