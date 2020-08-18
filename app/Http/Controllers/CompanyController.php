<?php

namespace App\Http\Controllers;
use App\Http\Resources\CompanyCollection;
use Illuminate\Http\Request;
use App\company;
use App\tags;

// company is the model name
class CompanyController extends Controller
{
    public function index()
    {   // returns all companies as an array
        return new CompanyCollection(company::all());
    }

    public function create(Request $request)
    {
        // validate to ensure proper user input, if not returns error
        $validateData = $request->validate([
            'title' => 'required|max:255', 
            'body' => 'required', 
            'tags' => 'required'
        ]);
        
        // init the new company 
        $company = new company([
            'companyName' => $request->get('title'),
            'companyDescription' => $request->get('body'), 
            'userId' => 0
        ]);
        $company->save();
        
        // get all tags from the request
        $tags = $request->get('tags');

        // extra guard against no tags
        if(!empty($tags)) { // splits the tags based on comma
            $tagsSplit = array_filter(explode(',', $tags));
            foreach($tagsSplit as $tag){
                // if there isn't already a tag with that name - make a new one, 
                // allows for future sorting by tags
                $newTag = tags::firstOrCreate(['tagName' => $tag]);
                $newTag->save();
                $newTagId = $newTag->id; 
                $company->tags()->attach($newTagId);
            }
        }
        return response()->json('Successfully added new company');
    }

    // successfully remove a company - future capability 
    public function destroy($id)
    {
        company::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}