@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('books.create') }}" class="btn btn-primary" role="button">Добавить</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($paginator as $value)
                    <tr>
                        <th scope="row">{{ $value->id }}</th>
                        <td width="20">  <img src="{{ $value->getImage() }}" class="card-img-top p-1" height="80" alt="..."></td>
                        <td><a href="{{ route('books.edit', ['book' => $value->id]) }}">{{ $value->title }}</a></td>
                        <td>{{ $value->category->title }}</a></td>
                        <td>
                            <form action="{{ route('books.destroy', ['book' => $value->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('books.edit', ['book' => $value->id]) }}" class="btn btn-primary" role="button">Редактировать</a>
                                <button type="submit" class="btn btn-danger" onclick="if(!confirm('Вы уверены, что хотите удалить?')) return false" title="Удалить">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row p-3 an-row">
        <div class="col-md-6">
            {{ $paginator->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection