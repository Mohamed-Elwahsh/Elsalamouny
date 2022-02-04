<?php

namespace Modules\SiteModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Entities\City;
use Modules\BlogModule\Entities\Blog;
use Modules\NewsModule\Entities\News;
use Modules\SiteModule\Entities\Contact;
use Modules\BlogModule\Entities\BlogCategory;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\BlogModule\Repository\BlogRepository;
use Modules\NewsModule\Repository\NewsRepository;
use Modules\NewsModule\Repository\CategoryRepository;
use Modules\BlogModule\Repository\BlogCategoryRepository;

class SiteModuleController extends Controller
{
    use UploaderHelper;
    private $blogRepo;
    private $blogCategoryRepository;

    public function __construct(BlogRepository $blogRepo,BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function index(Request $request) {
        // dd($request->all());
        $newsCayegory = CategoryRepository::findAll();
        $allnews = News::orderBy('id','desc')->take(4)->get();
        $categories = BlogCategory::with('translations','child.translations')->get();
        $BlogCategories = BlogCategory::with('translations','child.translations','blogs.translations')->inRandomOrder()->take(4)->get();
        $cities = City::with('translations')->get();
        return view('sitemodule::index',compact('categories','cities','BlogCategories', 'newsCayegory','allnews'));
    }

    public function category(Request $request) {
        $newsCayegory = CategoryRepository::findAll();
        $categories = BlogCategory::with('translations','child.translations')->get();
        $cities = City::with('translations')->get();
        $blogs = Blog::with('cities.translations','translations','categories.translations')->where('is_featured',1)
            ->when($request->cities,function($q) use ($request){
                $q->where('city_id',$request->cities);
            })->when($request->category,function($q) use ($request){
                $q->whereHas('categories',function($q) use ($request) {
                    $q->where('blog_category_id',$request->category);
                });
            })->paginate(10);
        return view('sitemodule::category',compact('categories','cities','blogs','newsCayegory'));
    }

    public function showCat(Request $request,$id) {
        $newsCayegory = CategoryRepository::findAll();
        $categories = BlogCategory::with('translations','child.translations')->get();
        $cities = City::with('translations')->get();
        $showBlog = BlogCategory::findOrFail($id)->blogs;
        return view('sitemodule::Showcategory',compact('categories','showBlog','cities','newsCayegory'));
    }

    public function detail($id) {
        $newsCayegory = CategoryRepository::findAll();
        $categories = BlogCategory::with('translations','child.translations')->get();
        $blogs = Blog::with('cities.translations','translations','categories.translations')->findOrFail($id);
        return view('sitemodule::detail',compact('categories','blogs','newsCayegory'));
    }

    public function contactUs(Request $request) {
        $message=[
            'name.required'=>'الاسم مطلوب',
            'description.required'=>'الوصف مطلوب',
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.unique'=>'رقم الهاتف موجود',
            'phone.numeric'=>'رقم الهاتف يجب أن يكون أرقام فقط',
        ];
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:contacts,phone|numeric',
            'description' => 'required',
            'blog_id' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ],$message);

        Contact::create($data);
        return redirect()->back()->with('status', 'تم تسجيل بياناتك بنجاح');
    }

    public function addBlog() {

        $newsCayegory = CategoryRepository::findAll();
        $categories = BlogCategory::with('translations','child.translations')->get();
        $cities = City::with('translations')->get();
        return view('sitemodule::addBlog',compact('categories','cities','newsCayegory'));
    }

    public function addNewblog(Request $request) {
        // dd($request);
        $data = $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $blogData = $request->except('_token', '_wysihtml5_mode','photo');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'blog');
            $blogData['photo'] = $imageName;
        }


        $categ = $this->blogRepo->save($blogData);

        return redirect()->back()->with('success', 'تم حفظ اعلانك بنجاح');
    }


}
