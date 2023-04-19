<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Resources\Manager\FileCollection;
use App\Models\Manager\Category;
use App\Models\Manager\File;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(File $file)
    {
        return new FileCollection(File::paginate());
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $fileimage = $request->file('image');
        $file_path = md5(time()) . '.' . $fileimage->getClientOriginalName();
        $file_save = $fileimage->move(public_path('images/file/image'), $file_path);

        $filealbum = $request->file('album');
        $file_path_album = md5(time()) . '.' . $filealbum->getClientOriginalName();
        $file_save_album = $filealbum->storeAs('file/album/', $file_path_album);

        $file_320 = $request->file('file_320');
        $file_path_file_320 = md5(time()) . '.' . $file_320->getClientOriginalName();
        $file_save_album = $file_320->storeAs('file/album/', $file_path_file_320);

        $file_120 = $request->file('file_120');
        $file_path_file_120 = md5(time()) . '.' . $file_120->getClientOriginalName();
        $file_save_album = $file_120->storeAs('file/album/', $file_path_file_120);

        $file_wav = $request->file('file_wav');
        $file_path_file_wav = md5(time()) . '.' . $file_wav->getClientOriginalName();
        $file_save_album = $file_wav->storeAs('file/album/', $file_path_file_wav);

        // $files = new File();
        // $files->name_persion = $request->name_persion;
        // $files->name_english = $request->name_english;
        // $files->name_music_persion = $request->name_music_persion;
        // $files->name_music_english = $request->name_music_english;
        // $files->image = $fileimage;
        // $files->album = $filealbum;
        // $files->file_320 = $file_320;
        // $files->file_120 = $file_120;
        // $files->file_wav = $file_wav;
        // $files->title = $request->title;
        // $files->slug = $request->slug;
        // $files->caption = $request->caption;
        // $files->tags = $request->tags;

        // $files->save();

        $data = $request->except('category');
        $data['image'] = $fileimage ;
        $data['album'] = $filealbum ;
        $data['file_320'] = $file_320 ;
        $data['file_120'] = $file_120 ;
        $data['file_wav'] = $file_wav ;
        $files = File::create($data);

        $files->categories()->sync(
            array_filter(collect($request->category)->pluck('key')->toArray())
        );
        return response(['ok'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Manager\File $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return $file ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Manager\File $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Manager\File $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return response(['ok'] , 200 );
    }

}
