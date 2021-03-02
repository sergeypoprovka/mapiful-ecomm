@extends('layouts.app')

@section('content')
    <div class="flex flex-row align-center justify-between">
        <div class="heading text-4xl">{{ __('Create product') }}</div>
        <a href="{{ route('admin.products') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
    </div>
    <form method="post" action="{{ route('admin.products.store') }}" class="grid grid-cols-6 gap-6 my-8">
        @csrf
        <div class="col-span-6 sm:col-span-4">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-element" value="{{ old('name') }}">
            @if($errors->has('name')) <span class="text-red-500">{{ $errors->first('name') }}</span> @endif
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <button type="submit" class="button button-default">{{ __('Save product') }}</button>
        </div>
    </form>
@endsection