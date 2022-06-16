<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderrule;
use App\Repositories\ArticleRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ShoppingListRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    private OrderRepository $order_repo;
    private ShoppingListRepository $shoppingList_repo;

    public function __construct(OrderRepository $orderRepository, ShoppingListRepository $shoppingListRepository)
    {
        $this->order_repo = $orderRepository;
        $this->shoppingList_repo = $shoppingListRepository;
    }

    public function index()
    {
        return view('orders.index', [
            'orders' => $this->order_repo->getForUser(auth()->user())
        ]);
    }

    public function create()
    {
        return view('orders.create', [
            'order' => new Order,
        ]);
    }

    public function store(Request $request)
    {
        //TODO: Make it so you cant make 2 orders for the same date.
        $shoppingList = $this->shoppingList_repo->firstOrCreate([
            'date' => $request->get('date'),
        ]);

        $orderParameters['user_id'] = auth()->user()->id;
        $orderParameters['shopping_list_id'] = $shoppingList->id;

        $this->order_repo->store($orderParameters);


        return redirect(route('orders.index'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order,
            'orderRules' => $order->orderrules,
            'shoppingList' => $order->shoppingList,
        ]);
    }

    public function update(Order $order, Request $request)
    {
        $shoppingList = $this->shoppingList_repo->firstOrCreate([
            'date' => $request->get('date'),
        ]);

        $orderParameters['shopping_list_id'] = $shoppingList->id;

        $this->order_repo->update($order, $orderParameters);


        return redirect(route('orders.index'));
    }

    public function addArticleToOrder(Order $order)
    {
        $allArticles = [];
        foreach (App::make(ArticleRepository::class)->get() as $article){
            $allArticles[$article->id] = $article->name;
        }

        return view('orders.add_article_to_order', [
            'order' =>  $order,
            'orderRule' => new Orderrule,
            'articles' => $allArticles
        ]);
    }

    public function storeOrderrule(Order $order, Request $request)
    {
        $parameters = $request->collect()->toArray();
        $parameters['order_id'] = $order->id;

        if (
            (Orderrule::query()
                ->where('order_id', $order->id)
                ->where('article_id', $request->get('article_id'))
                ->get()
            )?->count() === 1
        ){
            $orderRule = Orderrule::query()
                ->where('order_id', $order->id)
                ->where('article_id', $request->get('article_id'))
                ->first();
            $this->order_repo->updateAmount($orderRule, $orderRule->amount + $request->get('amount'));
        }
        else {
            $this->order_repo->addArticleToOrder($parameters);
        }

        return redirect(route('orders.index'));
    }

    public function removeArticleFromOrder(Orderrule $orderrule, Request $request)
    {
        $this->order_repo->removeArticleFromOrder($orderrule);

        return redirect(route('orders.index'));
    }

    public function destroy(Order $order, Request $request)
    {
        if ($order->can_delete){
            $this->order_repo->destroy($order);
        }

        return redirect(route('orders.index'));
    }
}
