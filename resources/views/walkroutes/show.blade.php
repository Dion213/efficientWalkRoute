@extends('layouts.layout')

@section('title')
    Walkroute {{ $date }}
@endsection

@section('content')
    @foreach ($walkRoute as $department)
        <h1>{{ $department['departmentName'] }}</h1>
        @foreach ($department['articles'] as $article)
            {{ $article['name'] }} - {{ $article['amount'] }}<br />
        @endforeach
        <br />
    @endforeach
@endsection
