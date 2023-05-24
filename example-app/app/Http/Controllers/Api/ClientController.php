<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        if ($clients->count() > 0){
        return response()->json([
            'status' => 200,
            'clients' => $clients
        ], 200);
    }else{
        return response()->json([
            'status'=> 404,
            'message'=> 'No records Found'
        ], 404);
    }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'surname' => 'required|string|max:191',
            'e-mail' => 'required|e-mail|max:191',
            'phone' => 'required|digits:10'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()

            ], 422);
        }else{
            $client = Client::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'e-mail' => $request->email,
                'phone' => $request->phone
            ]);

            if($client){
                return response()->json([
                    'status' => 200,
                    'message' => "Client created successfully"
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => "something went wrong!"
                ], 500);
            }
        }
    }
    public function show($id)
    {

        $client = Client::find($id);
        if($client){

            return response()->json([
                'status' => 200,
                'client' => $client

            ], 200);

        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Client Found!"
               ],404);
        }

    }


    public function edit($id){
        $client = Client::find($id);
        if($client){

            return response()->json([
                'status' => 200,
                'client' => $client

            ], 200);

        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Client Found!"
               ],404);
        }


    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'surname' => 'required|string|max:191',
            'e-mail' => 'required|email|max:191',
            'phone' => 'required|digits:9',
        ]);

        if($validator->fails()){

            return response()->json([

                'status' => 422,
                'errors' => $validator->errors()

            ], 422);

        }else{
            $client = Client::find($id);



            if($client){
                $client -> update([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'e-mail' => $request->email,
                    'phone' => $request->phone,
                ]);
               return response()->json([
                'status' => 200,
                'message' => "Client Updated Successfully"
               ],200);

            }else{
                return response()->json([
                    'status' => 404,
                    'message' => "No Client Found!"
                   ],404);
            }

        }

    }
    public function delete($id)
    {
        $client = Client::find($id);
        if($client){

            $client->delete();

        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Client Found!"
               ],404);
        }
    }
}
