<?php

namespace App\Http\Controllers;
use App\Http\Resources\CompanyCollection;
use Illuminate\Http\Request;
use App\files;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

// file controller
class FileController extends Controller
{
    public function index()
    { // fileCollection converts to array
        return new FileCollection(files::all());
    }

    public function create(Request $request)
    {
        // check to ensure that its a valid file extension 
      //  $rules = array(
       //         'file' => 'required|mimes:doc,docx',
     //   );
   
     //   $validator = Validator::make(, $rules);

     //   if($validator->fails())
    //    {
     //       return Redirect::to('/files/upload')->withErrors($validator);
     //   }

      //  else
      //  {
            $f = $request->file('file');
            $name = 'testing'; 
            // stores the file at storage/app
            Storage::disk('local')->put($name, $f);
            $path = Storage::url($name);
            $file = new files([
                'fileName' => $name,
                'filePath' => $path, 
                'userId' => 0
            ]);
            $file->save();
            return response()->json('successfully added new file');
            
       // }
    }
}