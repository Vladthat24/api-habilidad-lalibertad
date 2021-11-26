<?php

namespace App\Http\Controllers;
use App\Services\Implementation\ConsultaServiceImpl;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    private $consultaService;

    private $request;

    public function __construct(ConsultaServiceImpl $consultaService, Request $request)
    {
        $this->consultaService=$consultaService;
        $this->request=$request;
    }

    function postConsultaPago(){
        $an_o=$this->request->an_o;
        $cop=$this->request->cop;
        return $this->consultaService->postConsulta($an_o,$cop);
    }
}
