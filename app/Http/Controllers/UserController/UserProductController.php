<?php
namespace App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\SubCategories;
use App\Models\Order;
use App\Models\ProductWear;

class UserProductController extends Controller
{
   public function ProductDetails($id)
   {
    $cart = session()->get('cart',[]);
    $cartItem = count($cart);

      $product = Product::find($id);

      $productsWears = ProductWear::with('product')->get();
      $allProduct = Product::with('productWear')->get();

      $combineData = [
        'product' => $product,
        'productsWears' => $productsWears,
        'allProduct' => $allProduct,
      ];
      return view('user.products.productDetails', compact('combineData', 'product', 'cartItem'));
   }

   public function addToCart(Product $product, ProductWear $productWear)
   {
      $cart = Session()->get('cart');

      if(isset($cart[$product->id]))
      {
         $cart[$product->id]['quantity']++;
         session()->put('cart', $cart);
      }else
      {
        $cart[$product->id] = [
            'product_wear_id' => $product->productWear->id,
            'vendor_id'       => $product->vendor_id,
            'name'            => $product->name,
            'quantity'        => 1,
            'selling_price'   => $product->productWear->selling_price,
            'original_price'  => $product->productWear->original_price,
            'image'           => $product->productWear->image,
         ];
        }
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('message', 'Item Successfully Added');
   }

   public function cart()
   {
      $cart = Session()->get('cart', []);

      $cartItem = count($cart);
      $totalItem = count($cart);

      $totalValue=0;
      $totalItem=0;

      foreach ($cart as $item) {
         $totalValue += $item['selling_price'] * $item['quantity'];
         $totalItem += $item['quantity'];
     }

     return view('user.products.cart', compact('cart', 'totalValue', 'totalItem', 'cartItem'));
   }


   public function removeItem($id)
   {
       if(session()->has('cart'))
       {
           $cart = session()->get('cart');

           if(isset($cart[$id]))
           {
               unset($cart[$id]);
               session()->put('cart', $cart);
               return redirect()->back()->with('message', 'Product removed successfully');
           }
       }

       return redirect()->back()->with('error', 'Item not found in cart');
   }



   // not live
      public function increment($id)
      {
          $product = Product::find($id);

          if (!$product) {
              return redirect()->route('cart')->with('error', 'Item not found.');
          }

          $cart = session()->get('cart');

          if (isset($cart[$id])) {
              $cart[$id]['quantity']++;
              session(['cart' => $cart]);
          }

          return redirect()->route('cart')->with('success', 'Quantity incremented successfully');
         // return response()->json(['quantity' => $cart[$id]['quantity']]);

      }

      public function decrement($id)
      {
          $product = Product::find($id);

          if (!$product) {
              return redirect()->route('cart')->with('error', 'Item not found.');
          }

          $cart = session()->get('cart');

          if (isset($cart[$id])) {
              $cart[$id]['quantity'] = max(0, $cart[$id]['quantity'] - 1);

              if ($cart[$id]['quantity'] === 0) {
                  unset($cart[$id]);
              }

              session(['cart' => $cart]);
          }

          return redirect()->route('cart')->with('success', 'Quantity decremented successfully');
      }


}