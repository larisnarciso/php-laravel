{{-- CONTATO --}}
@extends('layout.site')

@section('titulo', 'Contatos')

@section('conteudo')

  <h3>Essa é a view Index</h3>
  @foreach($contatos as $contato)
    <p>{{ $contato->nome }}</p>
    <p>{{ $contato->tel }}</p>
  @endforeach()
  
@endsection