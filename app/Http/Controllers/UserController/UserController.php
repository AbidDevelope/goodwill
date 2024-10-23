<?php

namespace App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Categories;
use App\Models\UserAddress;
use App\Models\ProductWear;
use App\Models\SelectAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;


class UserController extends Controller
{
   public function index()
   {
      $cart = session()->get('cart', []);
      $cartItem = count($cart);

          $products = Product::with('productWear')->get();
          $productWears = ProductWear::with('product')->get();
          $categories = Categories::all();

          $electronicsData = Product::where('category_id', 86)->get();

          $combineData = [
            'products' => $products,
            'productWears' => $productWears,
            'electronicsData' => $electronicsData,
          ];

          return view('user.index', compact('combineData', 'categories', 'cartItem'));
     }


     public function registerView()
   {
      return view('user/register');
   }

   public function registration(Request $request)
   {

      $request->validate([
         'name' => 'required',
         'mobile' => 'required',
         'email' => 'required',
         'password' => 'required',
      ]);

       $user = User::create([
          'name' => $request->name,
          'mobile' => $request->mobile,
          'email' => $request->email,
          'password' => Hash::make($request->password),
       ]);
      return Redirect('user/login')->with('message',' You Have Successfully Registered ! Please Login');
   }


   public function loginView()
   {
      return view('user/login');
   }

   public function login(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required',
      ]);

      $user = User::where(['email'=> $request->email])->first();

      if($user)
      {
         if(Auth::guard('user')->attempt(['email'=>$request->email, 'password'=>$request->password])){
          $request->session()->put('id', $user->id);
         }
         return redirect('/');
      }
   }

     public function UserAccount()
     {
         $cart = session()->get('cart', []);
         $cartItem = count($cart);

          return view('user.account', compact('cartItem'));
     }

     public function userLogout()
     {
        Session::flush('id');
        Auth::logout();
        return redirect('/')->with('message', 'You have Successfully logout!');
     }

     public function checkout()
     {
      if(!Auth::guard('user')->check())
      {
         return redirect('user/login');
      }
      else
      {
         $userId = Auth::guard('user')->user()->id;
         $addressGet = UserAddress::where('user_id', $userId)->with('user')->get();

         $cart = session()->get('cart', []);
         $cartItem = count($cart);
         $totalItem = count($cart);

         $totalValue = 0;
         $totalItem = 0;

         foreach($cart as $item)
         {
            $totalValue += $item['selling_price'] * $item['quantity'];
            $totalItem += $item['quantity'];
         }

         return view('user.products.checkoutAddress', compact('addressGet', 'cart', 'totalValue', 'cartItem', 'totalItem'));
      }
   }


     public function checkoutSummary()
     {

      if(Auth::guard('user')->check()){
         $user = Auth::guard('user')->user()->id;
         $address = SelectAddress::where('user_id', $user)->with('user','userAddress')->first();

         $cart = session()->get('cart', []);
         $cartItem = count($cart);
         $totalItem = count($cart);

         $totalValue = 0;
         $totalItem = 0;

         foreach($cart as $item)
         {
            $totalValue += $item['selling_price'] * $item['quantity'];
            $totalItem += $item['quantity'];
         }
         };

      return view('user.products.checkoutSummary', compact('user', 'cart', 'totalValue', 'cartItem', 'totalItem', 'address'));
     }

     public function checkoutSelectAddress(Request $request)
     {
      if(Auth::guard('user')->check())
      {
          $userId = Auth::guard('user')->user()->id;
          $addressId = $request->selectAddress;

         $address = SelectAddress::where('user_id', $userId)->with('userAddress')->first();

         if($address)
         {
            $address->user_id = $userId;
            $address->address_id = $addressId;
            $address->update();
         }

         return redirect('checkout/summary')->with('message', 'Your address is selected');
      }
     }

     public function checkoutCreateAddress(Request $request)
     {
      if(Auth::guard('user')->check())
      {
         $userId = Auth::guard('user')->user()->id;
         $address = SelectAddress::where('user_id', $userId)->with('userAddress')->first();

         $validate = Validator::make($request->all(),[
                'name'=>'required',
                'city'=>'required',
                'area_or_street'=>'required',
                'flat_no_building_name'=>'required',
                'pincode'=>'required',
                'state'=>'required',
                'land_mark'=>'required',
                'mobile'=>'required',
                'optional_mobile'=>'required'
         ]);

         if($validate->fails())
         {
            return redirect()->back()->withErrors($validate)->withInput();
         }

            $addAddress = UserAddress::create([
               'user_id'=>$userId,
               'city'=>$request->city,
               'area_or_street'=>$request->area_or_street,
               'flat_no_building_name'=>$request->flat_no_building_name,
               'pincode'=>$request->pincode,
               'state'=>$request->state,
               'land_mark'=>$request->land_mark,
               'name'=>$request->name,
               'mobile'=>$request->mobile,
               'optional_mobile'=>$request->optional_mobile
            ]);

            if ($address) {
                // If it exists, update the existing record
                $address->user_id = $userId;
                $address->address_id = $addAddress->id;
                $address->save(); // Use save() to update the existing record
            }
            else
            {
               // If it doesn't exist, create a new record
               $data = new SelectAddress;
               $data->user_id = $userId;
               $data->address_id = $addAddress->id;
               $data->save();
            }


         return redirect('checkout/summary')->with('message', 'Your Address is created Successfully.');
      }
   }

     public function createAddress(User $user)
     {
      $cart = session()->get('cart', []);
      $cartItem = count($cart);

      $totalValue = 0;
      $totalItem = 0;

     foreach($cart as $item)
     {
      $totalValue += $item['selling_price'] * $item['quantity'];
      $totalItem = $item['quantity'];
     }

       return view('user.products.checkoutCreateAddress', compact('cartItem', 'totalItem', 'totalValue'));
     }

     public function confirmOrder(Request $request, Product $product)
      {
         if (Auth::guard('user')->check()) {
               $cart = session()->get('cart', []);
               $productIds = [];

            $userId = Auth::guard('user')->user()->id;
            $address = SelectAddress::where('user_id', $userId)->with('userAddress')->first();
            $order = Order::where('user_id', $userId)->get();

            $addressId = $address->address_id;

            if($address)
               {
                  $totalValue = 0;
                  $totalItem = 0;

                  foreach($cart as $item)
                  {
                     $totalValue += $item['selling_price'] * $item['quantity'];
                     $totalItem = $item['quantity'];
                  }
               }

               foreach ($cart as $id => $item) {
                  $productIds[] = $id;
                  $productWearId[] = $item['product_wear_id'];
                  $vendorId[] = $item['vendor_id'];
                  $selling_price[] = $item['selling_price'];
                  $quantity[] = $item['quantity'];
               }

               $validate = Validator::make($request->all(), [
                  'payment_mode' => 'required',
               ]);

               if($validate->fails())
               {
                  return redirect()->back()->withErrors($validate)->withInput();
               }
               else
               {
                  $confirmOrder = new Order;
                  $confirmOrder->user_id = $userId;
                  $confirmOrder->address_id = $addressId;
                  $confirmOrder->payment_mode = $request->payment_mode;
                  $confirmOrder->grand_total = $totalValue;
                  $confirmOrder->save();

                  if ($order) {
                        $orderId = $confirmOrder->id;
                        $orderItems = [];

                        foreach ($productIds as $key => $productId) {

                           $orderItem = new OrderItem([
                              'order_id' => $orderId,
                              'user_id' => $userId,
                              'address_id' => $addressId,
                              'product_wear_id' => $productWearId[$key],
                              'product_id' => $productId,
                              'vendor_id' => $vendorId[$key],
                              'quantity' => $quantity[$key],  // Get quantity for the current product
                              'price' => $selling_price[$key],  // Get price for the current product
                           ]);
                           //dd($orderItem);
                           $orderItems[] = $orderItem;
                        }

                        // Save the order items
                        foreach ($orderItems as $orderItem) {
                           $orderItem->save();
                        }
                  }

                  session()->pull('cart');
               }
            return redirect('/')->with('message', 'Your Orders have been Successfully confirmed.');
         }
      }


   //   public function confirmOrder(Request $request, Product $product)
   //   {
   //    if(Auth::guard('user')->check())
   //    {
   //       $cart = session()->get('cart', []);
   //       $productIds = [];

   //       foreach ($cart as $id => $item) {
   //          $productIds[] = $id;
   //          $selling_price[]= $item['selling_price'];
   //          $quantity[] = $item['quantity'];
   //       }

   //       //return [$productIds, $selling_price, $quantity];


   //       $userId = Auth::guard('user')->user()->id;
   //       $address = SelectAddress::where('user_id', $userId)->with('userAddress')->first();

   //       if($address)
   //       {
   //          $totalValue = 0;
   //          $totalItem = 0;

   //          foreach($cart as $item)
   //          {
   //             $totalValue += $item['selling_price'] * $item['quantity'];
   //             $totalItem = $item['quantity'];
   //          }

   //          $addressId = $address->address_id;

   //          $validate = Validator::make($request->all(), [
   //            'payment_mode' => 'required',
   //          ]);

   //          if($validate->fails())
   //          {
   //             return redirect()->back()->withErrors($validate)->withInput();
   //          }
   //          else
   //          {
   //             $confirmOrder = new Order;
   //             $confirmOrder->user_id = $userId;
   //             $confirmOrder->address_id = $addressId;
   //             $confirmOrder->payment_mode = $request->payment_mode;
   //             $confirmOrder->grand_total = $totalValue;
   //             $confirmOrder->save();

   //             $order = Order::where('user_id', $userId)->with('userAddress')->get();

   //             if ($order) {
   //                $orderId = $confirmOrder->id;
   //                $orderItems = [];

   //                foreach ($productIds as $productId) {
   //                    $orderItems[] = new OrderItem([
   //                        'order_id' => $orderId,
   //                        'user_id' => $userId,
   //                        'address_id' => $addressId,
   //                        'product_id' => $productId, // This should be the current product ID
   //                        'vendor_id' => 2,
   //                        'quantity' => $quantity, // You might need to determine the quantity for each product
   //                        'price' => $selling_price, // You might need to determine the price for each product
   //                    ]);
   //                }

   //                // Save the order items
   //                foreach ($orderItems as $orderItem) {
   //                    $orderItem->save();
   //                }
   //             }

   //             session()->pull('cart');
   //          }
   //         return redirect('/')->with('message', 'Your Orders have been Successfully confirm.');
   //       }
   //    }
   //   }


   //   public function search_products()
   //   {
   //    $cart=session()->get('cart',[]);
   //    $cartItem=count($cart);
   //    $search=$request->input('query');
   //    $products=Product::join('product_wears','product_id','=','product_wear.product_id')
   //    ->where(function($query)use ($search)
   //    {
   //      $query->where('product.name','LIKE',"%search%")
   //      ->orWhere('product.brand','LIKE',"%search%");
   //    })
   //    // ->Select('products.name','products.brand','product_wears.original_price',)
   //    ->select('products.name', 'products.brand', 'product_wears.original_price', 'product_wears.image', 'product_wears.selling_price')
   //          ->get();
   //          return view('user.search',compact('products','search','cartItem'));
   //   }

   //  public function order_history()
   //  {
   //    return view('user.order_history');


   //  }

}