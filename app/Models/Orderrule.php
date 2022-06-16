<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Orderrule
 *
 * @property int $id
 * @property int $order_id
 * @property int $article_id
 * @property int $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Article|null $article
 * @property-read \App\Models\Order|null $order
 * @method static \Database\Factories\OrderruleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderrule whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Orderrule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
