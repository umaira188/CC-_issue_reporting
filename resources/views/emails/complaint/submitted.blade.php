@component('mail::message')
# Complaint Received

Hello {{ $complaint->user->name ?? 'User' }},

Your complaint has been received.

- **Issue ID:** {{ $complaint->issue_id }}
- **Category:** {{ ucfirst($complaint->category) }}
- **Address:** {{ $complaint->address }}
- **Details:** {{ $complaint->details }}

We will take the necessary actions and keep you informed.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
