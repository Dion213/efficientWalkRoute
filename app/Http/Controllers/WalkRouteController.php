<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Department;
use App\Models\Order;
use App\Models\ShoppingList;
use App\Models\WalkRoute;
use App\Repositories\ArticleRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\RuleRepository;
use App\Repositories\ShoppingListRepository;
use App\Repositories\WalkrouteRepository;
use Illuminate\Support\Collection;

class WalkRouteController extends Controller
{
    protected $walkroute_repo;
    protected $rule_repo;
    protected $shoppinglist_repo;
    protected $article_repo;
    protected $department_repo;

    public function __construct(WalkrouteRepository $repository, RuleRepository $ruleRepository, ShoppingListRepository $shoppingListRepository, ArticleRepository $articleRepository, DepartmentRepository $departmentRepository)
    {
        $this->walkroute_repo = $repository;
        $this->rule_repo = $ruleRepository;
        $this->shoppinglist_repo = $shoppingListRepository;
        $this->article_repo = $articleRepository;
        $this->department_repo = $departmentRepository;
    }
    //TODO: Something goes wrong with the walkroute, fix it
    public function show(ShoppingList $shoppingList)
    {
        if (($walkRoute = WalkRoute::whereShoppingListId($shoppingList->id)->first()) === null){
            $this->create($shoppingList);
            $walkRoute =  WalkRoute::whereShoppingListId($shoppingList->id)->first();
        }

        $walkRouteInGoodOrder = $this->setCorrectOrder($walkRoute);

        return view('walkroutes.show',[
            'walkRoute' => $walkRouteInGoodOrder,
            'date' => $shoppingList->date->format('l d-m-Y'),
        ]);
    }

    public function create(ShoppingList $shoppingList)
    {
        //Get all articles and amount in collection
        $allArticles = collect();

        foreach ($shoppingList->orders as $order){
            foreach ($order->orderrules as $orderrule){
                $allArticles->put($orderrule->article->id, (($allArticles->get($orderrule->article->id ?? null) + $orderrule->amount)));
            }
        }

        $this->createWalkRoute($allArticles, $shoppingList);

//          Create an array with changes, place everything that has to be changed in here to create the walkroute.
//        if (count($changes) === 0){
//            return view('walkroutes.show', [
//                'walkroute' => $this->createWalkroute($allArticles)
//            ]);
//        }
//        else{
//            return $changes;
//        }

        return redirect(route('walkroute.show', [
            'shopping_list' => $shoppingList,
        ]));
    }

    private function createWalkRoute(Collection $articles, ShoppingList $shoppingList): WalkRoute
    {
        $walkroute = [];
        foreach ($articles as $article_id => $amount) {
            $article = $this->article_repo->findOrFail($article_id);
            $department = $article->department;

            $walkroute[$department->id][$article->id] = $amount;
        }

        return $this->walkroute_repo->create([
            'route' => $walkroute,
            'shopping_list_id' => $shoppingList->id,
        ]);
    }

    private function controlRules(Collection $articles)
    {

        // TODO: Get all rules for these articles
//        $rules = $this->rule_repo->getRulesForArticles(array_keys($allArticles));
//        $rules = collect();
//        foreach ($allArticles as $article){
//            $rules = $this->article_repo->getRules();
//        }

//         TODO: Loop through the rules


//         TODO: Save required changes
//        $changes = [];
//        foreach ($rules as $rule){
//            if (($change = $this->$rule->type()) !== false){
//            if (($change = $this->rules_controller->{$rule->type}()) !== false){
//                $changes[] = $change;
//            }
//        }
    }

    private function setCorrectOrder(WalkRoute $walkroute): array
    {
        $correctOrder = [];
        foreach ($walkroute->route as $department_id => $articles){
            $department = $this->department_repo->findOrFail($department_id);
            $correctOrder[$department->order] = [
                'departmentName' => $department->name,
            ];

            foreach ($articles as $article_id => $amount){
                $article = $this->article_repo->findOrFail($article_id);
                $correctOrder[$department->order]['articles'][] = [
                    'name' => $article->name,
                    'amount' => $amount,
                ];
            }
        }

        ksort($correctOrder);
        return $correctOrder;
    }

    public function destroy(ShoppingList $shoppingList)
    {
        if ($shoppingList->can_delete){
            $this->shoppinglist_repo->destroy($shoppingList);
        }

        return redirect(route('shopping-list.index'));
    }
}
