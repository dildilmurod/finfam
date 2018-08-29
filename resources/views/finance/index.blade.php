<?php use App\Type; ?>
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Активные элементы</h1>
        <p><a class="btn btn-primary" href="/all" role="button">Статистика</a>  <a class="btn btn-primary" href="/finance/create" role="button">Добавить элемент</a> <a class="btn btn-primary" href="/category" role="button">Категории</a></p>
    </div>
    <div class="col-md-6">
        @if(count($finance)>= 1)
        @foreach($finance as $finances)
            <div class="well">
                <a href="finance/{{$finances->id}}"><h3>{{$finances->title}}</h3></a>
                <h4>{{$finances->date}}</h4>
                <h4>{{number_format($finances->sum, 0, '.', ' ')}}</h4>
                <h4>{{$finances->type}}</h4>

                <hr>
            </div>
        @endforeach
        {{--{{$finance->links()}}--}}
        @else
            <p>Элементов списка нет</p>
        @endif
    </div>
@endsection
