<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('front.profile.dashboard');
    }

    public function files()
    {
        return view('front.profile.files');
    }

    public function files_request_download(User_file $file)
    {
        if ($file->user_id != auth()->id()){
            abort(403);
        }else{
            if (!empty($file->file->file))
            {
                $name=$file->file->code.'.'.$file->file->extension;
                return Storage::download($file->file->file,$name);
            }
        }
    }
}
