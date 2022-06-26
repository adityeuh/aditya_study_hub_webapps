<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transactions = Transaction::latest()->paginate(10);
        $transactions = Transaction::join('rooms', 'rooms.id', '=', 'transactions.room_id')->get(['transactions.*', 'rooms.name as room_name']);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create', [
            'rooms' => Room::orderBy('id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $prefixCode = 'TRS';
        $centerCode = date('ymdHis');
        $code = $prefixCode . $centerCode;

        $data['code'] = strtoupper($code);
        $data['date'] = date('Y-m-d');
        $data['customer_name'] = strtoupper($request->input('customer_name'));
        $data['price'] = preg_replace("/[^0-9]/", "", $request->input('price'));
        $data['discount'] = preg_replace("/[^0-9]/", "", $request->input('discount'));
        $data['total'] = preg_replace("/[^0-9]/", "", $request->input('total'));
        $data['room_id'] = $request->input('room_id');
        $data = array_merge($data, $request->only('note',  'customer_phone'));
        // \print_r($data);
        // exit;
        Transaction::create($data);

        $room = Room::find($data['room_id']);
        $room->status = 'ISI';
        $room->save();

        return redirect()->route('transactions.index')
            ->withSuccess(__('Transaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::join('rooms', 'rooms.id', '=', 'transactions.room_id')->where('transactions.id', $id)->get(['transactions.*', 'rooms.name as room_name']);

        return view('transactions.show', [
            'transaction' => $transaction[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => $transaction,
            'rooms' => Room::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {

        $data['customer_name'] = strtoupper($request->input('customer_name'));
        $data['price'] = preg_replace("/[^0-9]/", "", $request->input('price'));
        $data['discount'] = preg_replace("/[^0-9]/", "", $request->input('discount'));
        $data['total'] = preg_replace("/[^0-9]/", "", $request->input('total'));
        $data['room_id'] = $request->input('room_id');
        $data = array_merge($data, $request->only('note', 'customer_phone'));

        $roomUpdate = false;
        $roomUpdateId = 0;
        if ($transaction->room_id != $data['room_id']) {
            $roomUpdateId = $transaction->room_id;
            $roomUpdate = true;
        }

        $transaction->update($data);

        if ($roomUpdate) {
            $room = Room::find($roomUpdateId);
            $statusRoom['status'] = 'KOSONG';
            $room->status = 'KOSONG';
            $room->save();

            $room = Room::find($data['room_id']);
            $room->status = 'ISI';
            $room->save();
        }

        return redirect()->route('transactions.index')
            ->withSuccess(__('Transaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {

        $room_id = $transaction->room_id;
        $transaction->delete();
        $room = Room::find($room_id);
        $room->status = 'KOSONG';
        $room->save();
        return redirect()->route('transactions.index')
            ->withSuccess(__('Transaction deleted successfully.'));
    }

    public function getRoom($id)
    {

        $room = DB::table('rooms')->where('id', $id)->where('status', '!=', 'ISI')->first();

        if ($room) {
            return response()->json(['msg' => 'Success', 'data' => $room]);
        } else {
            return response()->json(['msg' => 'Error', 'data' => $room]);
        }
    }

    public function print($id)
    {
        $transaction = Transaction::join('rooms', 'rooms.id', '=', 'transactions.room_id')->where('transactions.id', $id)->get(['transactions.*', 'rooms.name as room_name']);

        return view('transactions.print', [
            'transaction' => $transaction[0]
        ]);
    }
}
