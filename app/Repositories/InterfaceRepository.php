<?php
namespace App\Repositories;

interface InterfaceRepository {
    public function getAll();
    public function get($id);
    public function create($attributes);
    public function update($id, $attributes);
    public function delete($id);
}