<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepositoryOne;

class CategoryController extends Controller
{

    protected $category;
    public function __construct(CategoryRepositoryOne $category){
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category->getall();
        return view('category.index', compact('category'));
    }

    public function store(Request $request)
    {
        $inputs = [
            'name' => $request->input('name'),
        ];
        $this->category->store($inputs);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $inputs = [
            'name' => $request->input('name'),
        ];

        $this->category->update($inputs, $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect()->back();
    }
}
