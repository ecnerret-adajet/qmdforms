                                 <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12 ">
                                <label class="control-label">
                                {!! Form::label('name', 'Company Name:') !!}
                                </label>
                                </div>

                                <div class="col-md-12">
                                {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
                                @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                </div>
                                </div>

<table class="table">
    <tr>
        <th>Document Title</th>
        <th></th>
        <th></th>
    </tr>
</table>