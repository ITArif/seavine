<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'bank_id', 'cheque_no', 'perticulers', 'voucher_type','voucher_date'
    ];
}
