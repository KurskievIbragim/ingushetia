<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\PhotoReportage;
use App\Models\Resource;
use App\Models\Video;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::query()->take(10)->get();
        $resources = Resource::query()->take(4)->get();
        $photoReportages = PhotoReportage::query()->take(4)->orderBy('published_at', 'desc')->get();
        $videos = Video::query()->take(4)->orderBy('published_at', 'desc')->get();

        $mainPosts = News::query()
            ->with('category')
            ->where('main_material', 1)
            ->take(10)
            ->get();

        $posts = News::query()
            ->with('category')
            ->where('main_material', 0)
            ->take(6)
            ->orderBy('id', 'desc')
            ->get();

        return Inertia::render('Welcome', [
            'posts' => $posts,
            'categories' => $categories,
            'mainPosts' => $mainPosts,
            'resources' => $resources,
            'photoReportages' => $photoReportages,
            'videos' => $videos
        ]);
    }
}
