<?php

namespace App\Http\Controllers;
use App\Http\Resources\FileCollection;
use Illuminate\Http\Request;
use App\files;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use NcJoes\OfficeConverter\OfficeConverter;

// file controller
class FileController extends Controller
{
    public function index()
    { // fileCollection converts to array
        return new FileCollection(files::all());
    }

    public function pdf($id)
    {
        $file = files::where('id', $id)->get();
        
        return new FileResource(files::findOrFail($id));
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
            if($request->file('file') != null){
                $file = $request->file('file');
                $file_name = $file->getClientOriginalName();
                // stores the file at storage/app
                Storage::disk('local')->put($file_name, $file);
                $path = Storage::url($file_name);
                $newfile = new files([
                    'fileName' => $file_name,
                    'filePath' => $path, 
                    'userId' => 0
                ]);
                $newfile->save();
                return response()->json('successfully added new file');
            }
            else{
                 return $request->all();
            }
            
       // }
    }
}