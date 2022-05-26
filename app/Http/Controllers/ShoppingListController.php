<?php

namespace App\Http\Controllers;

use App\Repositories\ShoppingListRepository;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public $shoppingList_repo;

    public function __construct(ShoppingListRepository $repository)
    {
        $this->shoppingList_repo = $repository;
    }

    public function index()
    {
        return view('shoppinglists.index', [
            'shoppingLists' => $this->shoppingList_repo->get(),
        ]);
    }
}
