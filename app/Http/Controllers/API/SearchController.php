<?php

namespace App\Http\Controllers\API;

use App\Pano\Repositories\SearchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $searchRepository;

    /**
     * SearchController constructor.
     * @param $searchRepository
     */
    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        $category = $request->input('c');
        $query = $request->input('q');
        $search = $this->searchRepository->getProfilesByQuery($query);
        dd($search);
    }
}
