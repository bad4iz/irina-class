@component('mail::message')
# Подтверждение регистрации на сайте 2В класса Школы нового века

Для подтверждения регистрации пожалуйста, перейдите по следующей ссылке::

@component('mail::button', ['url' => route('register.verify', ['id'=> $user->id, 'token' => $user->verify_token])])
    Подтвердить Email
@endcomponent

Спасибо от {{ config('app.name') }}

@endcomponent
