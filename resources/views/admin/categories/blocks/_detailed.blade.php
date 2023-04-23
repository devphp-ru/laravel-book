<div class="tab-pane active" id="detailed">
    <h5>Информация</h5>
    <div class="form-group row">
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
</div>