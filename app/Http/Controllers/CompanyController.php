<?php

namespace App\Http\Controllers;
use App\Http\Resources\CompanyCollection;
use App\company;
use App\tags;
use App\companyTags;
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
               // init the new company 
        $company = new company([
            'companyName' => $request->get('title'),
            'companyDescription' => $request->get('body'), 
            'userId' => 0
        ]);
        $company->save();
        
        // get all tags from the request
        $tags = $request->get('tags');

        // guard against no tags
        if(!empty($tags)) {
            $tagsSplit = array_filter(explode(',', $tags));
            foreach($tagsSplit as $tag){
                $newTag = tags::firstOrCreate(['tagName' => $tag]);
                $newTag->save();
                $newTagId = $newTag->id; 
                $company->tags()->attach($newTagId);
            }
        }
        

        return response()->json('successfully added new company');
    }

    // successfully remove a company
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}