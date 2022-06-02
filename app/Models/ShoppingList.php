<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\ShoppingList
 *
 * @property int $id
 * @property string $date
 * @property int|null $walkroute_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\WalkRoute|null $walkroute
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingList whereWalkrouteId($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\ShoppingListFactory factory(...$parameters)
 */
class ShoppingList extends Model
{
    use HasFactory;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function walkroute(): HasOne
    {
        return $this->hasOne(WalkRoute::class);
    }
}
