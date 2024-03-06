@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($applications as $item)
            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url($item->photo) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text">{{ $item->status_id }}</p>
                    @if ($item->status_id == 2 || $item->status_id == 3)
                        <form action="{{ route('applications.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Удалить</button>
                        </form>
                        <a href="{{ route('applications.edit', $item->id) }}" class="btn btn-primary">Редактировать</a>
                    @endif

                </div>
            </div>
        @endforeach

    </div>
@endsection
