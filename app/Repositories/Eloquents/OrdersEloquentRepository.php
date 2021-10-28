<?php 

namespace App\Repositories\Eloquents;

use App\Models\Order;
use App\Repositories\Contracts\OrdersRepository;

class OrdersEloquentRepository implements OrdersRepository {
    public function getAll()
    {
        return Order::orderBy('status','asc')->get();
    }
    public function getUnpaid($id)
    {
        return Order::where('user_id',$id)
        ->where('status',0)
        ->get();
    }

    public function getPayOff($id)
    {
        return Order::where('user_id',$id)
        ->where('status',1)
        ->get();
    }

    public function checkDuplicate($id) {
        return Order::where('product_id',$id)->where('status',0)->first();
    }
    public function get($id)
    {
        return Order::findOrFail($id);
    }

    public function create($attributes)
    {
        return Order::create($attributes);
    }

    public function update($id, $attributes)
    {
        $order = $this->get($id);
        $order->status = $attributes['status'];
        $order->count = $attributes['count'];
       


        return $order->save();

    }

    public function delete($id)
    {
        $user = $this->get($id);
        $user->destroy($id);
    }
}