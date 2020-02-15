@extends('adminlte::page')

@section('title', 'Formulário de Vendas')

@section('content_header')
    <h1>Formulário de Vendas</h1>
@stop

@section('content')
    <form action="{{route('venda.store')}}" method="post"></form>
    @csrf

    <div class="form-group">
        <label for="pessoa_id">Cliente</label>
        <select class="form-control" name="pessoa_id" id="select-clientes"></select>
    
    </div>

@stop

@section('css')
@stop

@section('js')
@stop
