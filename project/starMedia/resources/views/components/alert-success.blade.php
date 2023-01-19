@if(session('success'))
<div class="mb-4 px-2 bg-green-100 border-green-200 text-green-700 rounded-md">
{{ $slot }}
</div>
@endif