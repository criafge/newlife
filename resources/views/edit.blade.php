@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{ $application->title }}">
                @error('title')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input type="text" class="form-control" name="description" value="{{ $application->description }}">
                @error('description')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control phone" value="{{ $application->phone }}" name="phone">
                @error('phone')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if ($category->id == $application->category_id)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" name="district_id">
                    @foreach ($districts as $district)
                        @if ($district->id == $application->district_id)
                            <option value="{{ $district->id }}">{{ $district->title }}</option>
                        @else
                            <option value="{{ $district->id }}">{{ $district->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('district_id')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    </div>
@endsection
