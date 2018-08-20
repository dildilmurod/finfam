@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Создать новый элемент</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::open(['route'=>'finance.store', 'method'=>'post', 'files'=>true]) !!}
            <div class="form-group">
                {{Form::label('title', 'Описание')}}
                {{Form::text('title', '', ['class'=>'', 'placeholder'=>'Что-то'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Дата')}}
                {{Form::date('date', 'date')}}
            </div>
            <div class="form-group">
                {{ Form::label('type', 'Тип') }}
                {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], null, ['class'=>'form-control', 'placeholder'=>'Выбрать']) }}
            </div>
            <div class="form-group">
                {{ Form::label('category_id', 'Категория') }}
                {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Выбрать']) }}
            </div>
            <div class="form-group">
                {{ Form::label('sum', 'Сумма') }}
                {{ Form::number('sum', null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{Form::label('comment', 'Комментарий')}}
                {{Form::text('comment', '', ['class'=>'', 'placeholder'=>'Что-то'])}}
            </div>


            {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection