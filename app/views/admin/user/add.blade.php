@extends('admin.layout')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ trans("name.add") }} {{ trans("name.user-") }}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {{ Form::open() }}
                <div class="box-body">
                    @if($errors->has())
                       @foreach ($errors->all() as $error)
                          <div class="form-group has-error"><label><i class="fa fa-times-circle-o"></i> {{ $error }}</label></div>
                      @endforeach
                    @endif
                    <div class="form-group {{ $errors->first('firstname') ? 'has-error' : '' }}">
                        {{ Form::label('firstname', 'Имя') }}
                        {{ Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Имя']) }}
                    </div>
                    <div class="form-group {{ $errors->first('lastname') ? 'has-error' : '' }}">
                        {{ Form::label('lastname', 'Фамилия') }}
                        {{ Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Фамилия']) }}
                    </div>
                    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                        {{ Form::label('email', 'Email')}}
                        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'rows' => 3]) }}
                    </div>
                    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
                        {{ Form::label('password', 'Пароль') }}
                        {{ Form::password('password', ['class' => 'form-control', 'rows' => 3]) }}
                    </div>
                    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
                        {{ Form::label('password_confirmation', 'Пароль еще раз') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'rows' => 3]) }}
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    {{ Form::submit('Сохранить', ['id' => 'send', 'class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div><!-- /.box -->
    </div><!--/.col (left) -->
</div>   <!-- /.row -->
@stop