@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($application->photo) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $application->title }}</h5>
                <p class="card-text">{{ $application->description }}</p>
                <p class="card-text">{{ $application->status_id }}</p>
            </div>
        </div>
        <div>
            <form action="{{route('create-comment', $application->id)}}" method="post" class="d-flex gap-3">
                @csrf
                <textarea name="comment"></textarea>
                <input type="submit" class="btn btn-primary" value="Отправить">
            </form>
        </div>
        <div>
            @foreach ($comments as $item)
                {{$item->comment}}
            @endforeach
        </div>
    </div>
@endsection
