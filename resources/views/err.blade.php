@if(count($errors)>0)
<div class="w3-row">
    <div class="w3-mobile w3-panel w3-pale-red alert w3-animate-opacity temporary">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
</div>
@endif

@if($message = Session::get('Error'))

<div class="w3-panel w3-pale-red alert w3-animate-opacity w3-padding-16 temporary">
    {{$message}}
</div>

@endif

@if($message = Session::get('info'))

<div class="w3-panel w3-pale-green w3-animate-opacity alert w3-padding-16 temporary">
    {{$message}}
</div>

@endif
