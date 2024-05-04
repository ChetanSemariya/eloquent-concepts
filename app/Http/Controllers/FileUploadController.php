<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fileUploads = FileUpload::all();
        return view('fileUpload.file_upload', compact('fileUploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        
        $request->validate([
            // 'photo' => 'required|image' // only image file upload
            // 'photo' => 'required|mimes:png,jpg,jpeg|max:3000|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'  // specifically image validation applied
            'photo' => 'required|mimes:png,jpg,jpeg|max:3000' 
        ]);


        /* -------------- STORE METHOD IN LARAVEL --------------- */

        // $path = $request->file('photo')->store('image','local'); // directly stored in storage/app/image and it is more secured folder isse hum image ko read nahi krskte.
        
        // $path = $request->file('photo')->store('image','public'); // store method mai image 2 types se save hoti hai local or public and ise second parameter mai define krte hai. If we select local then image storage k andar app k andar show hogi jo ki private rahegi we cant access easily that's why hum image ko publically define krte hai and use storage folder k andar app/public/created_folder mai save karate hai jisse use easily retrieve krske.
        // 2). store method image ko hash form mai store krwata hai jisse hacker use decrypt nahi krske


        /** ------------ STOREAS METHOD IN LARAVEL --------------- */
        // $fileName = time(). '_'. $file->getClientOriginalName(); // time lene ka purpose yhh hai ki agar same name ki image upload krte hai to purani vali image update hojati hai to iss problem k solution k liye hum time le lelete hai jisse same image bhi alg alg time pr upload hogi.
        // $path = $request->photo->storeAs('image', $fileName, 'public'); // storeAs ko use krne ka benifit yhh hai ki isme hum apna image ka name define krskte hai as a second parameter
        // return $path;

        /* -------  More Inbuilt image functions in laravel -------- */
        // $file = $request->file('photo');
        // $extension = $file->getClientOriginalExtension(); // hackers can easily tampered with getClientOriginalExtension so isse bachne k liye laravel mai ek or type ka extension aata hai extension jo secure hota hai


        /* ------- EXTENSION METHOD ---------- */
        // $extension = $file->extension(); // more secure extension in laravel Because agar hacker extension mai tampering krta hai tab bhi yhh hume ek dum correct extension hi deta hai
        // $extension = $file->hashName(); // image k name ko hash form mai convert krdeta hai hashName function
        // $extension = $file->getClientMimeType(); // FILE Ka type pata krna hai kya hai . image hai video hai yaa pdf hai to uske liye iss method ka use kiya jata hai 
        // $extension = $file->getSize(); // To check the size of our uploaded file. Size is in bytes here
        
        // return $extension;

        /* ---- IMAGE SAVE IN DATABASE With the help of Store method  ------ */
        // $file = $request->file('photo');
        // $path = $request->photo->store('image','public');

        // FileUpload::create([
        //     'file_name' => $path,
        // ]);


        /* ---- IMAGE SAVE IN DATABASE WITH THE HELP OF MOVE METHOD ----- */
        $file = $request->file('photo');
        $file->move(public_path('uploads'), $file->getClientOriginalName());

        FileUpload::create([
            'file_name' => $file->getClientOriginalName(),
        ]);

        return redirect()->route('fileupload.index')->with('status', 'User Image Uploaded Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = FileUpload::findOrFail($id);
        // return $fileUploads;
        return view('fileUpload.file_update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fileUploads = FileUpload::findOrFail($id);

        if($request->hasFile('photo')){

            $image_path = public_path('storage/') . $fileUploads->file_name;
            if(file_exists($image_path)){
                @unlink($image_path);
            }

            $path = $request->photo->store('image','public');

            $fileUploads->file_name = $path;
            $fileUploads->save();

            return redirect()->route('fileupload.index')->with('status', 'User Image Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return $id;
        $fileUploads = FileUpload::findOrFail($id);
        $fileUploads->delete();

        /* --- Storage folder mai save huii image ko public folder se hi delete krte hai directly delete nahi krskte  */
        $image_path = public_path('storage/') . $fileUploads->file_name;
        if(file_exists($image_path)){
            @unlink($image_path);
        }

        return redirect()->route('fileupload.index')
                ->with('status', 'User Image Deleted Successfully!');

    }
}
