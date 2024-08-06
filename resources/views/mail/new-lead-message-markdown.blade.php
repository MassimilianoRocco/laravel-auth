<x-mail::message>
    # You got a new message

    name: {{$lead['name']}}
    mail: {{$lead['email']}}

    {{$lead['message']}}


    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
