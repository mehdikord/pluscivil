@if(!empty($errors->all()))
    <div dir="rtl" class="alert alert-danger text-right" role="alert">
        <h4 class="alert-heading text-iranyekan text-right">خطا !</h4>
        <hr>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </div>
@endif
