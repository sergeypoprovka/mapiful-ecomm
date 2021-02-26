@extends('layouts.app')

@section('content')
    <div class="flex flex-row align-center justify-between">
        <div class="heading text-4xl">{{ $product->name }}</div>
        <a href="{{ route('admin.products') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
    </div>
    <div class="my-8">
        {{ $product->description }}
    </div>
    
@endsection