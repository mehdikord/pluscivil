<?php
/*
 * All helper functions is here
 * Created by Mehdi kord
 * @mehdi_atwork
 */
//Using Facades

use Illuminate\Support\Facades\Session;


//make alert message
function alert_message($message='انجام شد',$level='info')
{
    Session::flash('alert_message_message',$message);
    Session::flash('alert_message_level',$level);
}

//make simple message
function simple_message($title='پیام سیستم',$message='انجام شد',$level='info',$button='باشه')
{
    Session::flash('simple_message_title',$title);
    Session::flash('simple_message_message',$message);
    Session::flash('simple_message_level',$level);
    Session::flash('simple_message_button',$button);
}

function get_ip()
{

    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;

}
function main_services(){
    return \App\Service::where('is_public',1)->whereNull('parent_id')->get();
}
