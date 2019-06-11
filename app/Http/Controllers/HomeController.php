<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $mainCategories;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('main')->with([
            'title' => 'Samsung',
        ]);
    }

    public function search(){
        $request = \request();
        $key = $request['key'];
        if(empty($key))
            return redirect()->back();
        $sort = $request['sort'];
        $sort = $sort ?? 'high';
        $materials = Material::where('title','like',"%{$key}%");
        switch ($sort){
            case 'new':
                $materials->orderBy('updated_at','DESC');
                break;
            case 'old':
                $materials->orderBy('updated_at','ASC');
                break;
            case 'like':
                $materials->orderBy('like','DESC');
                break;
            case 'view':
                $materials->orderBy('view','DESC');
                break;
        }

        $materials = $materials->paginate(6);
        return view('search')
            ->with('key',$key)
            ->with('materials',$materials)
            ->with('sort',$sort);
    }
}
