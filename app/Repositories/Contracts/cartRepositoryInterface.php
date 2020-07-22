<?php

namespace App\Repositories\Contracts;

interface cartRepositoryInterface
{
    public function insertIntoCart($item,$id);
    public function getAll();
    public function getTotal();
    public function dropItem($product);
    public function clearCart();    
}

?>