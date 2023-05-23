<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Contact as UserResource;

class UserController extends BaseController
{
    public function index()
    {
        $products = Contact::all();

        return $this->sendResponse(UserResource::collection($products), 'Contatos totais.');

    }

    public function store(Request $request)

    {

      
        $input = $request->all();


        $validator = Validator::make($input, [

            'name' => 'required',

            'telefone' => 'required'

        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors(), 400);       

        }

   

        $product = Contact::create($input);

   

        return $this->sendResponse(new UserResource($product), 'Product created successfully.');

        

    } 

    public function show(Request $request)

    {


        $input = $request->all();

        $product = Contact::find($input['id']);

  
        if (is_null($product)) {

            return $this->sendError('Error', 'error', 400);

        }

   

        return $this->sendResponse(new UserResource($product), 'User por id.');

    }

    public function update(Request $request, Contact $product)

    {

        try {
            $input = $request->all();


        $validator = Validator::make($input, [

            'name' => 'required',
            'id' => 'required',
            'telefone' => 'required'

        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors(), 400);       

        }

        $product = Contact::find($input['id']);
   
        $product->name = $input['name'];

        $product->telefone = $input['telefone'];

        $product->save();

   

        return $this->sendResponse(new UserResource($product), 'Update realizado.');

        } catch (\Throwable $th) {
            return $this->sendError('Bad Request.', ['Adicone id válido'], 400);
        }
        

    }

    public function destroy(Request $request, Contact $product)

    {

        try {
            $input = $request->all();

            $product = Contact::find($input['id']);
    
            $product->delete();
    
       
    
            return $this->sendResponse([], 'Usuário deletado.');
    
        } catch (\Throwable $th) {
            return $this->sendError('Bad Request.', ['Adicone id válido'], 400);
        }
    }
}
