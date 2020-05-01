<?php

namespace App\Http\Controllers\Web;

use App\File;
use App\Http\Controllers\Controller;
use App\User_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download_free($file)
    {
        $file = File::where('code',$file)->firstorfail();
        if (!auth()->check()){
            simple_message('پیام سیستم','برای دریافت فایل از فروشگاه ابتدا باید ثبت نام کنید، اگر عضو هستید فقط کافیه وارد شوید','success');
            return redirect()->route('front_login');
        }
        if (!empty($file->price) || !empty($file->sale))
        {
            alert_message('فایل مورد نظر رایگان نمیباشد، لطفا آن را خریداری کنید');
        }else{
            $file->update(['download'=>$file->download + 1]);
            if (!empty($file->price))
            {
                $price = Crypt::decrypt($file->price);
            }elseif (!empty($file->sale)){
                $price = Crypt::decrypt($file->sale);
            }else{
                $price = 'رایگان';

            }
            User_file::updateorcreate(['user_id'=>auth()->id(),'file_id'=>$file->id],['user_id'=>auth()->id(),'file_id'=>$file->id,'price'=>$price]);
            $name=$file->code.'.'.$file->extension;
            return Storage::download($file->file,$name);


        }
    }
}
