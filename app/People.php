<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'email', 'firstname', 'streetname', 'housenumber', 'postalcode'
    ];
}
