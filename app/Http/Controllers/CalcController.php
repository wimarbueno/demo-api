<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller {

    const PATTERN = '/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/';
    const PARENTHESIS_DEPTH = 10;

    public function calculate($input) {
        if (strpos($input, '+') != null || strpos($input, '-') != null || strpos($input, '/') != null || strpos($input, '*') != null) {
            //  Eliminar espacios en blanco y caracteres matemáticos no válidos
            $input = str_replace(',', '.', $input);
            $input = str_replace(' ', '', $input);
            $input = preg_replace('[^0-9\.\+\-\*\/\(\)]', '', $input);

            //  Calcula cada uno de los paréntesis desde la parte superior
            $i = 0;
            while (strpos($input, '(') || strpos($input, ')')) {
                $input = preg_replace_callback('/\(([^\(\)]+)\)/', 'self::callback', $input);

                $i++;
                if ($i > self::PARENTHESIS_DEPTH) {
                    break;
                }
            }

            //  Calcula el resultado
            if (preg_match(self::PATTERN, $input, $match)) {
                return $this->compute($match[0]);
            }

            return 0;
        }

        return $input;
    }

    private function compute($input) {
        $compute = create_function('', 'return ' . $input . ';');

        return 0 + $compute();
    }

    private function callback($input) {
        if (is_numeric($input[1])) {
            return $input[1];
        } elseif (preg_match(self::PATTERN, $input[1], $match)) {
            return $this->compute($match[0]);
        }

        return 0;
    }

    /**
     * Calculadora de expresiones matemáticas
     *
     * @param  \Illuminate\Http\Request  $request
     * @uso    Ejemplo de como pasar los valores con json, POST: {"expression": "-1 * (2 * 6 / 3)"}
     *         http://dominio.com/api/calc
     * @return JSON
     */
    public function calc(Request $request) {
        $expression = $request->input('expression');
        //$result = $this->calculate('-1 * (2 * 6 / 3)');
        $result = $this->calculate($expression);

        $array = [
            'result' => $result
        ];
        return response()->json($array, 200);
    }

    public function index() {
        return view('calc.index');
    }

}
