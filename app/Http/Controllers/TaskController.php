<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
// use App\Models\image;
use DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $file = 'image', $directory = 'public/pictures')
    {
        foreach($request->image as $image)
        {
            if ($image)
            {
                if ($file = $request->file('image')) {
                $extension = $image->getClientOriginalName();
                $fileName  = $image . time() . md5($image) . rand(1111111111,9999999999). '.'  . $extension;
                if (!\Storage::exists($directory))
                {
                    $file_path=\Storage::makeDirectory($directory);
                }
                
                    $file_path=$image->store('public/pictures');
                    
                }
                $date = now();
                DB::table('images')->insert([
                    'image' => $file_path,
                    'date' => $date,
                ]);
            }

        }
        
        
        return redirect()->back()->with('success', 'Image uploaded successfully!');  
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = DB::table('images')->get();
        foreach($data as $d)
        {
            $image = Image::make(storage_path('app/'.$d->image));
            $image->text($d->date, 720 / 2, 20, function($font) {
            $font->size(700, 700);
            $font->color('#000');
            $font->align('center');
            $font->valign('center');
        });
        $image->save(storage_path('app/'.$d->image));
        
        }
        

        return view('task.showimage',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
