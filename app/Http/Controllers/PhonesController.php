<?php

namespace App\Http\Controllers;

use App\Phone;
use Exception;
use Illuminate\Http\Request;

class PhonesController extends Controller
{
    public function save(Phone $phone)
    {  
        // Try to store the Phone's obj
        try {
            $phone->save();
        } catch (Exception $e) {
            return 'ERROR: '.$e->getMessage();
        }
    }
}
