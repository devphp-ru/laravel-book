<div class="tab-pane active" id="detailed">
    <h5>Информация</h5>
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label text-left" title="Имя">
            Имя: <span class="an_cursor-h" title="Имя."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <input id="name" name="name" value="{{ $item->name ?? old('name') ?? '' }}" type="text" class="form-control" form="form_html">
            @if ($errors->has('name'))
                <span class="input_box__error">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>