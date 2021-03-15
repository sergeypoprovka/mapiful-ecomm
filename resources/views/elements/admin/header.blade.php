<div class="bg-white py-2 px-4 border-b border-gray-200 flex flex-row justify-end items-center">
    <div class="pr-4">
        <language-switcher :current="'{{ app()->getLocale() }}'" :allowed="{{ json_encode(config('language.allowed')) }}" :all="{{ json_encode(config('language.all')) }}"></language-switcher>
    </div>
    @auth
    <div class="user">
        {{ auth()->user()->profile->fullname }}
    </div>
    @endauth
</div>