<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 5/15/2019
 * Time: 0:34
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $start_date = request('start_date');
        $end_date = request('end_date');
        $order = Order::where('payed',1);
        $users = User::select('id');

        $filter_by_date ="";
        if($start_date && $end_date)
        {
            $filter_by_date = " and (orders.created_at BETWEEN {$start_date} and {$end_date})";
            $order->whereBetween('created_at',[date($start_date),date($end_date)]);
            $users->whereBetween('created_at',[date($start_date),date($end_date)]);
        }

        $this->data['orders'] = $order->count();
        $this->data['users'] = $users->count();
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['views'] = Material::sum('view');
        $this->data['like'] = Material::sum('like');
        $this->data['field']['start_name'] = 'start';
        $this->data['field']['end_name'] = 'end';
        $this->data['field']['label'] = 'range';
        $this->data['categories'] = Category::where('depth',1)
            ->select('categories.*',
                DB::raw("(Select COUNT(orders.id) From orders 
                Where orders.category_id = categories.id and orders.payed = 1{$filter_by_date}) as orders"),
                DB::raw("(Select SUM(orders.price) From orders 
                Where orders.category_id = categories.id and orders.payed = 1{$filter_by_date}) as total"),
                DB::raw('SUM(materials.view) as views'),
                DB::raw('SUM(materials.like) as likes'))
            ->leftJoin('materials','categories.id','=','materials.category_id')
            ->groupBy('categories.id')
            ->get();

        return view('backpack::dashboard', $this->data);
    }

    public function cat_stats($cat_id){
        $start_date = request('start_date');
        $end_date = request('end_date');
        $filter_by_date ="";
        if($start_date && $end_date)
            $filter_by_date = " and (orders.created_at BETWEEN {$start_date} and {$end_date})";

        $category = Category::findOrfail($cat_id);
        $materials= Material::where('category_id',$cat_id)
            ->select('materials.title','materials.view','materials.like',
                DB::raw("(Select COUNT(orders.id) From orders 
                Where orders.material_id = materials.id and orders.payed = 1{$filter_by_date}) as orders"),
                DB::raw("(Select SUM(orders.price) From orders 
                Where orders.material_id = materials.id and orders.payed = 1{$filter_by_date}) as total"))
            ->get();
        return view('vendor.backpack.material_stats')
            ->with(['category' => $category, 'materials' => $materials]);
    }
}
