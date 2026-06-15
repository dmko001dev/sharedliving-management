<x-mail::message>
# New Contact Form Submission

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] }}

**Type:** {{ $typeLabel }}

@if(!empty($data['message']))
**Message:**

{{ $data['message'] }}
@else
*No message provided.*
@endif

<x-mail::button :url="'mailto:'.$data['email']">
Reply to {{ $data['name'] }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
