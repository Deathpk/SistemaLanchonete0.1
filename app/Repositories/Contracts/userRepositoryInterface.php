<?php

namespace App\Repositories\Contracts;

interface userRepositoryInterface
{
    public function showUsers();
    public function returnAllUsers();
    public function updateUser($request);
    public function deleteUser($request);
    
}

?>