@component('mail::message')

<p class="parrafo"> Nombre: <strong>{{ $name }}</strong></p>
<p class="parrafo"> Email: <strong>{{ $email }}</strong></p>

@component('mail::panel')
    {{$message}}
@endcomponent

@endcomponent