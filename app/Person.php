<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // Fields
    protected $fillable = [
        'id',
        'name'
    ];

    // Table name
    protected $table = 'persons';

    // Returns all the phones 
    public function phone()
    {
        return $this->hasMany(Phone::class, 'id_person');
    }
}
