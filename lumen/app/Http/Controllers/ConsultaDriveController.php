<?php

namespace App\Http\Controllers;

use App\Services\Implementation\ConsultaDriveServiceImpl;
use Illuminate\Http\Request;

class ConsultaDriveController extends Controller
{
    private $consultaDriveService;

    private $request;

    public function __construct(ConsultaDriveServiceImpl $consultaDriveService, Request $request)
    {
        $this->consultaDriveService = $consultaDriveService;
        $this->request = $request;
    }

    function postConsulta()
    {

        return $this->consultaDriveService->postConsulta();
    }
    function getConsulta()
    {

        return $this->consultaDriveService->getConsultaFileGetContents();
    }
}
