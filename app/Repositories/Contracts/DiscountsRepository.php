<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface DiscountsRepository extends InterfaceRepository {
    public function getDiscountOfCategory($id);
    public function getDiscountAvailble($id);
}