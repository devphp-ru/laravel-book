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
    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label text-left" title="Email">
            Email: <span class="an_cursor-h" title="Email."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <input id="email" name="email" value="{{ $item->email ?? old('email') ?? '' }}" type="text" class="form-control" form="form_html">
            @if ($errors->has('email'))
                <span class="input_box__error">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label text-left" title="Название">
            Пароль: <span class="an_cursor-h" title="Название."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <input id="password" name="password" value="" type="text" class="form-control" form="form_html">
            @if ($errors->has('password'))
                <span class="input_box__error">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="password_confirmation" class="col-sm-3 col-form-label text-left" title="Повторный пароль">
            Повторный пароль: <span class="an_cursor-h" title="Повторный пароль."><i class="fa fa-question-circle" aria-hidden="true"></i></span>
        </label>
        <div class="col-sm-9">
            <input id="password_confirmation" name="password_confirmation" value="" type="text" class="form-control" form="form_html">
            @if ($errors->has('password_confirmation'))
                <span class="input_box__error">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </div>
</div>