<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UsersRepository;
use App\Models\User;

class UsersEloquentRepository implements UsersRepository {
    public function getAll()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::findOrFail($id);
    }

    public function create($attributes)
    {
        return User::create($attributes);
    }

    public function update($id, $attributes)
    {
        $user = $this->get($id);
        $user->full_name = $attributes['full_name'];
        $user->avatar = $attributes['avatar'];
        $user->phone_number = $attributes['phone_number'];


        return $user->save();

    }

    public function delete($id)
    {
        $user = $this->get($id);
        $user->destroy($id);
    }
}