@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Создать новый элемент</h1>
    </div>
    <script type="text/javascript">
        function f1() {
            var type;
            //category = document.getElementById('category1');
            var sBox = document.getElementById('type1');
            var uIn = sBox.options[sBox.selectedIndex].value;
            if (uIn == 'приход') {
                document.getElementById('inc').style.display = 'block';
                document.getElementById('out').style.display = 'none';
            } else if (uIn == 'расход') {
                document.getElementById('inc').style.display = 'none';
                document.getElementById('out').style.display = 'block';
            }
            return false;
        }
        function f2() {
            var num = document.getElementById('sum').value;
            if (/^[A-Za-z]+$/.test(num)) {
                alert('Сумма должна быть только числом');
                document.getElementById('sum').value = '';
                return false;
            }
            document.getElementById('sum').value = num.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
            return false;
        }
    </script>
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
                    {{ Form::select('type', ['приход'=>'Приход', 'расход'=>'Расход'], null, ['class'=>'form-control', 'id'=>'type1', 'placeholder'=>'Выбрать', 'onchange' => 'f1(this.form);']) }}
                </div>
                <div class="form-group" id="inc" style="display: none">
                    {{ Form::label('category_id1', 'Категория *') }}
                    {{ Form::select('category_id1', $income, null, ['class'=>'form-control', 'id'=>'category1', 'placeholder'=>'Выбрать', ]) }}
                </div>
                <div class="form-group" id="out" style="display: none">
                    {{ Form::label('category_id', 'Категория *') }}
                    {{ Form::select('category_id', $outcome, null, ['class'=>'form-control', 'id'=>'category', 'placeholder'=>'Выбрать', ]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('sum', 'Сумма *') }}
                    {!! Form::text('sum', null, ['class' => 'form-control','step' => '0.1', 'id'=>'sum', 'onchange' => 'f2(this.form);']) !!}
                </div>
                <div class="form-group">
                    {{ Form::label('t', 'Отмеченные * поля являются обязательными') }}
                </div>


                {{Form::submit('Сохранить', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}
            </div>
    </div>

@endsection