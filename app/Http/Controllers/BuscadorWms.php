<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class BuscadorWms extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function search_route(Request $request)
    {

        $data_results = Search::where('text', 'like', '%' . $request->search_wms . '%')
            ->orWhere('route_name', 'like', '%' . $request->search_wms . '%')
            ->orWhere('description', 'like', '%' . $request->search_wms . '%')
            ->get();

        return view('pages.search.search-wms', compact('data_results'));
    }
}
