<?php $total = 0; ?>
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Все элементы</h1>
        <p><a class="btn btn-primary " href="/finance/create" role="button">Добавить элемент</a></p>
    </div>
    <div class="row">
    <div class="col-md-12">
        @if(!empty($finances))
            <section>
                <h3>Статистика</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Описание</th>
                        <th>Тип</th>
                        <th>Категория</th>
                        <th>Сумма</th>
                        <th>Дата</th>
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
                                {{$finance->category_id}}
                            </td>
                            <td>
                                {{$finance->sum}}
                            </td>
                            <td>
                                {{$finance->date}}
                            </td>
                        </tr>
                        @if($finance->type == "приход")
                            <?php $total+=$finance->sum ?>
                            @elseif($finance->type == "расход")
                            <?php $total-=$finance->sum ?>
                            @endif
                    @empty
                        <tr>
                            <td>No elements</td>
                        </tr>
                    </tbody>
                    @endforelse
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>: {{$total}}</td>
                        <td></td>
                    </tr>

                </table>
            </section>
        @endif
    </div>
    </div>
@endsection