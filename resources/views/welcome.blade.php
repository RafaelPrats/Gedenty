@extends('layouts_softui.master')

@section('titulo')
    Bienvenido
@endsection

@section('breadcrumb')
@endsection

@section('contenido')
    <h3>Bienvenido <small>{{ explode(' ', getUsuario(Session::get('id_usuario'))->nombre_completo)[0] }}</small></h3>
@endsection

@section('script_final')
@endsection
