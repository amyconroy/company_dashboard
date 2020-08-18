<?php

namespace App\Http\Controllers;
use \CloudConvert\Laravel\Facades\CloudConvert;
use \CloudConvert\Models\Job;
use \CloudConvert\Models\Task;
use App\Http\Resources\FileCollection;
use Illuminate\Http\Request;
use App\files;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


// file controller
class FileController extends Controller
{
    public function index()
    { // fileCollection converts to array
        return new FileCollection(files::all());
    }

    public function pdf()
    {

        $cloudconvert = new CloudConvert(['api_key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjU0ODhiYWFiMGNlODU3ODk5ZjA0MjU5MmNiNzE3ZjYxNjE5MWMwMTBjNTNmZGU1MDFmZTg4MmI1Y2Q3NWY4MDg2YTI5MzM3ZDkxODVmZjEiLCJpYXQiOjE1OTc2OTE1MTcsIm5iZiI6MTU5NzY5MTUxNywiZXhwIjo0NzUzMzY1MTE3LCJzdWIiOiI0NDI0MTM3NSIsInNjb3BlcyI6WyJwcmVzZXQud3JpdGUiLCJwcmVzZXQucmVhZCIsIndlYmhvb2sud3JpdGUiLCJ3ZWJob29rLnJlYWQiLCJ0YXNrLndyaXRlIiwidGFzay5yZWFkIiwidXNlci53cml0ZSIsInVzZXIucmVhZCJdfQ.hyVfVJVrL1aRFMz_88jPesNzYoqegWD5ptsukYl2AB-AYhjxQ9RiKioPQrvo7spD9YB-oCQSpEG-RqQ5s6RgOqGJ0-gBGRqP9ZgRSjWJbD8vT1r4ZZgtiJcok-AEgIVGIJpY5YS-l2mL8ZPjbDsSJs0AY3xnszzs3HQ_D5GmGPJ3lPd7TefR5RjHy73wU00EBGcMKYlJIfaiUPt4bOA77HYFFBJ9bGV8Zd_HlTNJp861yJIbG1z5eQPV_tCQ3Km_KGj38bAgNQpa9Me0vqZssSBfRsY_9Vyc-gYNslBAIsTYzi7xcRISg8qGil_W3VEhOLYl077sJ8FL02ME-FEOnSg2QSxwdUnOwqdCcmDZgs8Bc1RDG4wgBCpwkbhr7n5Wa6yt_phpdnmKKfm-QvrzAweXmhVSM1eLeWkrT4gvH8Qqn7ypPst1kiW7KPvE6mFn0GDj7BKxUcjJ-MHIHEOt1CoAL4wL0APL0VCwvvzGT4yGt5sj6HFS6KIpQytlwmH-mP9CWoWdxPiQjTd7cjvcFBkTK_K7jDy45yHvkwYMTRPmi4tt0owQnWwq6sXw7jQfkeQuvG0FHjNZhPykM7ivqRSMjErDshbUSYCZnv34HhuzFYPDLO1ZD3VifvcZ0lY_gO8rpzXDcbMuxWspOEQS0Nz27vfBOwGzbHnRvYchJ6o']);
        $inputStream = Storage::path('disclaimer.doc');

        $job = CloudConvert::jobs()->create((new Job())
            ->addTask(
                (new Task('import/upload', 'upload-my-file'))
                    ->set('url', 'storage/disclaimer.doc')
                )
            ->addTask(
                (new Task('convert', 'convert-my-file'))
                    ->set('output_format', 'pdf')
                    ->set('input', 'upload-my-file')
                )
            ->addTask(
                (new Task('export/url', 'export-my-file'))
                    ->set('input', 'convert-my-file')
                    ->set('inline', True)
                    ->set('archive_multiple_files', False)
            )
        );
    
        $uploadTask = $job->getTasks()->name('upload-my-file')[0];

        CloudConvert::tasks()->upload($uploadTask, $inputStream);
        CloudConvert::jobs()->wait($job); 

        foreach ($job->getExportUrls() as $file) {

            $source = $cloudconvert->getHttpTransport()->download($file->url)->detach();
            $dest = fopen(Storage::path('out/' . $file->filename), 'w');
        
            stream_copy_to_stream($source, $dest);
        }

    }

    public function create(Request $request)
    {
        // validate to ensure proper user input, if not returns error - doc and docx files allowed
        $validateData = $request->validate([
            'file' => 'required|mimes:doc,docx'
        ]);

        // ensure that the file is not empty
        if($request->file('file') != null){
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            // stores the file at storage/app locally - can scale to AWS storage, same method
            Storage::disk('local')->put($file_name, file_get_contents($file));
            $path = Storage::disk('local')->path($file_name);
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
    }
}