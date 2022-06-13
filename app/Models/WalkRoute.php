<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\WalkRoute
 *
 * @property int $id
 * @property string $walkroute
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereWalkroute($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\WalkRouteFactory factory(...$parameters)
 * @property string $route
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereRoute($value)
 * @property int $shopping_list_id
 * @property-read \App\Models\ShoppingList|null $shoppingList
 * @method static \Illuminate\Database\Eloquent\Builder|WalkRoute whereShoppingListId($value)
 */
class WalkRoute extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'route' => 'array'
    ];

    public function shoppingList(): BelongsTo
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
