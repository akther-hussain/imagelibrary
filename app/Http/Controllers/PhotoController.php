<?php

namespace App\Http\Controllers;

use App\Traits\ImageUpload;
use App\Models\Photo;
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
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'imageFile'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Check if a image has been uploaded
        if ($request->has('imageFile')) {
            $image = $request->file('imageFile');
            $name = str_slug($request->input('title'));
            $folder = '/uploads/images/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            $thumbUrl = $folder. '/thumbnails/' . $name . '.' . $image->getClientOriginalExtension();
            
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

            return redirect()->to('/');
        }        
    }

    /**
     * Display the selected browse image.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $photo = Photo::findOrfail($id);

        return view('pages.images.show', compact('photo'));
    }

}
