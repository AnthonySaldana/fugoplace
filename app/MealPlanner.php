<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealPlanner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meal_planner';

    /**
    *   The primary key for this table
    *   @var string
    */
    protected $primaryKey = 'meal_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date','meal', 'recipe_id'
    ];
}
