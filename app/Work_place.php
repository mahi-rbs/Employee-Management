<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_place extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Work_place';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
