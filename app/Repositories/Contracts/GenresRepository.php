<?php 

namespace App\Repositories\Contracts;
use App\Repositories\InterfaceRepository;

interface GenresRepository extends InterfaceRepository {
    public function getGenreWithGroup($id);
    public function getGenreWithCategory($id);
}