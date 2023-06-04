<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Request;

interface CategoryInterface {

    public function getall();
    public function store(array $inputs);
    public function update(array $inputs, $id);
    public function delete($id);
}

