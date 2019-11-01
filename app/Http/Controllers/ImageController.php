<?php

namespace App\Http\Controllers;

use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Models\Image as Photo;

class ImageController extends Controller
{
    use ImageUpload;

    /**
     * List of images with pagination. Each page will contain 9 images
     */
    public function index() {

        $images = Photo::orderBy('created_at', 'DESC')->paginate(9);

        return view('pages.images.index', compact('images'));
    }

    public function show(Photo $image) {
        dd($image);
    }

    /**
     * Upload a new image
     */
    public function store(Request $request) {


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
            $response = $this->saveImage($image, $folder, $name, 'public');
            
            if($response != "") {
                $result = Photo::create([
                    'title' => $request->input('title'),
                    'path' => $filePath,
                    'description' => '',
                    'file_size' => '2mb'                    
                ]);

                if($result) {
                    return redirect()->route('home')->with(['status' => 'Image updated successfully.']);
                } else {
                    return redirect()->route('home')->with(['status' => 'Uploding image unsuccessful.']);
                }
            }
        }        

        // $data = [
        //     'title' => 'Landmark',
        //     'description' => 'text here',
        //     'path' => 'images/landmark.png',
        //     'file_size' => '2mb'
        // ];

        // $image = Image::create($data);

        // dd($image);

    }

}
