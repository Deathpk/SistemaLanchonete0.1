<?php 

namespace App\Repositories\Contracts;

interface productRepositoryInterface
{
public function checkProduct($id);
public function insertProduct($request);
public function updateProduct($request);
public function destroyProduct($request);
public function getProduct($request);
public function getComida();
public function getBebida();
public function getSobremesa();
}

?>