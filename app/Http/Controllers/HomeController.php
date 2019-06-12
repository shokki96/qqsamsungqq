<?php

namespace App\Http\Controllers;

use App\Models\Sample;
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
        $request = \request();
        $q = $request['q'];
        $search = Sample::where('imei','like',"$q");
        if(!empty($search) && $search->count()>0)
            $result = 'Поздравляю ваш телефон может участвовать в акции  '.$q;
        else{
            $result = 'К сожалению Ваш телефон с другого региона   '.$q;
        }
        return view('main')->with([
            'title' => 'Samsung',
            'result' => empty($q) ? '' : $result,
        ]);
    }

}
