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

        <p>
            <a class="btn btn-primary" href="/finance/{{$finance->id}}/edit" role="button">Изменить</a>
            <a class="btn btn-danger" data-toggle="modal" href="#thisModal">Удалить</a></p>
        <div id="thisModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                {!! Form::open(['action'=>['FinanceController@destroy', $finance->id], 'method'=>'POST', 'class'=>'']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Вы действительно хотите удалить данный элемент?</p>
                    </div>
                    <div class="modal-body">
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Удалить', ['class'=>'btn btn-danger'])}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>




    </div>
    <div class="text-center">
        <div class="well">

        </div>
    </div>
@endsection