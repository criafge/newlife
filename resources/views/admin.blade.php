@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($applications as $item)
            <div class="card" style="width: 18rem;">
                <img src="{{Storage::url($item->photo)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <p class="card-text">{{$item->status_id}}</p>
                    <a href="{{route('change', [$item->id, 2])}}" class="btn btn-primary">Активно</a>
                    <a href="{{route('change', [$item->id, 3])}}" class="btn btn-primary">Найдено</a>
                    <a href="{{route('change', [$item->id, 4])}}" class="btn btn-primary">В архиве</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
