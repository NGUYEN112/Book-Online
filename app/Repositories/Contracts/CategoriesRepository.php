<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface CategoriesRepository extends InterfaceRepository {
    public function getIdWithName($name);
}