@if(\Illuminate\Support\Facades\Session::has('simple_message_message'))
    <script>
        Swal.fire({
            title: '{{\Illuminate\Support\Facades\Session::get('simple_message_title')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('simple_message_message')}}',
            icon: '{{\Illuminate\Support\Facades\Session::get('simple_message_level')}}',
            confirmButtonText: '{{\Illuminate\Support\Facades\Session::get('simple_message_button')}}',
        });
    </script>
    @endif
