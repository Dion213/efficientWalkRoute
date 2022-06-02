<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $order_repo;

    public function __construct(OrderRepository $repository)
    {
        $this->order_repo = $repository;
    }

    public function index()
    {
        return view('orders.index', [
            'orders' => $this->order_repo->getForUser(auth()->user())
        ]);
    }

    public function create()
    {
        //
    }

    public function edit()
    {
        //
    }
}
