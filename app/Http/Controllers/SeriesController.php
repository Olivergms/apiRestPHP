<?php
namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController{
    public function index()
    {
        return Serie::all();
    }//fim metodo

    public function store(Request $request){

        return response()
        ->json(Serie::create(['nome'=> $request->nome]), 201);
    }//fim metodo
}
