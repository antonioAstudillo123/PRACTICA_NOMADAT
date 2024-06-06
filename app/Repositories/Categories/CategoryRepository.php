<?php

namespace App\Repositories\Categories;

use App\Models\Categories\Category;

class CategoryRepository{

    public function getCategories()
    {
        return Category::orderBy('category')->get();
    }
}
