@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Создать новый элемент</h1>
    </div>
        <div class="col-md-12">
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                        <br>
                    @endforeach
                    @endif

                    {!! Form::open(['route'=>'finance.store', 'method'=>'post', 'files'=>true, 'id'=>'fin_create']) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Описание *' )}}
                        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Что-то'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('date', 'Дата')}}
                        {{Form::date('date', $date, ['class'=>'form-control','id'=>'',])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Тип *') }}
                        {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], null, ['class'=>'form-control', 'id'=>'', 'placeholder'=>'Выбрать']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category_id', 'Категория *') }}
                        {{ Form::select('category_id', $categories, null, ['class'=>'form-control', 'id'=>'', 'placeholder'=>'Выбрать']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('sum', 'Сумма *') }}
                        {!! Form::number('sum', null, ['class' => 'form-control','step' => '0.1']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('t', 'Отмеченные * поля являются обязательными') }}
                    </div>


                    {{Form::submit('Сохранить', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
        </div>
@endsection