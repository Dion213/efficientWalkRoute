<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function shoppingLists(): HasMany
    {
        //TODO: Check if this is correct, a shoppinglist has many orders but a order only belongs to 1 shoppinglist. Does there need to be a pivot?
        return $this->hasMany(ShoppingList::class);
    }
}
