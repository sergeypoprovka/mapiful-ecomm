@extends('layouts.app')

@section('content')
    <create-product :attrs="{{ $attributes }}" inline-template>
        <div>
            <div class="flex flex-row align-center justify-between">
                <div class="heading text-4xl">{{ __('Create product') }}</div>
                <a href="{{ route('admin.products') }}" class="text-indigo-500 text-sm">{{__('Back')}}</a>
            </div>
            <ul class="flex flex-row">
                <li class="p-4"><a class="button" :class="{ 'button-default' : activeTab == 'general' }" href="#" @click.prevent="setActiveTab('general')">{{__('General')}}</a></li>
                <li class="p-4" v-if="product && product.id"><a class="button" :class="{ 'button-default' : activeTab == 'variations' }" href="#" @click.prevent="setActiveTab('variations')">{{__('Variations')}}</a></li>
            </ul>
            <div class="rounded-xl bg-white shadow-xl p-8" v-if="activeTab == 'general'">
                <form method="post" action="{{ route('admin.products.store') }}" class="grid grid-cols-6 gap-6 my-8">
                    @csrf
                    <div class="col-span-6 sm:col-span-4">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" v-model="form.name" name="name" id="name" class="form-element" value="{{ old('name') }}">
                        @if($errors->has('name')) <span class="text-red-500">{{ $errors->first('name') }}</span> @endif
                    </div>
                </form>
            </div>
            <div v-if="activeTab == 'variations'">
                <ul v-if='attrs.length'>
                    <li v-for="attr in attrs">
                        <strong>@{{ attr.name }}</strong>
                        <ul class="flex flex-row mb-4" v-if="attr.values.length">
                            <li class="mr-4" v-for="val in attr.values"><input v-model="variationParams[attr.id]" type="checkbox" :value="val.id" > @{{ val.value }}</li>
                        </ul>
                    </li>
                </ul>
                <hr />
                <ul v-if="variations.length">
                    <li v-for="variation in variations">@{{ variation.name }}</li>
                </ul>
                <div class="flex flex-row justify-center items-center">
                    <button type="button" @click.prevent="preGenerateVariations" class="button button-default">{{__('Create variations')}}</button>
                </div>
            </div>
            <div class="flex flex-row justify-center items-center mt-8">
                <button type="button" @click.prevent="saveProduct" class="button button-default">{{__('Save product')}}</button>
            </div>
        </div>
    </create-product>
@endsection