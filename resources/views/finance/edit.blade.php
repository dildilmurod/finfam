@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Изменить элемент</h1>

    </div>
    <div class="">
        {!! Form::open(['action'=> ['FinanceController@update', $finance->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Описание')}}
            {{Form::text('title', $finance->title, ['class'=>'', 'placeholder'=>'Что-то'])}}
        </div>
        <div class="form-group">
            {{Form::label('date', 'Дата')}}
            {{Form::date('date', $finance->date)}}
        </div>
        <div class="form-group">
            {{ Form::label('type', 'Тип') }}
            {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], $finance->type, ['class'=>'form-control', 'placeholder'=>'Выбрать']) }}
        </div>
        <div class="form-group">
            {{ Form::label('category_id', 'Категория') }}
            {{ Form::select('category_id', $categories, $finance->category_id, ['class'=>'form-control', 'placeholder'=>'Выбрать']) }}
        </div>
        <div class="form-group">
            {{ Form::label('sum', 'Сумма') }}
            {{ Form::number('sum', $finance->sum, ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::label('comment', 'Комментарий')}}
            {{Form::text('comment', $finance->comment, ['class'=>'', 'placeholder'=>'Что-то'])}}
        </div>



        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>


@endsection





