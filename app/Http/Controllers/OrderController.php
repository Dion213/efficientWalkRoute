<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $order_repo;

    public function __construct(OrderRepository $repository)
    {
        $this->order_repo = $repository;
    }

    public function index()
    {
        return view('orders.index', [
            'order' => $this->order_repo->get(),
        ]);
    }
}
