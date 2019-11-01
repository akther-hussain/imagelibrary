<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotos;
use App\Traits\ImageUpload;
use App\Models\Photo;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    use ImageUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $photos = Photo::orderBy('created_at', 'DESC')->paginate(9);

        return view('pages.images.index', compact('photos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhotos $request)
    {
        
        // Check if a image has been uploaded
        if ($request->has('imageFile')) {
            
            try {
                $image = $request->file('imageFile');
                $name = str_slug($request->input('title'));
                $folder = '/uploads/images/';
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                $thumbUrl = $folder . '/thumbnails/' . $name . '.' . $image->getClientOriginalExtension();

                // call trait saveImage to upload image
                $response = $this->saveImage($image, $folder, $name);

                if ($response != "") {
                    $result = Photo::create([
                        'title' => $request->input('title'),
                        'file_path' => $filePath,
                        'thumb_url' => $thumbUrl
                    ]);

                    if ($result) {
                        flash('Image uploaded successfully.')->success();
                    } else {
                        flash('Something went wrong. Please try again.')->error();
                    }
                }
            } catch (Exception $e) {
                Log::wanring($e);
            }

            return redirect()->to('/');
        }        
    }

    /**
     * Display the selected browse image.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {    
        return view('pages.images.show', compact('photo'));
    }

}
