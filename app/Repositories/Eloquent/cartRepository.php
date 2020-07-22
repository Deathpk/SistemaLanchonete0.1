<?php

namespace App\Repositories\Eloquent;
use App\Models\cartModel;
use App\Repositories\Contracts\cartRepositoryInterface;

class cartRepository extends abstractRepository implements cartRepositoryInterface
{
    protected $model = cartModel::class;
}

?>