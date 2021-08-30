<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lname extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ltype_id', 'lgroup_id', 'unit', 'is_debit'
    ];
}
