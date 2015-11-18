<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Client extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'birth', 'address', 'phone'];


    public function getBirthAttribute($birth)
    {
        return Carbon::parse($birth)->format('d/m/Y');
    }

}
