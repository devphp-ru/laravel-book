@extends('layouts.default')

@section('content')
    <div class="row">
        <h1>{{ $title }}</h1>

        @if ($paginator->isNotEmpty())
            @foreach ($paginator as $value)
                <div class="card mb-2 ms-2" style="width: 18rem;">
                    <img src="{{ $value->getImage() }}" class="card-img-top p-1" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->title }}</h5>
                        <p>Автор: <a href="{{ route('categories.author', ['authorId' => $value->author_id]) }}" title="смотреть книги автора">{{ $value->author->name }}</a></p>
                        <p class="card-text">{{ $value->hortDescription() }}</p>
                        <a href="{{ route('categories.single', ['slug' => $value->slug]) }}" class="btn btn-primary">Смотерть</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="row p-3 an-row">
        <div class="col-md-6">
            {{ $paginator->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

@endsection
