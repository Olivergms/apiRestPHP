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
        ->json(Serie::create($request->all()), 201);
        //o request all só pode ser usado quando possui o atributo fillable localizado na classe serie
        // o fillable filtra somente as informações que estão no atributo

    }//fim metodo

    //metodo de busca pelo id da serie
    public function show(int $id){
        $serie = Serie::find($id);

        if(is_null($serie)){
            return response()->json('', 204);
        }
        return response()->json($serie);
    }

    //atualiza série
    public function update(int $id, Request $request){
        //busca serie no banco de dados referente ao id
        $serie = Serie::find($id);

        //se a serie não existir
        if(is_null($serie)){
            //retorna um json vazio com status de erro
            return response()->json(['erro'=> 'Recurso não encontrado'],404);
        }

        //preenche a serie com as informações da requisição
        $serie->fill($request->all());
        //salva serie
        $serie->save();
        Return $serie;

    }
}
