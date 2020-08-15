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
        $company = new company; 
        $name = $request->input('companyName')
    }

    // successfully remove a company
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}