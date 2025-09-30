<?php

namespace App\Controllers;
use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        helper('text');
        $postModel = new PostModel();

        $data = [
            // Use paginate() instead of findAll(). The '6' is the number of items per page.
            'posts' => $postModel->select('posts.*, categories.name as category_name')
                                ->join('categories', 'categories.id = posts.category_id')
                                ->paginate(6),
            // This gets the pagination links
            'pager' => $postModel->pager,
        ];

        return view('frontend/home', $data);
    }
}
