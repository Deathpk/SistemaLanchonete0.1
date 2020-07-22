<?php 

namespace App\Repositories\Contracts;

interface financeiroRepositoryInterface
{
    public function selectMonth($request);
    public function selectedDay($request);
    public function yearOption($request);
}

?>