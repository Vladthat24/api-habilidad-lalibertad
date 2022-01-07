<?php

namespace App\Services\Implementation;

use App\Services\Interfaces\IConsultaDriveServiceInterface;

class ConsultaDriveServiceImpl implements IConsultaDriveServiceInterface
{
    function postConsulta()
    {
        /*         $ID = "1mHryhvkoLbCRsr2KWe57H7PZyWLkbpk2";
        $n_hoja = "1318817910"; */

        $ID = "1mHryhvkoLbCRsr2KWe57H7PZyWLkbpk2";
        $n_hoja = "1666694880";
        $URL_CONSULTA = "https://docs.google.com/spreadsheets/d/{id}/gviz/tq?tqx=out:json&gid={ws}";

        $url = str_replace('{id}', $ID, str_replace('{ws}', $n_hoja, $URL_CONSULTA));
        $content = file_get_contents($url);
        $content = substr($content, 47, -2);
        $content;

        $json = json_decode($content, true);

        $cop = $json["table"]["rows"];

        $datosJson = '[';

        for ($i = 5; $i < count($cop); $i++) {
            /* echo "Numero:" . $i . "\n"; */

            $datos_cop = json_encode($cop[$i]["c"][1]["f"]);
            $estado = json_encode($cop[$i]["c"][3]["v"]);
            $ap_paterno = json_encode($cop[$i]["c"][6]["v"]);
            $ap_materno = json_encode($cop[$i]["c"][7]["v"]);
            $nombres = json_encode($cop[$i]["c"][8]["v"]);

            $datosJson .= '{
                "n_cop": ' . $datos_cop . ',
                "estado":' . $estado . ',
                "ap_paterno":' . $ap_paterno . ',
                "ap_materno":' . $ap_materno . ',
                "nombres":' . $nombres . '
            },';
            /*             $datos_array = array(
                'n_cop' => substr($datos_cop, 1, -1),
                'estado' => substr($estado, 1, -1),
                'ap_paterno' => substr($ap_paterno, 1, -1),
                'ap_materno' => substr($ap_materno, 1, -1),
                'nombres' => substr($nombres, 1, -1)
            ); */
            /* echo json_encode($datos_array,JSON_FORCE_OBJECT); */
            /*             $array = '[{"n_cop" : "' . substr($datos_cop, 1, -1) . '",
                "estado":"' . substr($estado, 1, -1) . '",
                "ap_paterno":"' . substr($ap_paterno, 1, -1) . '",
                "ap_materno":"' . substr($ap_materno, 1, -1) . '",
                "nombres":"' . substr($nombres, 1, -1) . '"},'; */

            /*             $array = '[{"n_cop" : ' . substr($datos_cop, 1, -1) . '},';

            echo json_decode($array); */
            /*             echo response()->json(['n_cop' => "hola"]); */
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   ']';

        echo $datosJson;
    }
}
