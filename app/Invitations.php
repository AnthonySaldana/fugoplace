<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitations extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'sent_by', 'sent_to', 'status'
    ];

}
