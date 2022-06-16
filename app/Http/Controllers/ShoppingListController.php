<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Repositories\ShoppingListRepository;

class ShoppingListController extends Controller
{
    protected $shoppingList_repo;

    public function __construct(ShoppingListRepository $repository)
    {
        $this->shoppingList_repo = $repository;
    }

    public function index()
    {
        return view('shoppinglists.index', [
            'shoppingLists' => $this->shoppingList_repo->get()
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

    public function destroy(ShoppingList $shoppingList)
    {
        if ($shoppingList->can_delete){
            $this->shoppingList_repo->destroy($shoppingList);
        }

        return redirect(route('shopping-list.index'));
    }
}
