@if(session()->has('danger'))
    <div class="bg-red-500 text-white text-sm p-4 rounded-lg mb-4">{{ session()->get('danger') }}</div>
@endif

@if(session()->has('info'))
    <div class="bg-blue-500 text-white text-sm p-4 rounded-lg mb-4">{{ session()->get('info') }}</div>
@endif

@if(session()->has('success'))
    <div class="bg-green-500 text-white text-sm p-4 rounded-lg mb-4">{{ session()->get('success') }}</div>
@endif