<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Bio\StoreRequest;
use App\Http\Resources\Manager\BiographiCollection;
use App\Models\Manager\Biographi;
use Illuminate\Http\Request;

class BiographiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BiographiCollection(Biographi::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Biographi $biographi)
    {

        $images_title = $request->file('images_title');

        $file_path = md5(time()) . '.' . $images_title->getClientOriginalName();

        $file_save = $images_title->move(public_path('images/biographi/') , $file_path);

        $first_image = $request->file('first_image');
        $file_path = md5(time()) . '.'. $first_image->getClientOriginalName();
        $file_save = $first_image->move(public_path('images/biographi/') , $file_path);

        $seconde_image = $request->file( 'seconde_image');
        $file_path = md5(time()) . '.' . $seconde_image->getClientOriginalName();
        $file_save = $seconde_image->move(public_path('images/biographi/') , $file_path);

        $concert_image = $request->file('concert_image');
        $file_path = md5(time())  . '.' . $concert_image->getClientOriginalName();
        $file_save = $concert_image->move(public_path('images/biographi/') , $file_path);

        $bio = new Biographi();
        $bio->title = $request->title ;
        $bio->slug = $request->slug ;
        $bio->tags = $request->tags ;
        $bio->images_title = $images_title ;
        $bio->name = $request->name ;
        $bio->last_name = $request->last_name ;
        $bio->coption_music = $request->coption_music ;
        $bio->first_image =  $first_image ;
        $bio->title_image = $request->title_image ;
        $bio->coption_two_music = $request->coption_two_music ;
        $bio->seconde_image =  $seconde_image ;
        $bio->title_two_image = $request->title_two_image ;
        $bio->license = $request->license ;
        $bio->concert_image = $concert_image;
        $bio->title_concert_image = $request->title_concert_image ;
        $bio->list_album = $request->list_album ;
        $bio->list_music = $request->list_music ;
        $bio->save();
        return response(['ok'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Manager\Biographi $biographi
     * @return \Illuminate\Http\Response
     */
    public function show(Biographi $biographi)
    {
        return $biographi ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Manager\Biographi $biographi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biographi $biographi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Manager\Biographi $biographi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biographi $biographi)
    {

//        $rezomes = Biographi::find($rezomes);
        $biographi->delete();
        return response(['ok'] , 200) ;
    }
}
