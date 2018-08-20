@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <p><a class="btn btn-primary" href="/finance" role="button">Ко всем элементам</a></p>
        <h3>Описание: {{$finance->title}}</h3>
        <h4>Тип: {{$finance->type}}</h4>
        <h4>Сумма: {{$finance->sum}}</h4>
        <h4>Категория: {{\App\Category::find($finance->category_id)->title}}</h4>
        <h4>Дата: {{$finance->date}}</h4>
        <h4>Комментарий: {{$finance->comment}}</h4>


        <p>{!! Form::open(['action'=>['FinanceController@destroy', $finance->id], 'method'=>'POST', 'class'=>'']) !!}
            <a class="btn btn-primary" href="/finance/{{$finance->id}}/edit" role="button">Изменить</a>
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Удалить', ['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}</p>


    </div>
    <div class="text-center">
        <div class="well">

        </div>
    </div>
@endsection