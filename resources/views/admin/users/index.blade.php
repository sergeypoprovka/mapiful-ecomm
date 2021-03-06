@extends('layouts.app')

@section('content')
    <div class="flex flex-row items-center justify-between">
        <div class="heading text-4xl">{{__('Customers')}}</div>
        <a href="{{ route('admin.customers.create') }}" class="button button-default">{{__('Create customer')}}</a>
    </div>
    
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mt-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Name')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('Email')}}
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($customers as $customer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                            </div>
                            <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $customer->profile->fullname }}
                            </div>
                            <div class="text-sm text-gray-500">
                                <a class="text-indigo-500 text-sm" href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a class="text-indigo-500 text-sm" href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.customers.show', $customer->id) }}" class="button button-xs button-primary">View</a>
                            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="button button-xs button-default">Edit</a>
                            <form method="post" action="{{ route('admin.customers.delete', $customer->id) }}" class="inline">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="button button-danger button-xs">Remove</button>    
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <div class="mt-8 text-center">
        {{ $customers->links() }}
      </div>
  
@endsection