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
 * @property array $options
 * @method static \Illuminate\Database\Eloquent\Builder|Rule whereOptions($value)
 */

class Rule extends Model
{
    use HasFactory;

    //TODO: Vragen hoe je interface implementeert:
    // Target [App\Interfaces\Repository\RuleInterface] is not instantiable while building [App\Http\Controllers\RulesController].

    /* TODO: Validation for forms
     * $validator = \Validator::make($request->all(), [
     *       'name' => 'required',
     *       'club' => 'required',
     *       'country' => 'required',
     *       'score' => 'required',
     *   ]);
     */

    // TODO: Add removes to edit views, if I have extra time, check if it gets used, if not show delete button!

    // TODO: OrderManager maken, wat moet deze ookalweer doen? Orders aanmaken / aanpassen (logica uit OrderController halen en die in OrderManager zetten)
    // TODO: Routeberekening in lagenscheiding zetten en hierbij verwijzen naar de classes en interfaces.
    // TODO: Interface definieren, en goed toepassen
    // Kan interfaces extenden van base interface:
    /*
     *      public function all();
     *       public function find($id);
     *       public function findOrFail($id);
     *       public function findWith($id, $with);
     *       public function make($with = []);
     */

    // TODO: Options field toevoegen aan Rule, andere rule fields verwijderen.
    // Bijvoorbeeld: Type rule = Min_Max. Dan heb je array van options:
    // $options = [
    //     'min' => 2,
    //     'max' => 4,
    // ]
    //
    // In de RuleClasses staan getRules etc, hier krijg je die waardes binnen.

    protected $casts = [
        'options' => 'array',
    ];

    //Types
    public static $types = [
        'min_amount'            => 'Minimum amount',
        'weekdays'              => 'Only on certain weekdays',
        'not_available_period'  => 'Not available for a period',
    ];

    public const MIN_AMOUNT = 'min_amount';
    public const WEEKDAYS = 'weekdays';
    public const NOT_AVAILABLE_PERIOD = 'not_available_period';

    //Weekdays
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
