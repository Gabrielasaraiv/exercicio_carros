<?php

namespace App\Service;

use App\Models\Carros;

class CarrosService 
{
    public function create(array $dados){
        $user = Carros::create([
            'marca'=> $dados['marca'],
            'modelo'=> $dados['modelo'],
            'ano'=> $dados['ano'],
            'placa'=> $dados['placa'],
            'tipo'=> $dados['tipo'],
            'valor'=> $dados['valor']
        ]);
        return $user;
    }

    public function getAll(){
        $carros = Carros::all();

        return [
            'status'=> true,
            'message'=> 'Pesquisa efeituada com sucesso',
            'data'=> $carros
        ];
    }

    public function findById($id){
        $carro = Carros::find($id);

        if($carro==null){
            return [
                'status'=> false,
                'message'=> 'Carro não encontrado'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Carro encontrado',
            'data'=>$carro
        ];
    }

    public function searchPlaca($placa){
        $carros = Carros::where('placa', 'like', '%' . $placa . '%')->get();
        if($carros->isEmpty()){
            return [
                'status'=> false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Carros encontrados',
            'data'=>$carros
        ];
    }

    public function searchAno($ano){
        $carros = Carros::where('ano', '=', $ano )->get();
        if($carros->isEmpty()){
            return [
                'status'=> false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Carros encontrados',
            'data'=> $carros
        ];
    }

    public function searchTipo($tipo){
        $carros = Carros::where('tipo', 'like', '%' . $tipo . '%')->get();
        if($carros->isEmpty()){
            return [
                'status'=> false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=>true,
            'message'=> 'Carros encontrados',
            'data'=> $carros
        ];
    }

    public function searchMarca($marca){
        $carros = Carros::where('marca', 'like', '%' . $marca . '%')->get();
        if($carros->isEmpty()){
            return [
                'status'=> false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Carros encontrados',
            'data'=>$carros
        ];
    }

    public function searchModelo($modelo){
        $carros=Carros::where('modelo', 'like', '%' . $modelo . '%')->get();
        if($carros->isEmpty()){
            return [
                'status'=> false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Carros encontrados',
            'data'=>$carros
        ];
    }

    public function searchValor($valor){
        $carros=Carros::where('valor', '>=', $valor )->get();
        if($carros->isEmpty()){
            return [
                'status'=>false,
                'message'=> 'Carros não encontrados'
            ];
        }

        return [
            'status'=>true,
            'message'=> 'Carros encontrados',
            'data'=> $carros
        ];
    }

    public function update(array $dados){
        $carro=Carros::find($dados['id']);

        if($carro==null){
            return [
                'status'=>false,
                'message'=> 'Carro não encontrado'
            ];
        }

        if(isset($dados['marca'])){
            $carro->marca = $dados['marca'];
        }

        if(isset($dados['modelo'])){
            $carro->modelo = $dados['modelo'];
        }

        if(isset($dados['ano'])){
            $carro->ano = $dados['ano'];
        }

        if(isset($dados['placa'])){
            $carro->placa = $dados['placa'];
        }

        if(isset($dados['tipo'])){
            $carro->tipo = $dados['tipo'];
        }

        if(isset($dados['valor'])){
            $carro->valor = $dados['valor'];
        }

        $carro->save();

        return [
            'status'=> true,
            'message'=> 'Atualizado com sucesso'
        ];
    }

    public function delete($id){
        $carro = Carros::find($id);

        if($carro == null){
            return [
                'status'=>false,
                'message'=> 'Carro não encontrado'
            ];
        }
        $carro->delete();

        return [
            'status'=>true,
            'message'=>'Carro deletado com sucesso'
        ];
    }
}