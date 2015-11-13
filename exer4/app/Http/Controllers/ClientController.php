<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function showNew(){

        $clients = Client::all();

        return view('client.new')->with('clients', $clients);
    }

    public function showList(){

        $clients = Client::all();

        return view('client.list')->with('clients', $clients);
    }

    public function showEdit($id){

        $client = Client::find($id);

        return view('client.edit')->with('client', $client);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $request['created_at'] = Carbon::now();
        Client::create($request->all());
        return view('client.new')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function update($id, Request $request){
        $client = Client::find($id);

        $this->validate($request, [
            'name' => 'required',
            'birth' => 'required|date',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $client->name = $request['name'];
        $client->birth = $request['birth'];
        $client->address = $request['address'];
        $client->phone = $request['phone'];

        $client->save();

        return view('client.edit',['id'=>$client->id])->with(['success' => 'Cliente atualizado com sucesso!', 'client' => $client]);
    }

    public function destroy($id){
        $client = Client::find($id);
        $client->delete();
        $clients = Client::all();
        return view('client.list')->with(['success' => 'Cliente excluído com sucesso!', 'clients' => $clients]);
    }

}
