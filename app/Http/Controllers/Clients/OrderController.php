<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OrdersRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $orderRepository;
    public function __construct(
    OrdersRepository $ordersRepository
    )
    {
        $this->orderRepository = $ordersRepository;
    }

    public function getUnpaidOrder() {
        if(auth()->user()) {
            $orders = $this->orderRepository->getUnpaid(auth()->user()->id);
        }
        else {
            $orders = null;
        };
        return json_encode(array('data' => $orders));
    }

    public function createOrder(Request $request) {
        $check = $this->orderRepository->checkDuplicate($request->product_id);
        if($check == null) {
            $attributes = [
                'product_id' => $request->product_id,
                'discount_id' => $request->discount_id,
                'count'        => 1,
                'price'        => $request->price,
                'user_id' => auth()->user()->id,
                'status'    => 0
            ];
            $this->orderRepository->create($attributes);
        }else {
            $attributes = [
                'count' => $check->count += 1,
                'status' => 0
            ];
            $this->orderRepository->update($check->id,$attributes);
        };
       
        return;
    }

    public function checkOutPage() {
        $orders = $this->orderRepository->getUnpaid(auth()->user()->id);
        $payoffs = $this->orderRepository->getPayOff(auth()->user()->id);
        return view('clients.checkout',compact('orders','payoffs'));
    }

    public function checkOut(Request $request) {
        foreach($request['data'] as $req) {
            $attributes = [
                'count' => $req['count'],
                'status' => 1,
            ];
            $this->orderRepository->update($req['id'],$attributes);
        } return;

       
    }
}
