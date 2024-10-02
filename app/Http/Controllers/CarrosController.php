<?php

namespace App\Http\Controllers;

use App\Service\CarrosService;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    protected $carrosService;

    public function __construct(CarrosService $novoCarrosService)
    {
        $this->carrosService =  $novoCarrosService;
    }

    public function store(Request $request)
    {

        $user = $this->carrosService->create($request->all());

        return response()->json($user);
    }

    public function getAll()
    {
        $result = $this->carrosService->getAll();

        return response()->json($result);
    }

    public function findById($id)
    {
        $result = $this->carrosService->findById($id);
        return response()->json($result);
    }

    public function searchPlaca(Request $request)
    {
        $result = $this->carrosService->searchPlaca($request->placa);
        return response()->json($result);
    }

    public function searchAno(Request $request)
    {
        $result = $this->carrosService->searchAno($request->ano);
        return response()->json($result);
    }

    public function searchTipo(Request $request)
    {
        $result = $this->carrosService->searchTipo($request->tipo);
        return response()->json($result);
    }

    public function searchMarca(Request $request)
    {
        $result = $this->carrosService->searchMarca($request->marca);
        return response()->json($result);
    }

    public function searchModelo(Request $request)
    {
        $result=$this->carrosService->searchModelo($request->modelo);
        return response()->json($result);
    }

    public function searchValor(Request $request)
    {
        $result=$this->carrosService->searchValor($request->valor);
        return response()->json($result);
    }

    public function update(Request $request)
    {
        $result = $this->carrosService->update($request->all());
        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->carrosService->delete($id);
        return response()->json($result);
    }
}