<?php

namespace App\Http\Controllers;
use App\Http\Resources\CompanyCollection;
use App\company;
use Illuminate\Http\Request;

// company is the model name
class CompanyController extends Controller
{
    public function index()
    {
        return response(company::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $company = new company([
            'companyName' => $request->get('title'),
            'companyDescription' => $request->get('body'), 
            'userId' => 0
        ]);
        $company->save();

        return response()->json('successfully added');
    }

    // successfully remove a company
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}