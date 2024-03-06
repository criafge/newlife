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
        @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}</div>
        @enderror



        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($applications as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                        <img src="{{ Storage::url($item->photo) }}" class="d-block w-100" alt="...">
                        <p>{{ $item->title }}</p>
                        <a href="{{ route('applications.show', $item->id) }}">Подробнее</a>

                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
