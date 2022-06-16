@extends('layouts.layout')

@section('title')
    Create article
@endsection

@section('content')
    <div class="px-4 sm:px-6 lg:px-8">
        {!! Form::open(array('route' => array('orders.store', $order->id))) !!}
        <div>
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            {!! Form::label('date', 'Select date', ['class' => 'block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2']) !!}
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                {!! Form::date('date', '', ['class' => 'max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md']); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('orders.index') }}" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</a>
                    {!! Form::submit('Create', ['class' => 'ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
@endsection
