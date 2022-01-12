<?php

namespace App\Services\Implementation;

use App\Services\Interfaces\IConsultaDriveServiceInterface;

class ConsultaDriveServiceImpl implements IConsultaDriveServiceInterface
{
    function postConsulta()
    {
        $ID = "15KmP4dzb55d8sKafl8BcvIjmRcl3UVWp";
        /*         $n_hoja = "1666694880"; */
        $n_hoja = "1405788363";
        $URL_CONSULTA = "https://docs.google.com/spreadsheets/d/{id}/gviz/tq?tqx=out:json&gid={ws}";

        $url = str_replace('{id}', $ID, str_replace('{ws}', $n_hoja, $URL_CONSULTA));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        if (curl_exec($ch) === false) {
            echo 'Curl Error: ' . curl_error($ch);
        } else {
            $content  = curl_exec($ch);
            $content = substr($content, 47, -2);
            $content;

            $json = json_decode($content, true);

            $cop = $json["table"]["rows"];

            $datosJson = '[';

            for ($i = 5; $i < count($cop); $i++) {


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
            }
            $datosJson = substr($datosJson, 0, -1);

            $datosJson .=   ']';

            echo $datosJson;
        }
        curl_close($ch);
    }
    function getConsultaFileGetContents()
    {
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
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=   ']';

        echo $datosJson;
    }
    function fopenFreadConsulta()
    {
    }
}
