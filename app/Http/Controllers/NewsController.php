<?php

namespace App\Http\Controllers;

use App\HackerNews;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class NewsController extends Controller
{
    private function getStories($filter = '', $limit = 5, $offset = 0)
    {
        if ($filter == 'best')
            return HackerNews::newStories($limit, $offset);
        else if ($filter == 'top')
            return HackerNews::topStories($limit, $offset);
        return HackerNews::newStories($limit, $offset);
    }

    function index(Request $request)
    {
        $result = $this->getStories($request->filter, 5, 5 * ($request->page ? $request->page - 1 : 0));
        $news = new Paginator($result['items'], $result['count'], 5, $request->page ? $request->page : 0, [
        ]);
        return view('news.index', compact('news'));
    }

    function show($id)
    {
        $item = HackerNews::getItemWithKids($id);
        return view('news.show', compact('item'));
    }
}
