<?php

namespace App\Repositories\Customer;

use App\Models\Customers;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class CustomerRepository extends RepositoryAbstract implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customers::class;
    }

    public function getListCustomer($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $lastname = $data['lastname'];
            $firstname = $data['firstname'];

            if($data['lastname']) {
                $list->where('lastname', 'LIKE', "%$lastname%");
            }

            if($data['firstname']) {
                $list->where('firstname', 'LIKE', "%$firstname%");
            }
            
            return [
                'success' => true,
                'data' => $list->paginate($perPage)
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}