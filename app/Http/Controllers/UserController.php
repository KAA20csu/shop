<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('user.index');
    }

    public function getOrdersByUser(User $user) {
        $orders = $user->orders;
        $statuses = Order::STATUSES;
        return view('user.orders', compact('orders', 'statuses'));
    }
}
