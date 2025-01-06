<?php
namespace App\Http\Controllers\Dash;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $view_data['title'] = 'Dashboard';
        return view('admin.dashboard.index')->with($view_data);
    }
}
