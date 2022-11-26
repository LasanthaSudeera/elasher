@extends('core::layouts.master')

@section('content')
<h1>{{ Route::getCurrentRoute()->getActionName() }}</h1>
@endsection
