<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'author_id',
    ];
}
