<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('calc.index');
    }

    /**
     * Calc
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calc(Request $request) {
        $expression = $request->input('expression');
         $name = $request->input('mj');
//        dd($request);
//        $msg = $expression;
        return response()->json([$name], 200);
    }

}
