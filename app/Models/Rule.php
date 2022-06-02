<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Rule
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property int $article_id
 * @property int|null $min_count_required
 * @property int|null $max_count_required
 * @property string|null $weekdays
 * @property string|null $not_available_from
 * @property string|null $not_available_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Article|null $article
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereMaxCountRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereMinCountRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereNotAvailableFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereNotAvailableUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereWeekdays($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\RuleFactory factory(...$parameters)
 * @property int|null $min_amount_required
 * @property int|null $max_amount_allowed
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereMaxAmountAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereMinAmountRequired($value)
 */
class Rule extends Model
{
    use HasFactory;

    public const MONDAY = 'Monday';
    public const TUESDAY = 'Tuesday';
    public const WEDNESDAY = 'Wednesday';
    public const THURSDAY = 'Thursday';
    public const FRIDAY = 'Friday';
    public const SATURDAY = 'Saturday';
    public const SUNDAY = 'Sunday';

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
