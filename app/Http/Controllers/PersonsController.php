<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function index()
    {
        $listPersons = Person::all();
        return view('persons.index', [
            'persons' => $listPersons
        ]);
    }
}
