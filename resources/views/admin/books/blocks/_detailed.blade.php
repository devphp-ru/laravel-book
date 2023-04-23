<div class="tab-pane active" id="detailed">
    <h5>Информация</h5>
    <div class="form-group row mb-2">
        <label for="title" class="col-sm-3 col-form-label text-left" title="Название">
            Название: <span class="an_cursor-h" title="Название."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <input id="title" name="title" value="{{ $item->title ?? old('title') ?? '' }}" type="text" class="form-control" form="form_html">
            @if ($errors->has('title'))
                <span class="input_box__error">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="category_id" class="col-sm-3 col-form-label text-left" title="Расположение">
            Расположение: <span class="an_cursor-h" title="Расположение."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <select id="category_id" name="category_id" class="form-select rounded-0 @error('category_id')is-invalid @enderror" form="form_html">
                @foreach ($categories as $id => $value)
                    <option value="{{ $id }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="author_id" class="col-sm-3 col-form-label text-left" title="Автор">
            Расположение: <span class="an_cursor-h" title="Автор."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <select id="author_id" name="author_id" class="form-select rounded-0 @error('author_id')is-invalid @enderror" form="form_html">
                @foreach ($authors as $id => $value)
                    <option value="{{ $id }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="description" class="col-sm-3 col-form-label text-left" title="Автор">
            Описание: <span class="an_cursor-h" title="Автор."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Не более 250 символов..." form="form_html">{{ $item->description ?? old('description') ?? '' }}</textarea>
            @if ($errors->has('description'))
                <span class="input_box__error time-close">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="file" class="col-sm-3 col-form-label text-left" title="Автор">
            Изображение: <span class="an_cursor-h" title="Автор."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <div class="input-group mb-3">
                <label class="input-group-text" for="file">Загрузить</label>
                <input type="file" name="file" value="" class="form-control" id="file" form="form_html">
            </div>
        </div>
    </div>
    <div class="form-group row mb-2">
        <div class="col-sm-3"></div>
        <div class="col-sm-2">
            @if (isset($item) && ($item->cover))
                <img src="{{ $item->getImage() }}" class="card-img-top p-1"  alt="...">
            @endif
        </div>
    </div>
</div>