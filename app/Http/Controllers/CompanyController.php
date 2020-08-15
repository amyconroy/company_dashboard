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
        $company = new company();
        $company->companyName = $request->input('companyName');
        $company->companyDescription = $request->input('companyDescription');
        $company->userId = $request->input('userId');
        $company->save();

        return response($company->jsonSerialize(), Response::HTTP_CREATED);
    }

    // successfully remove a company
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}