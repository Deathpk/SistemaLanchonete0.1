<?php

namespace App\Repositories\Eloquent;

use App\Models\userModel;
use App\Repositories\Contracts\userRepositoryInterface;

class userRepository extends abstractRepository implements userRepositoryInterface
{
    protected $model = userModel::class;
} 

?>