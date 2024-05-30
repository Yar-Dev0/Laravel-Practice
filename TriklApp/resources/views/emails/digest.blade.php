@component('mail::message')
# Daily Digest

Here are the top posts of the day:

@foreach ($posts as $post)
## {{ $post->title }}

{{ $post->content }}

@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent