<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Encuesta\PostEncuesta;

class EncuestaController extends Controller
{
    public function store(Request $request)
    {
        $requestTotal = $request->all();
        $encuesta = Encuesta::create([
            'pregunta1' => json_encode($requestTotal['pregunta1'], JSON_UNESCAPED_UNICODE),
            'pregunta2' => json_encode($requestTotal['pregunta2'], JSON_UNESCAPED_UNICODE),
            'pregunta3' => json_encode($requestTotal['pregunta3'], JSON_UNESCAPED_UNICODE),
            'pregunta4' => $requestTotal['pregunta4'],
            'pregunta5' => json_encode($requestTotal['pregunta5'], JSON_UNESCAPED_UNICODE),
            'pregunta6' => $requestTotal['pregunta6'],
            'pregunta7' => json_encode($requestTotal['pregunta7'], JSON_UNESCAPED_UNICODE),
            'pregunta8' => $requestTotal['pregunta8'],
            'pregunta9' => $requestTotal['pregunta9'],
        ]);
        return response()->json($encuesta);
    }

    public function getEncuestas()
    {
        $encuestas = Encuesta::all();
        foreach ($encuestas as $encuesta) {
            $encuesta["pregunta1"] = json_decode($encuesta["pregunta1"]);
            $encuesta["pregunta2"] = json_decode($encuesta["pregunta2"]);
            $encuesta["pregunta3"] = json_decode($encuesta["pregunta3"]);
            $encuesta["pregunta4"] = ($encuesta["pregunta4"]);
            $encuesta["pregunta5"] = json_decode($encuesta["pregunta5"]);
            $encuesta["pregunta6"] = ($encuesta["pregunta6"]);
            $encuesta["pregunta7"] = json_decode($encuesta["pregunta7"]);
            $encuesta["pregunta8"] = ($encuesta["pregunta8"]);
            $encuesta["pregunta9"] = ($encuesta["pregunta9"]);
        }
        return response()->json($encuestas);
    }

    public function getDashboard()
    {
        $response = collect();
        $pregunta1["labels"] = [
            'Estas emprendiendo en una área STEM',
            'Estas estudiando una carrera STEM',
            'Estas trabajando en una área STEM',
            'He estudiado una carrera STEM',
            'Voluntariado',
            'He investigado en una oportunidad el tema',
            'Me gustaría trabajar en un área STEM',
            'Te gustaría estudiar una carrera STEM'
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta1["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta1', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta1', 'like', '%' . $valor . '%')->count();
        }
        $pregunta1["series"] = $series;
        foreach ($pregunta1["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta1["porcentaje"] = $porcentaje;

        ////////////////////////////
        $pregunta2["labels"] = [
            'Agricultura',
            'Agronomía',
            'Artes',
            'Biología',
            'Biotecnología',
            'Comunicación digital y Tics ',
            'Electrónica',
            'Matemáticas',
            'Desarrollo',
            'Sistemas'
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta2["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta2', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta2', 'like', '%' . $valor . '%')->count();
        }
        $pregunta2["series"] = $series;
        foreach ($pregunta2["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta2["porcentaje"] = $porcentaje;
        ////////////////////////////////
        $pregunta3["labels"] = [
            'Ama de casa',
            'Buscando trabajo',
            'Investigadora',
            'Tengo un negocio propio (Emprendedora)',
            'Docente universitaria',
            'Docente secundaria',
            'Docente primaria',
            'Trabajando sector privado',
            'Desarrollo',
            'Sistemas',
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta3["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta3', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta3', 'like', '%' . $valor . '%')->count();
        }
        $pregunta3["series"] = $series;
        foreach ($pregunta3["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta3["porcentaje"] = $porcentaje;
        /////////////////////////////////////
        $pregunta4["labels"] = [
            'Si',
            'No'
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta4["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta4',  $valor)->count());
            $total += Encuesta::where('pregunta4', $valor)->count();
        }
        $pregunta4["series"] = $series;
        foreach ($pregunta4["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta4["porcentaje"] = $porcentaje;
        ////////////////////////////////
        $pregunta5["labels"] = [
            'Academia (docencia)',
            'Investigación',
            'Área administrativa o de gestión',
            'Área Operativa',
            'Área Docente',
            'Área Gerencial',
            'Ventas',
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta5["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta5', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta5', 'like', '%' . $valor . '%')->count();
        }
        $pregunta5["series"] = $series;
        foreach ($pregunta5["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta5["porcentaje"] = $porcentaje;
        ////////////////////////////////
        $pregunta6["labels"] = [
            'No',
            'No estoy segura',
            'Sí',
            'Si me gustaria pero yo soy un Hombre',
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta6["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta6', $valor)->count());
            $total += Encuesta::where('pregunta6',  $valor)->count();
        }
        $pregunta6["series"] = $series;
        foreach ($pregunta6["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta6["porcentaje"] = $porcentaje;
        ////////////////////////////////////
        $pregunta7["labels"] = [
            'Capacitación',
            'Compartir información de interés (noticias, empleos, otras)',
            'Espacios físicos o virtuales para compartir experiencias',
            'oportunidades',
            'Innovación digital para dar a conocer mas la red',
            'Formación específica en áreas relacionadas con las STEM',
            'Compartir oportunidades de trabajo',
            'Creación de redes de intercambio, apoyo y aceleración',
            'Fomentar  alianzas con la empresa privada',
            'Oportunidades de emprender'
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta7["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta7', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta7', 'like', '%' . $valor . '%')->count();
        }
        $pregunta7["series"] = $series;
        foreach ($pregunta7["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta7["porcentaje"] = $porcentaje;
        ////////////////////////////////
        $pregunta9["labels"] = [
            'Ambato',
            'Atuntaqui',
            'Cayambe',
            'Cuenca',
            'Guayaquil',
            'Ibarra',
            'Quito',
            'Riobamba',
            'Santa Elena',
            'Tulcan',
            'Zaragoza',
        ];
        $series = array();
        $porcentaje = array();
        $total = 0;
        foreach ($pregunta9["labels"] as $valor) {
            array_push($series, Encuesta::where('pregunta9', 'like', '%' . $valor . '%')->count());
            $total += Encuesta::where('pregunta9', 'like', '%' . $valor . '%')->count();
        }
        $pregunta9["series"] = $series;
        foreach ($pregunta9["series"] as $cantidad) {
            if ($cantidad != 0) {
                array_push($porcentaje, ($cantidad * 100) / $total);
            } else {
                array_push($porcentaje, 0);
            }
        }
        $pregunta9["porcentaje"] = $porcentaje;
        //////////////////////////////////////////
        $response["pregunta1"] = $pregunta1;
        $response["pregunta2"] = $pregunta2;
        $response["pregunta3"] = $pregunta3;
        $response["pregunta4"] = $pregunta4;
        $response["pregunta5"] = $pregunta5;
        $response["pregunta6"] = $pregunta6;
        $response["pregunta7"] = $pregunta7;
        $response["pregunta9"] = $pregunta9;


        return response()->json($response);
    }

    public function delete($id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        return response()->json($encuesta);
    }
}
