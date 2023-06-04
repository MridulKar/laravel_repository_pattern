<?php
namespace App\Repositories;
use App\Models\Category;
use Illuminate\Support\Facades\Request;

class CategoryRepositoryOne implements CategoryInterface {

    public function getall(){
        return Category::all();
    }
    public function store(array $inputs){
        Category::create($inputs);
    }
    public function update(array $inputs, $id){
        Category::find($id)->update($inputs);
    }
    public function delete($id){
        Category::find($id)->delete($id);
    }

}
