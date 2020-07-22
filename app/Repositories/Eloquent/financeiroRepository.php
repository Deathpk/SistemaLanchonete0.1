<?php 

namespace App\Repositories\Eloquent;

use App\Models\savedCartsModel;
use App\Repositories\Contracts\financeiroRepositoryInterface;

class financeiroRepository extends abstractRepository implements financeiroRepositoryInterface
{
    
    protected $model = savedCartsModel::class;

}
?>