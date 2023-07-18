@extends('instructor.layouts.master')
@section('content')
    @livewire('search-courses', ['status' => $status])
@endsection