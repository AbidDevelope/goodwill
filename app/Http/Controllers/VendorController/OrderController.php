<?php

namespace App\Http\Controllers\VendorController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\User;
use App\Models\OrderTracking;
use App\Models\UserAddress;
use App\Models\Transaction;
use PDF;


class OrderController extends Controller
{

    public function orderlist()
    {
        if (Auth::guard('vendor')->check()) {
            $vendor = Auth::guard('vendor')->user();
    
            $orders = Order::with('orderItem')
                ->whereHas('orderItem.product', function ($query) use ($vendor) {
                    $query->where('vendor_id', $vendor->id);
                })
                ->paginate(5);

            return view('vendor.order.order_list', compact('orders'));
        }
    }

    public function order_details($id)
    {
        if(Auth::guard('vendor')->check())
        {
            $vendorId = Auth::guard('vendor')->user()->id;

            $order = Order::where('id', $id)->first();

            if ($order) {

                $user = $order->user;
                
                $addressId = UserAddress::where('user_id', $user->id)->first();

                $orderItem = OrderItem::where('order_id', $id)->where('vendor_id', $vendorId)->paginate(5);

                $productIds = $orderItem->pluck('product_id')->unique()->toArray();
                $product = Product::whereIn('id', $productIds)->with('orderItem')->get();

                return view('vendor.order.order_details', compact('user', 'addressId', 'order', 'orderItem', 'product'));
            }
        }
    }

    public function packedStatus(Request $request, $id){

        $orderItemId = OrderItem::find($id);
        
        if($orderItemId)
        {
            $orderItemId->packed = 'packed';
            $orderItemId->tracking_status = 'packed';
            $orderItemId->save();
 
            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();

            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->packed_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }

        return redirect()->back()->with('message', 'Your status has been updated successfully!');
    }

    public function shippedStatus(Request $request, $id)
    {
        $orderItemId = OrderItem::find($id);

        if($orderItemId)
        {
            $orderItemId->shipped = 'shipped';
            $orderItemId->tracking_status = 'shipped';
            $orderItemId->save();

            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();
            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->shipped_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }


        return redirect()->back()->with('message', 'Your status has been updated successfully!');
    }

    public function deliveredStatus(Request $request, $id)
    {
        $orderItemId = OrderItem::find($id);
        

        if($orderItemId)
        {
            $orderItemId->delivered = 'delivered';
            $orderItemId->tracking_status = 'delivered';
            $orderItemId->save();

            $orderTrackingId = OrderTracking::where('order_item_id', $id)->first();
            if($orderTrackingId)
            {
               $orderTrackingId->user_id = $orderTrackingId->user_id;
               $orderTrackingId->order_id = $orderTrackingId->order_id;
               $orderTrackingId->product_id = $orderTrackingId->product_id;
               $orderTrackingId->order_item_id = $orderItemId->id;
               $orderTrackingId->delivered_time = $orderTrackingId->updated_at;
               $orderTrackingId->update();
            }
        }

        return redirect()->back()->with('message', 'Your status has been updated successfully!');

    }
    
    public function orderTracking($id)
    {
        $order = Order::where('id', $id)->first();

        $orderItem = OrderItem::where('order_id', $id)->first();

        $shipping = Shipping::where('order_id', $id)->first();

        return view('vendor.order.order_tracking', compact('order', 'orderItem', 'shipping'));
    }

                     
    public function orderInformationPdf($orderId)
    {
        $order = Order::where('id', $orderId)->first();

        $shipping = Shipping::where('id', $orderId)->first();

        $orderItem = OrderItem::where('order_id', $orderId)->get();
       
        $pdf = PDF::loadView('vendor.order.order_information', compact('order', 'shipping', 'orderItem'));
        
        return $pdf->download('orderInformaton.pdf');
    }

    public function userProfile($id)
    {
        $order = Order::find($id);
        return view('vendor.order.user_profile',compact('order'));
    }
    
    public function invoice()
    {
        return view('vendor.order.invoice');
    }
}