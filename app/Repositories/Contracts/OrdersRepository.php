<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface OrdersRepository extends InterfaceRepository {
   public function getUnpaid($id);
   public function getPayOff($id);

   public function checkDuplicate($id);
}