<?php

namespace App\Http\Controllers;

use App\Person;
use App\Phone;
use Illuminate\Http\Request;

class PersonsController extends Controller
{

    private $phones_controller;

    public function __construct(PhonesController $phones_controller)
    {
        $this->phones_controller = $phones_controller;
    }

    public function index()
    {
        $listPersons = Person::all();
        return view('persons.index', [
            'persons' => $listPersons
        ]);
    }

    public function newView()
    {
        return view('persons.new');
    }

    public function store(Request $request)
    {
        $person = Person::create($request->all());

        if ($request->ddd && $request->number) {

            $phone = new Phone();

            $phone->ddd = $request->ddd;
            $phone->number = $request->number;
            $phone->id_person = $person->id;

            // Store in phone controller
            $this->phones_controller->store($phone);
        }

        return redirect('/persons')->with('message', 'Saved!');
    }
}
