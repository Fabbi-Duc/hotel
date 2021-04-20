<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\RepositoryAbstract;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function getListUsers($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $lastname = $data['lastname'];
            $firstname = $data['firstname'];
            $position = $data['position'];

            if($data['lastname'] && $data->has('lastname')) {
                    $list->where('lastname', 'LIKE', "%$lastname%");
            }

            if($data['firstname'] && $data->has('firstname')) {
                $list->where('firstname', 'LIKE', "%$firstname%");
            }

            if($data['position'] && $data->has('position')) {
                
                $list->where('position', 'LIKE', "%$position%");
            }
                              
            return [
                'success' => true,
                'listUser' => $list->paginate($perPage)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
