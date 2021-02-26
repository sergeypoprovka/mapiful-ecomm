<div class="sidebar">
    <div class="sidebar__logo text-2xl mb-8 py-8 px-4">
        {{ env('APP_NAME') }}
    </div>
    <ul>
        <li class="p-4 hover:bg-gray-100"><a href="{{ route('admin.home') }}">{{ __('Home')}}</a></li>
        <li class="p-4 hover:bg-gray-100"><a href="{{ route('admin.products') }}">{{ __('Products')}}</a></li>
        {{-- <li><a href="{{ route('admin.orders') }}">{{ __('Orders')}}</a></li> --}}
        <li class="p-4 hover:bg-gray-100"><a href="{{ route('admin.customers') }}">{{ __('Customers')}}</a></li>
        {{-- <li><a href="{{ route('admin.settings') }}">{{ __('Settings')}}</a></li> --}}
        <li class="p-4 hover:bg-gray-100">
            <form method="post" action="/logout">
                @csrf
                <button type="submit">{{__('Logout')}}</button>
            </form>
        </li>
    </ul>
</div>