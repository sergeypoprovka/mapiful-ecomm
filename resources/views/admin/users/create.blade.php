@extends('layouts.app')

@section('content')
    <div class="flex flex-row align-center justify-between">
        <div class="heading text-4xl">{{ __('Create customer') }}</div>
        <a href="{{ route('admin.customers') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
    </div>
    <form method="post" action="{{ route('admin.customers.store') }}" class="grid grid-cols-6 gap-6 my-8">
        @csrf
        <div class="col-span-6 sm:col-span-4">
            <label for="firstname" class="form-label">{{ __('Firstname') }}</label>
            <input type="text" name="firstname" id="firstname" class="form-element" value="{{ old('firstname') }}">
            @if($errors->has('firstname')) <span class="text-red-500">{{ $errors->first('firstname') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
            <input type="text" name="lastname" id="lastname" class="form-element" value="{{ old('lastname') }}">
            @if($errors->has('lastname')) <span class="text-red-500">{{ $errors->first('lastname') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="middlename" class="form-label">{{ __('Middlename') }}</label>
            <input type="text" name="middlename" id="middlename" class="form-element" value="{{ old('middlename') }}">
            @if($errors->has('middlename')) <span class="text-red-500">{{ $errors->first('middlename') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input type="email" name="email" id="email" class="form-element" value="{{ old('email') }}">
            @if($errors->has('email')) <span class="text-red-500">{{ $errors->first('email') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="country" class="form-label">{{ __('Country') }}</label>
            <select name="country" id="country" class="form-element">
                <option value="" selected disabled>{{ __('Select country') }}</option>
            </select>
            @if($errors->has('country')) <span class="text-red-500">{{ $errors->first('country') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="state" class="form-label">{{ __('State') }}</label>
            <select name="state" id="state" class="form-element">
                <option value="" selected disabled>{{ __('Select state') }}</option>
            </select>
            @if($errors->has('state')) <span class="text-red-500">{{ $errors->first('state') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="city" class="form-label">{{ __('City') }}</label>
            <select name="city" id="city" class="form-element">
                <option value="" selected disabled>{{ __('Select city') }}</option>
            </select>
            @if($errors->has('city')) <span class="text-red-500">{{ $errors->first('city') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="address_1" class="form-label">{{ __('Address #1') }}</label>
            <textarea name="address_1" id="address_1" class="form-element">{{ old('address_1') }}</textarea>
            @if($errors->has('address_1')) <span class="text-red-500">{{ $errors->first('address_1') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="address_2" class="form-label">{{ __('Address #2') }}</label>
            <textarea name="address_2" id="address_2" class="form-element">{{ old('address_1') }}</textarea>
            @if($errors->has('address_2')) <span class="text-red-500">{{ $errors->first('address_2') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="postcode" class="form-label">{{ __('Postcode') }}</label>
            <input type="text" name="postcode" id="postcode" class="form-element" value="{{ old('postcode') }}" />
            @if($errors->has('postcode')) <span class="text-red-500">{{ $errors->first('postcode') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone" id="phone" class="form-element" value="{{ old('phone') }}" />
            @if($errors->has('phone')) <span class="text-red-500">{{ $errors->first('phone') }}</span> @endif
        </div>
        <hr />
        <div class="col-span-6 sm:col-span-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-element" />
            @if($errors->has('password')) <span class="text-red-500">{{ $errors->first('password') }}</span> @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <label for="password_confirmation" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-element" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <button type="submit" class="button button-default">{{ __('Save customer') }}</button>
        </div>
    </form>
@endsection