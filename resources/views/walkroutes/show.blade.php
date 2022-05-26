@extends('layouts.layout')

@section('title')
    Walkroute $DATE
@endsection

@section('content')
    Info:
    <br> -When you generate a route the Type is method name. So that you can do $this->$article->type(). So you dont have unnecassairy switch / ifs
@endsection
