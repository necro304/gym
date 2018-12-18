<?php

namespace App\Http\Controllers\Management;

use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ManagementController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements = Management::all();

        return $this->showAll($managements);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'customer_id' => 'required',
            'm_arm'       => 'required',
            'm_leg'       => 'required',
            'm_waist'     => 'required',
            'weight'      => 'required',
            'imc'         => 'required'
        ];
        $this->validate($request, $reglas);
        $campos = $request->all();
        $management = Management::create($campos);
        return $this->showOne($management, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        return $this->showOne($management, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        $reglas = [
            'customer_id' => 'required',
            'm_arm'       => 'required',
            'm_leg'       => 'required',
            'm_waist'     => 'required',
            'weight'      => 'required',
            'imc'         => 'required'
        ];
        $this->validate($request, $reglas);

        if (!$management->isDirty()){
            return $this->errorResponse('Se debe especificar almenos un valor diferente para actualizar',422);
        }

        $management->update();

        return $this->showOne($management, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        $management->delete();
        return $this->showOne($management, 200);
    }
}
