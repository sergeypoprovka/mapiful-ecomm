<div class="sidebar">
    <div>
        <div class="sidebar__logo">
            <img src="/images/logo.svg" />
            {{ env('APP_NAME') }}
        </div>
        <ul>
            <li><a class="p-4 flex" href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt text-green-500"></i> {{ __('Home')}}</a></li>
            <li><a class="p-4 flex" href="{{ route('admin.products') }}"><i class="fas fa-store text-purple-500"></i> {{ __('Products')}}</a></li>
            {{-- <li><a href="{{ route('admin.orders') }}">{{ __('Orders')}}</a></li> --}}
            <li><a class="p-4 flex" href="{{ route('admin.customers') }}"><i class="fas fa-users text-blue-500"></i>{{ __('Customers')}}</a></li>
            {{-- <li><a href="{{ route('admin.settings') }}">{{ __('Settings')}}</a></li> --}}
            <li>
                <form method="post" action="/logout">
                    @csrf
                    <button class="p-4 flex" type="submit"><i class="fas fa-sign-out-alt text-pink-500"></i>{{__('Logout')}}</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="p-4 text-xs">
        {{__('Created by Mapiful for Mapiful')}}
    </div>
</div>
