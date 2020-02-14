@extends('adminlte::page')

@section('title', 'Formulário de Produto')

@section('content_header')
    <h1>Formulário de Produto</h1>
@stop

@section('content')
    @if (isset($produto))
        {!! Form::model($produto, ['url' => route('produto.update',$produto), 'method' => 'put']) !!}
    @else
         {!! Form::open(['url' => route('produto.store')]) !!}
    @endif
        {!! Form::label('descricao', 'Descrição do Produto ') !!}
        {!! Form::text('descricao') !!}

        {!! Form::label('estoque', 'Quantidade em Estoque') !!}
        {!! Form::text('estoque') !!}

        {!! Form::label('preco_custo', 'Preço do produto') !!}
        {!! Form::text('preco_custo') !!}

        {!! Form::label('preco_venda', 'Preço de vendas') !!}
        {!! Form::text('preco_venda') !!}

        {!! Form::label('unidade_medida', 'Unidade de Medida') !!}
        {!! Form::text('unidade_medida') !!}

        {!! Form::label('fabricante_id', 'Fabricante')!!}
        {!!Form::select('fabricante_id',$fabricantes)!!}

        {!! Form::submit('Salvar') !!}
    {!! Form::close() !!}
@stop

@section('css')
@stop

@section('js')
@stop
