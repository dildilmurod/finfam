@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Изменить элемент</h1>

    </div>

    <div class="col-md-12">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br>
                @endforeach
                @endif
                {!! Form::open(['action'=> ['FinanceController@update', $finance->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Описание *')}}
                    {{Form::text('title', $finance->title, ['class'=>'form-control', 'placeholder'=>'Что-то'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date', 'Дата')}}
                    {{Form::date('date', $finance->date, ['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('type', 'Тип *') }}
                    {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], $finance->type, ['class'=>'form-control', 'placeholder'=>'Выбрать']) }}
                </div>
                @if($finance->type == 'приход')
                    <div class="form-group" id="inc">
                        {{ Form::label('category_id', 'Категория *') }}
                        {{ Form::select('category_id', $income, $finance->category_id, ['class'=>'form-control', 'id'=>'category1', 'placeholder'=>'Выбрать', ]) }}
                    </div>
                @elseif($finance->type == 'расход')
                    <div class="form-group" id="out">
                        {{ Form::label('category_id', 'Категория *') }}
                        {{ Form::select('category_id', $outcome, $finance->category_id, ['class'=>'form-control', 'id'=>'category', 'placeholder'=>'Выбрать', ]) }}
                    </div>
                @endif
                <div class="form-group">
                    {{ Form::label('sum', 'Сумма *') }}
                    {{ Form::number('sum', $finance->sum, ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('t', 'Отмеченные * поля являются обязательными') }}
                </div>


                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Сохранить', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}
            </div>
    </div>


@endsection





