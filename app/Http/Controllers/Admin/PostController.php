<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Posts;
use App\Models\Admin\PostCategories;
use App\Models\Admin\PostToCategory;
use App\Models\Admin\PostImages;
use App\Models\Admin\Slugs;

class PostController extends Controller
{
    
    public function index(Request $request) 
    {

        //---- lấy danh sách post -----
        $posts = DB::table('posts')
                    ->leftJoin('users', 'users.id','=','posts.author_id')
                    ->leftJoin('status', 'status.id','=','posts.status')
                    ->select('posts.*', 'users.name as author_name', 'status.status_name as status_name', 'status.status_css_class as status_css_class')                    
                    ->orderBy('posts.id', 'desc')                    
                    ->get();


        //----- lấy danh mục category của bài post -----
        $postCategories = DB::table('post_to_category')
                    ->leftJoin('post_categories', 'post_categories.id','=','post_to_category.category_id')
                    ->select('post_to_category.*', 'post_categories.name as category_name')
                    ->distinct()
                    ->get();



        $user = $request->user();

        return view('admin.post.index', ['user'=>$user, 'posts'=>$posts, 'postCategories'=>$postCategories]);
    }

    public function create(Request $request)
    {

        $status_list = DB::table('status')->get();

        $categories = DB::table('post_categories')->get();

        $user = $request->user();

        return view('admin.post.create', ['user'=>$user, 'status_list'=>$status_list, 'categories'=>$categories]);
    }

    public function saveCreate(Request $request)
    {
 

        //----- lấy file image avatar và lưu vào thư mục /public/storage/post_avatars -----
        $avatar = $request->file('avatar');
        $avatar_path = "";
        if (isset($avatar)) {
            $avatar_name = $avatar->getClientOriginalName();
            $avatar_path = $avatar->store('post_avatars');
        }
        
        $user = $request->user();

        $maxOrder = DB::table('posts')->max('order');

        //----- chuẩn bị các giá trị để đưa vào dữ liệu -----
        $title          = $request['title'];
        $name           = $title;
        $description    = $request['description'];
        $content        = $request['content'];
        $status         = $request['status'];
        if (isset($request['is_featured'])) {
            $isFeatured      = $request['is_featured'];
        } else {
            $isFeatured     = 0;
        }      
        $order          = $maxOrder + 5;
        $author_id      = $user['id'];
        $views          = 0;

        if (isset($request['category'])) {
            $categories = $request['category'];
        } else {
            $categories = [1];
        }
        
        $meta_title     = $request['meta_title'];
        $meta_description = $request['meta_description'];
        $meta_keywords = $request['meta_keywords'];
        

        //----- lưu dữ liệu vào bảng Posts -----
        $newPost = new Posts();

        $newPost->title     = $title;
        $newPost->name      = $name;
        $newPost->description = $description;
        $newPost->content   = $content;
        $newPost->status    = $status;
        $newPost->is_featured = $isFeatured;
        $newPost->image     = $avatar_path;
        $newPost->order     = $order;
        $newPost->author_id = $author_id;
        $newPost->views     = $views;
        $newPost->meta_title = $meta_title;
        $newPost->meta_description = $meta_description;
        $newPost->meta_keywords = $meta_keywords;
        
        $newPost->save();

        //----- lay ID của post vừa được tạo
        $inserted_post_id = $newPost->id;

        //----- đưa post vừa tạo vào các category        
        foreach($categories as $category_id) {
            $postToCategory = new PostToCategory();
            $postToCategory->post_id = $inserted_post_id;
            $postToCategory->category_id = $category_id;   
            $postToCategory->save();      
        }

        //----- lay danh sach post image và lưu vào thư mục /public/storage/post_images -----
        $post_image_list = $request->file('kt_post_image_uploader');
        if (is_array($post_image_list)) {
            foreach($post_image_list as $post_image) {
                $post_image_name = $post_image['post_image']->getClientOriginalName();
                $post_image_path = $post_image['post_image']->store('post_images');

                //----- lưu hình ảnh vào bảng post_images -----
                $postImage = new PostImages();
                $postImage->post_id = $inserted_post_id;
                $postImage->image_path = $post_image_path;

                $postImage->save();
            }
        }

        //----- tạo slug cho post của mới tạo
        $post_slug = Str::slug($title);
        $newPost_slugs = new Slugs();
        $newPost_slugs->slug_key = $post_slug;
        $newPost_slugs->reference_id = $inserted_post_id;
        $newPost_slugs->reference_type = "Post";
        $newPost_slugs->save();


        
       return redirect('/admin/post/list');

    }

    public function edit(Request $request) 
    {
        $id = $request->id;

        $editPost = DB::table('posts')
                    ->leftJoin('users', 'users.id','=','posts.author_id')
                    ->leftJoin('post_to_category', 'post_to_category.post_id','=','posts.id')
                    ->leftJoin('post_categories', 'post_categories.id','=','post_to_category.category_id')
                    ->select('posts.*', 'users.name as author_name', 'post_categories.id as category_id', 'post_categories.name as category_name')
                    ->where('posts.id','=',$id)
                    ->first();

        //----- lấy danh mục category của bài post -----
        $postCategories = DB::table('post_to_category')
                    ->leftJoin('post_categories', 'post_categories.id','=','post_to_category.category_id')
                    ->select('post_to_category.*', 'post_categories.name as category_name')
                    ->where('post_to_category.post_id','=',$id)
                    ->get();

        //----- lấy danh sách hình ảnh của bài post -----
        $postImages = DB::table('post_images')
                    ->where('post_images.post_id', '=', $id)
                    ->get();

        $status_list = DB::table('status')->get();

        $categories = DB::table('post_categories')->get();

        $user = $request->user();
        
        return view('admin.post.edit', ['user'=>$user, 'status_list'=>$status_list, 'categories'=>$categories, 'postCategories'=>$postCategories, 'postImages'=>$postImages , 'editPost'=>$editPost]);

    }

    public function saveEdit(Request $request)
    {

        //----- lấy file image avatar và lưu vào thư mục /public/storage/post_avatars -----
        $avatar = $request->file('avatar');
        $avatar_path = "";
        if (isset($avatar)) {
            $avatar_name = $avatar->getClientOriginalName();
            $avatar_path = $avatar->store('post_avatars');
        }
        
        $user = $request->user();

        $maxOrder = DB::table('posts')->max('order');

        //----- chuẩn bị các giá trị để đưa vào dữ liệu -----
        $editPost_id    = $request['editpost_id'];
        $title          = $request['title'];
        $name           = $title;
        $description    = $request['description'];
        $content        = $request['content'];
        $status         = $request['status'];
        if (isset($request['is_featured'])) {
            $isFeature      = $request['is_featured'];
        } else {
            $isFeature      = 0;
        }      
        $order          = $maxOrder + 5;
        $author_id      = $user['id'];
        $views          = 0;

        if (isset($request['category'])) {
            $editPost_categories = $request['category'];
        } else {
            $categories = [1];
        }
        
        $meta_title     = $request['meta_title'];
        $meta_description = $request['meta_description'];
        $meta_keywords   = $request['meta_keywords'];

        //----- lưu dữ liệu vào bảng Posts -----
        $editPost_id        = $request->editpost_id;
        $editPost = Posts::find($editPost_id);

        $editPost->title     = $title;
        $editPost->name      = $name;
        $editPost->description = $description;
        $editPost->content   = $content;
        $editPost->status    = $status;
        $editPost->is_featured = $isFeature;
        if ($avatar_path != "") {
            $editPost->image     = $avatar_path;
        }
        
        //$editPost->order     = $order;
        $editPost->author_id = $author_id;
        //$editPost->views     = $views;
        $editPost->meta_title = $meta_title;
        $editPost->meta_description = $meta_description;
        $editPost->meta_keywords = $meta_keywords;
        
        $editPost->save();

        //----- xóa category_id hiện tại của post đang được edit -----        
        $deleted = PostToCategory::where('post_id', $editPost_id)->delete();

        foreach($editPost_categories as $category_id) {
            $postToCategory = new PostToCategory();
            $postToCategory->post_id = $editPost_id;
            $postToCategory->category_id = $category_id;   
            $postToCategory->save(); 
        }

        //----- lay danh sach post image và lưu vào thư mục /public/storage/post_images -----
        $post_image_list = $request->file('kt_post_image_uploader');
        if (is_array($post_image_list)) {
            foreach($post_image_list as $post_image) {
                $post_image_name = $post_image['post_image']->getClientOriginalName();
                $post_image_path = $post_image['post_image']->store('post_images');

                //----- lưu hình ảnh vào bảng post_images -----
                $postImage = new PostImages();
                $postImage->post_id = $editPost_id;
                $postImage->image_path = $post_image_path;

                $postImage->save();
            }
        }

        //----- sửa slug cho post của post đang update
        $editPost_slug_key = Str::slug($title);

        $editPost_slug = Slugs::where('reference_id', $editPost_id)->first();
        $editPost_slug->slug_key = $editPost_slug_key;
        $editPost_slug->reference_id = $editPost_id;
        $editPost_slug->reference_type = "Post";
        $editPost_slug->save();
        
        return redirect('/admin/post/list');

    }

    public function delete(Request $request) 
    {

        $id = $request->id;
        $post = Posts::find($id);

        $post->delete();

        return redirect(route('post.list'));

    }

    public function categoryList(Request $request) 
    {

        $postCategories = DB::table('post_categories')
                    ->leftJoin('users', 'users.id', '=', 'post_categories.author_id')
                    ->leftJoin('status', 'status.id', '=', 'post_categories.status')
                    ->select('post_categories.*', 'users.name as author_name', 'status.status_name as status_name', 'status.status_css_class as status_css_class')
                    ->orderBy('post_categories.id', 'desc')
                    ->get();

        $user = $request->user();

        return view('admin.post.categories', ['user'=>$user, 'postCategories'=>$postCategories, 'parentCategories'=>$postCategories]);
    }

    public function createCategories(Request $request) 
    {
        $status_list = DB::table('status')->get();

        //----- lấy toàn bộ danh mục posts trừ danh mục Uncategory (danh mục mặc định)
        $categories = DB::table('post_categories')
                    ->where('id', '!=', 1) 
                    ->get();

        $user = $request->user();

        return view('admin.post.createCategories', ['user'=>$user, 'status_list'=>$status_list, 'categories'=>$categories]);

    }

    public function saveCategoryCreate(Request $request)
    {

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        $user = $request->user();

        //----- lấy file image avatar và lưu vào thư mục /public/storage/post_avatars -----
        $avatar = $request->file('avatar');
        $avatar_path = "";
        if (isset($avatar)) {
            $avatar_name = $avatar->getClientOriginalName();
            $avatar_path = $avatar->store('post_avatars');
        }

        //----- lấy dữ liệu từ form chuẩn bị lưu vào danh mục -----
        $title              = $request->title;
        $description        = $request->description;
        $parent_category    = $request->parent_category;
        $status             = $request->status;
        if (isset($request['is_featured'])) {
            $isFeatured      = $request['is_featured'];
        } else {
            $isFeatured      = 0;
        }      
        $icon               = "";
        $author_id          = $user['id'];
        $is_default         = 0;

        $maxOrder = DB::table('post_categories')->max('order');

        $meta_title         = $request->meta_title;
        $meta_description   = $request->meta_description;
        $meta_keywords      = $request->meta_keywords;

        //----- lưu dữ liệu vào database tạo mới post_category -----
        $newCategory = new PostCategories();
        $newCategory->name  = $title;
        $newCategory->description = $description;
        $newCategory->parent_id = $parent_category;
        $newCategory->image = $avatar_path;
        $newCategory->status = $status;
        $newCategory->is_featured = $isFeatured;
        $newCategory->icon  = $icon;
        $newCategory->author_id = $author_id;
        $newCategory->order = $maxOrder + 5;
        $newCategory->is_default = $is_default;
        $newCategory->meta_title = $meta_title;
        $newCategory->meta_description = $meta_description;
        $newCategory->meta_keyword = $meta_keywords;
        
        $newCategory->save();

        //----- lấy ID của post category vừa mới tạo
        $inserted_postCategory_id = $newCategory->id;


        //----- tạo slug cho post của mới tạo

        
        
        return redirect('/admin/post/categories/list');
    }

}
