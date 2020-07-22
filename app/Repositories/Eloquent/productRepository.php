<?php
namespace App\Repositories\Eloquent;

use App\Models\productModel;
use App\Repositories\Contracts\productRepositoryInterface;

class productRepository extends abstractRepository implements productRepositoryInterface
{

    protected $model = productModel::class;

}

?>