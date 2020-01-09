<?php

namespace App\Http\Controllers;

use App\Person;
use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonsController extends Controller
{

    private $phones_controller;
    private $person;

    public function __construct(PhonesController $phones_controller)
    {
        $this->phones_controller = $phones_controller;
        $this->person = new Person();
    }

    public function index($letter)
    {
        $listPersons = Person::indexLetter($letter);
        return view('persons.index', [
            'persons' => $listPersons,
            'flag' => $letter
        ]);
    }

    public function search(Request $request)
    {
        $persons = Person::search($request->search);
        return view('persons.index', [
            'persons' => $persons,
            'flag' => $request->search
        ]);
    }

    public function newView()
    {
        return view('persons.new');
    }

    public function save(Request $request)
    {

        // Recebe a validação, passando os params da request
        $validation = $this->validation($request->all());

        // Se houver falha na validação
        if ($validation->fails()) {
            // Redireciona para a view anterior, enviando os erros da validação e preenchendo
            // automaticamente os inputs com os dados da request
            return redirect()->back()->withErrors($validation->errors())->withInput($request->all());
        }

        $person = Person::create($request->all());

        if ($request->ddd && $request->number) {

            $phone = new Phone();

            $phone->ddd = $request->ddd;
            $phone->number = $request->number;
            $phone->id_person = $person->id;

            // Store in phone controller
            $this->phones_controller->save($phone);
        }

        return redirect('/persons')->with('message', 'Saved!');
    }

    public function removeView($id)
    {
        return view('persons.remove', [
            'person' => $this->getPerson($id)
        ]);
    }

    public function delete($id)
    {
        $this->getPerson($id)->delete();
        return redirect('/persons')->with('success', 'Removed!');
    }

    public function editView($id)
    {
        return view('persons.edit', [
            'person' => $this->getPerson($id)
        ]);
    }

    public function edit(Request $request)
    {
        // Recebe a validação, passando os params da request
        $validation = $this->validation($request->all());

        // Se houver falha na validação
        if ($validation->fails()) {
            // Redireciona para a view anterior, enviando os erros da validação e preenchendo
            // automaticamente os inputs com os dados da request
            return redirect()->back()->withErrors($validation->errors())->withInput($request->all());
        }

        $person = $this->getPerson($request->id);
        $person->update($request->all());
        return redirect('/persons');
    }

    protected function getPerson($id)
    {
        return $this->person->find($id);
    }
    
    private function validation($data)
    {

        $rules = [
            'name' => 'required|min: 3'
        ];

        if ( array_key_exists('ddd', $data) && array_key_exists('number', $data) ) {
            if ( $data['ddd'] || $data['number'] ) {
                $rules['ddd'] = 'required|size:2';
                $rules['number'] = 'required';
            }
        }

        $messages = [
            'name.required' => '"Name" field is required.'
        ];

        return Validator::make($data, $rules, $messages);
    }

}
