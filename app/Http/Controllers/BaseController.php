<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class BaseController{
    protected $classe;
    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page);
    }//fim metodo

    public function store(Request $request){

        return response()
        ->json(
            $this->classe::create($request->all()),
             201);
        //o request all só pode ser usado quando possui o atributo fillable localizado na classe serie
        // o fillable filtra somente as informações que estão no atributo

    }//fim metodo

    //metodo de busca pelo id da serie
    public function show(int $id){
        $recurso = $this->classe::find($id);

        if(is_null($recurso)){
            return response()->json('', 204);
        }
        return response()->json($recurso);
    }

    //atualiza série
    public function update(int $id, Request $request){
        //busca serie no banco de dados referente ao id
        $recurso = $this->classe::find($id);

        //se a serie não existir
        if(is_null($recurso)){
            //retorna um json vazio com status de erro
            return response()->json(['erro'=> 'Recurso não encontrado'],404);
        }

        //preenche a serie com as informações da requisição
        $recurso->fill($request->all());
        //salva serie
        $recurso->save();
        Return $recurso;
    }


    public function destroy(int $id){
        //metodo destroy remove a quantidade de series que ele conseguiu remover
        $qntRecursosRemovidos = $this->classe::destroy($id);

        if($qntRecursosRemovidos === 0){
            return response()->json(['erro'=> 'Recurso não encontrado'],404);
        }
        return response()->json('',204);
        }
}
