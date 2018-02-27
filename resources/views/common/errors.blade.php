@if (count($errors))
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{ trans('msg.msg') }}</strong>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ (session()->get('lang') == 'vn') ? trans('validation.' . $error) : $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('msgErr'))
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{ trans('msg.msg') }}</strong>
        <br><br>
        <ul>
            <li>
                {{ session('msgErr') }}
            </li>
        </ul>
    </div>
@endif

