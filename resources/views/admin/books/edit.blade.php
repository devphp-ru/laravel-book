@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        @include('admin.books.blocks._navtab')
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        @include('admin.books.blocks._detailed')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Действия</h3>
                </div>
                <form id="form_html" action="{{ route('books.update', ['book' => $item->id]) }}" method="post" enctype="multipart/form-data" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
                        <a href="{{ route('books.index') }}" role="button" class="btn btn-secondary btn-sm">Назад</a>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Информация</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Создан:</td>
                            <td>{{ $item->created_at->format('d.m.Y') }}</td>
                        </tr>
                        <tr>
                            <td>Обновлен:</td>
                            <td>{{ $item->updated_at->format('d.m.Y') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection