@component('mail::message')
# Complaint Status Updated

Hi {{ $complaint->user->name }},

The status of your complaint (ID: {{ $complaint->issue_id }}) has been updated.

**New Status:** {{ $newStatus }}

Thanks,  
{{ config('app.name') }}
@endcomponent
