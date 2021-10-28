<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface ProductsRepository extends InterfaceRepository {
    public function getProductOfCategory($id);
    public function getProductOfGroup($id);
    public function getProductOfGenre($id);
    public function getRandomProduct();
}