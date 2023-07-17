@component('mail::message')
    You logged in with api
    @component('mail::button', ['url' => url('/')])
        Please click here !
    @endcomponent
@endcomponent
