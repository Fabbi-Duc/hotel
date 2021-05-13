<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getListUsers($data);

    public function getInfoUser($id);

    public function createUser($data);

    public function updateUser($data, $id);

    public function deleteUser($id);
}
