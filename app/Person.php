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
    public function phones()
    {
        return $this->hasMany(Phone::class, 'id_person');
    }

    public static function indexLetter($letter)
    {
        return static::where('name', 'LIKE', $letter.'%')->get();
    }

    public static function search($flag)
    {
        return static::where('name', 'LIKE', '%'.$flag.'%')->get();
    }
}
