<?php

namespace App\Http\Controllers\Payment;

use App\Management;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PaymentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return $this->showAll($payments);
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
            'price_plan'  => 'required',
            'total_paid'  => 'required',
            'total'       => 'required',

        ];
        $this->validate($request, $reglas);

        $campos = $request->all();
        if (!$campos['debt'] = null ){
            $campos['status'] = Payment::PENDIENTE;
        }
        if ($campos['debt'] = null ){
            $campos['status'] = Payment::PAGADO;
            $campos['total_paid'] = $campos['total'];
        }
        $payments = Payment::create($campos);

      //  return $this->showOne($payments, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return $this->showOne($payment, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $reglas = [
            'customer_id' => 'required',
            'price_plan'  => 'required',
            'total_paid'  => 'required',
            'total'       => 'required',

        ];
        $this->validate($request, $reglas);
        if (!$payment->isDirty()) {
            return $this->errorResponse('Se debe especificar almenos un valor diferente para actualizar',422);
        }
        $payment->save();
        return $this->showOne($payment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
