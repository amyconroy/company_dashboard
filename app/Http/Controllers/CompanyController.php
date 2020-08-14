<?php

namespace App\Http\Controllers;
use App\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return response(company::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        // the following validates to ensure that user includes company name
        $rules = [
            'companyName' => 'required|string|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('insert')
            -> withInput()
            -> withErrors($validator);
        }
    }

    // successfully remove a company
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}