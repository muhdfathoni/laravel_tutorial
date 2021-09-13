<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function index()
    {
        $persons = array(
            0 => array(
                "name" => "Peter Parker",
                "email" => "peterparker@mail.com",
                "date" => "2021-06-13 14:12:31",
                "status" => 1
            ),
            1 => array(
                "name" => "Clark Kent",
                "email" => "clarkkent@mail.com",
                "date" => "2021-06-10 12:32:31",
                "status" => 0
            ),
            2 => array(
                "name" => "Harry Potter",
                "email" => "harrypotter@mail.com",
                "date" => "2021-06-01 03:12:31",
                "status" => 1
            ),
            3 => array(
                "name" => "Spiderman",
                "email" => "spiderman@mail.com",
                "date" => "2021-01-01 00:12:31",
                "status" => 1
            )
        );

        return view('Array.index', compact('persons'));
    }
}
