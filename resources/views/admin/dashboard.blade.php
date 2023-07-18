@extends('admin.layouts.master')
@section('content')
    @if (session()->has('msg'))
        <div class="alert alert-success text-bold">{{session('msg')}}</div>
    @endif
@endsection
