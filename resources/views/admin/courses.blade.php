@extends('admin.layouts.master')

@section('content')
    <livewire:admin-search-courses :status="$status" />
@endsection