@extends('layouts.app')

@section('content')
    <div class="flex flex-row align-center justify-between">
        <div class="heading text-4xl">{{ $user->profile->fullname }}</div>
        <a href="{{ route('admin.customers') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
    </div>
    <div class="list my-8">
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Full name')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->fullname }} @if($user->profile->middlename) ({{ $user->profile->middlename }}) @endif
            </dd>
          </div>
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Email')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </dd>
          </div>
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Address')}} ({{ __('line 1')}})
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->address_1 }}
            </dd>
          </div>
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Address')}} ({{ __('line 2')}})
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->address_2 }}
            </dd>
          </div>
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Phone')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <a href="tel:{{ $user->profile->phone }}">{{ $user->profile->phone }}</a>
            </dd>
          </div>
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Postcode')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->postcode }}
            </dd>
          </div>
          @if($user->profile->country_id)
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Country')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->country->name }}
            </dd>
          </div>
          @endif
          @if($user->profile->country_id)
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('State')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->state->name }}
            </dd>
          </div>
          @endif
          @if($user->profile->country_id)
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('City')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->profile->city->name }}
            </dd>
          </div>
          @endif
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              {{__('Regitered at')}}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              {{ $user->created_at->diffForHumans() }} <span class="text-gray-400">( {{ $user->created_at->format("d M Y H:i:s") }} )</span>
            </dd>
          </div>
    </div>
    <div class="orders">
        <h2 class="text-2xl mb-8">{{ __('Orders') }}</h3>
        @for($i = 0; $i < 20; $i++)
            <a href="#" class="flex shadow-md hover:shadow-sm hover:text-gray-500 rounded-lg p-8 mb-4">
                Order {{ $i }}
            </a>
        @endfor
    </div>
@endsection