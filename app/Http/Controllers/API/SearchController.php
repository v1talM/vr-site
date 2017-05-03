<?php

namespace App\Http\Controllers\API;

use App\Pano\Contracts\SearchRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SearchController
 * @package App\Http\Controllers\API
 */
class SearchController extends Controller
{
    /**
     * @var SearchRepositoryInterface
     */
    protected $searchRepository;

    /**
     * SearchController constructor.
     * @param $searchRepository
     */
    public function __construct(SearchRepositoryInterface $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $search = $this->searchRepository->getProfilesByQuery($query);
        return response()->json([
            'data' => $search,
            'info' => '获取数据成功!'
        ]);
    }
}
