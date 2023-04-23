@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="{{ $item->getImage() }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                       <p>Автор: <a href="{{ route('categories.author', ['authorId' => $item->author_id]) }}" title="смотреть книги автора">{{ $item->author->name }}</a>
                           <br>
                           Категория: <a href="{{ route('categories.show', ['slug' => $item->category->slug]) }}" title="смотреть книги автора">{{ $item->category->title }}</a>
                       </p>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            @if ($item->comments)
                <div id="comment_list">
                @foreach ($item->comments as $value)
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $value->username }}</h4>
                            <p>{{ $value->comment }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
            @endif
                <br>
                <span class="input_box-message"></span>
                <form id="form_comment" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="username" value="{{ Auth::guard('web')->user()->name ?? old('username') ?? '' }}">
                        <span class="input_box-error-username">{{ $errors->first('name') ?? '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Комментарий</label>
                        <textarea class="form-control" id="comment" rows="3">{{ old('comment') ?? '' }}</textarea>
                        <span class="input_box-error-comment">{{ $errors->first('name') ?? '' }}</span>
                    </div>
                    <input id="book_id" value="{{ $item->id }}" type="hidden">
                    <input id="user_id" value="{{ Auth::guard('web')->user()->id ?? 0 }}" type="hidden">
                    <button id="an_save-comment" type="button" class="btn btn-primary">Добавить</button>
                </form>
        </div>
    </div>
@endsection