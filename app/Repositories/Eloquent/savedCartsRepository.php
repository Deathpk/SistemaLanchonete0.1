<?php

namespace App\Repositories\Eloquent;
use App\Models\savedCartsModel;
use App\Repositories\Contracts\savedCartsRepositoryInterface;

class savedCartsRepository extends abstractRepository implements savedCartsRepositoryInterface
{
    protected $model = savedCartsModel::class;
}

?>