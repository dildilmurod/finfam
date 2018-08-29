@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
    <div class="navbar">
            <h2> Категории: </h2>
            @if(!empty($categories))
                @forelse($categories as $category)
                    <h3><a href="{{route('category.show', $category->id)}}">{{$category->title}}</a></h3>
                @empty
                    <p> No category</p>
                @endforelse
            @endif
            <br /><br />

        <a class="btn btn-primary" data-toggle="modal" href="#myModal">Добавить Категорию</a>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                {!! Form::open(['route'=>'category.store', 'method'=>'post']) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Добавить</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('title', 'Имя') }}
                            {{ Form::text('title', null, ['class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('type', 'Тип *') }}
                            {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], null, ['class'=>'form-control', 'id'=>'', 'placeholder'=>'Выбрать']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Добавить</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
        @if(!empty($finances))
            <section>
                <h3>Элементы</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Описание</th>
                        <th>Тип</th>
                        <th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($finances as $finance)
                        <tr>
                            <td>
                                {{$finance->title}}
                            </td>
                            <td>
                                {{$finance->type}}
                            </td>
                            <td>
                                {{$finance->sum}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No elements</td>
                        </tr>
                    </tbody>
                    @endforelse

                </table>
            </section>
    @endif
@endsection