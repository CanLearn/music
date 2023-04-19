<?php

namespace App\Http\Controllers\Manager\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\Manager\SearchCollection;
use App\Models\Manager\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function category()
    {
        return  new SearchCollection(Category::all()) ;

    }
}
