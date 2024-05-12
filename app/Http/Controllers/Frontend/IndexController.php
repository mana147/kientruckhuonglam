<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    
    public function index()
    {
        //----- lấy 3 tin tức mới nhất -----
        $newestPosts = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key')
                    ->where('post_to_category.category_id', '=', 4)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.created_at', 'desc')
                    ->limit(3)
                    ->get();

        //----- lấy danh sách Id của các category dự án
        $projectCategoriesId = DB::table('post_categories')
                    ->select('id')
                    ->where('parent_id', '=', 2)
                    ->get();
        $arrayProjectCategoryId = [];
        foreach($projectCategoriesId as $category_id) {
            $arrayProjectCategoryId[] = $category_id->id;
        }

        //---- lấy danh sách dự án -----
        $newestProjects = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('post_categories', 'post_categories.id', '=', 'post_to_category.category_id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key', 'post_to_category.category_id as category_id', 'post_categories.name as category_name', 'post_categories.icon as category_icon')
                    ->whereIn('post_to_category.category_id', $arrayProjectCategoryId)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.order', 'desc')
                    ->get();

        $projectCategories = DB::table('post_categories')
                    ->where('parent_id', '=', 2)
                    ->get();
        

        return view('frontend.index', ['newestPosts'=>$newestPosts, 'newestProjects'=>$newestProjects, 'projectCategories'=>$projectCategories]);
    }

    public function aboutUs() 
    {
        return view('frontend.about');
    }

    public function project() 
    {
        //----- lấy danh sách Id của các category dự án
        $projectCategoriesId = DB::table('post_categories')
                    ->select('id')
                    ->where('parent_id', '=', 2)
                    ->get();
        $arrayProjectCategoryId = [];
        foreach($projectCategoriesId as $category_id) {
            $arrayProjectCategoryId[] = $category_id->id;
        }

        //---- lấy danh sách dự án -----
        $projects = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('post_categories', 'post_categories.id', '=', 'post_to_category.category_id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key', 'post_to_category.category_id as category_id', 'post_categories.name as category_name', 'post_categories.icon as category_icon')
                    ->whereIn('post_to_category.category_id', $arrayProjectCategoryId)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.order', 'desc')
                    ->get();

        //----- lấy các danh mục dự án -----
        $projectCategories = DB::table('post_categories')
                    ->where('parent_id', '=', 2)
                    ->get();

        return view('frontend.project', ['projects'=>$projects, 'projectCategories'=>$projectCategories]);
    }

    public function project_detail(Request $request) 
    {

        $post_slug_key = $request->slug;
        
        $project = DB::table('posts')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key')                
                    ->where('slugs.slug_key', '=', $post_slug_key)
                    ->first();
        $project_id = $project->id;
        
        $projectImages = DB::table('post_images')
                    ->where('post_id', '=', $project_id)
                    ->get();

        //---- lấy danh sách 3 dự án mới nhất
        $moreProjects = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key')
                    ->where('post_to_category.category_id', '=', 2)
                    ->where('posts.status', '=', 1)
                    ->where('posts.id', '<>', $project_id)
                    ->orderBy('posts.created_at', 'desc')
                    ->limit(3)
                    ->get();

        return view('frontend.project-detail', ['project'=>$project, 'projectImages'=>$projectImages, 'moreProjects'=>$moreProjects]);
    }

    public function factory() 
    {
        return view('frontend.factory');
    }

    public function news() 
    {
        //---- lấy danh sách tất cả post thuộc danh mục tin tức
        $news = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key')
                    ->where('post_to_category.category_id', '=', 4)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.order', 'desc')
                    ->get();

        return view('frontend.news', ['posts'=>$news]);
    }

    public function news_detail(Request $request)
    {
        $post_slug_key = $request->slug;
        $post_id = $request->id;

        $post = DB::table('posts')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')                    
                    ->where('slugs.slug_key', '=', $post_slug_key)
                    ->first();
        
        $recentPosts = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key')
                    ->where('post_to_category.category_id', '=', 4)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.created_at', 'desc')
                    ->limit(4)
                    ->get();

        $recentProjects = DB::table('posts')
                    ->leftJoin('post_to_category', 'post_to_category.post_id', '=', 'posts.id')
                    ->leftJoin('slugs', 'slugs.reference_id', '=', 'posts.id')
                    ->select('posts.*', 'slugs.slug_key as slug_key')
                    ->where('post_to_category.category_id', '=', 2)
                    ->where('posts.status', '=', 1)
                    ->orderBy('posts.created_at', 'desc')
                    ->limit(4)
                    ->get();

        return view('frontend.news-detail', ['post'=>$post, 'recentPosts'=>$recentPosts, 'recentProjects'=>$recentProjects]);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

}
