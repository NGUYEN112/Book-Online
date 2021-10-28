<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface GenreGroupsRepository extends InterfaceRepository {
   public function getDataWithCategory($id);

   // public function getListGroupOfCategory($id);
}