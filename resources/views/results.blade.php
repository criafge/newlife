@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="GET"
            class="w-50 d-flex justify-content-betweeen align-items-center gap-3">
            @csrf
            <select class="form-select" name="district_id">
                <option value="" selected>Выберите район</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->title }}</option>
                @endforeach
            </select>
            <select class="form-select" name="category_id">
                <option value="" selected>Выберите вид животного</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Найти</button>
        </form>
        @if ($applications !== null)
            @foreach ($applications as $item)
                <a href="{{route('applications.show', $item->id)}}">{{ $item->title }}</a>
            @endforeach
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
