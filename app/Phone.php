<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    // Fields
    protected $fillable = [
        'id',
        'ddd',
        'number',
        'id_person'
    ];

    // Table name
    protected $table = 'phones';

    // Return the phone's owner
    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
