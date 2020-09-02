@component('mail::message')

<p class="parrafo"> Nombre: <strong>{{ $data->name }}</strong></p>
<p class="parrafo"> Email: <strong>{{ $data->email }}</strong></p>

@component('mail::panel')
    {{$data->message}}
@endcomponent

@endcomponent