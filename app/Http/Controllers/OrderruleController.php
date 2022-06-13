<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderruleController extends Controller
{
    protected $orderrule_repo;

    public function __construct(OrderRepository $repository)
    {
        $this->order_repo = $repository;
    }
}
