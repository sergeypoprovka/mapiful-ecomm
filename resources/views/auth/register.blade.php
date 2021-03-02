@extends('layouts.auth')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          {{__('Create your account')}}
        </h2>
      </div>
      <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
            <div>
                <label for="firstname" class="sr-only">{{__('Firstname')}}</label>
                <input id="firstname" placeholder="{{__('Firstname')}}" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="text-xs text-red-500 p-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
              </div>
              <div>
                <label for="lastname" class="sr-only">{{__('Lastname')}}</label>
                <input id="lastname" placeholder="{{__('Lastname')}}" type="text" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="text-xs text-red-500 p-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
              </div>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email" placeholder="{{__('Email address')}}" type="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="text-xs text-red-500 p-2" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" placeholder="{{__('Your password')}}" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <div class="text-xs text-red-500 p-2" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
          </div>
          <div>
            <label for="password_confirmation" class="sr-only">Password</label>
            <input id="password_confirmation" placeholder="{{__('Confirm your password')}}" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
          </div>
        </div>
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            {{ __('Create account')}}
          </button>
        </div>
      </form>
    </div>
  </div>

@endsection
