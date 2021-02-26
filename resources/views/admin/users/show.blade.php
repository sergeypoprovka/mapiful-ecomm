@extends('layouts.app')

@section('content')
    <div class="flex flex-row align-center justify-between">
        <div class="heading text-4xl">{{ $user->profile->fullname }}</div>
        <a href="{{ route('admin.customers') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
    </div>
    
@endsection