@extends('instructor.layouts.master')

@section('content')
    <div class="card">
        @if (session()->has('msg'))
            <div class="alert alert-success text-bold">
                {{session('msg')}}
            </div>
        @endif
        <div class="card card-outline card-info col-8">
            <div class="card-body pad">
                <form action="{{ route('instructor.announcement.store', $course) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="outputs">التنويه</label>
                        <textarea class="textarea" name="announcement" placeholder="يمكنك كتابةالتنويه هنا..." id="outputs"
                            style="width: 100%; height: 200px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('outputs') }}</textarea>
                        <x-input-error :messages="$errors->get('announcement')" class="mt-2 text-danger text-bold" />

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary bg-primary">
                            سجل التنويه
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
