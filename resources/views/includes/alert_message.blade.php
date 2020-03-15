@if(\Illuminate\Support\Facades\Session::has('alert_message_message'))
    <script>
        Swal.fire({
            position: 'bottom-end',
            icon: '{{\Illuminate\Support\Facades\Session::get('alert_message_level')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('alert_message_message')}}',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
    @endif
