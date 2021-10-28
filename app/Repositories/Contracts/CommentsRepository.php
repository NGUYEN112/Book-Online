<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface CommentsRepository extends InterfaceRepository {
    public function getOfProduct($id);
}