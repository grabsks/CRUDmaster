<link rel="stylesheet" href="/css/create.css">

@extends('templates.template')

@section('subTitle')
    @if(isset($user)) Editar @else Cadastrar @endif usuário
@endsection

@section('content')

    <div id="form-container">
        @if (isset($user))
            <form name="form-edit" id="form-edit" action="{{url("/$user->id")}}" method="post">
                @method('PUT')
                @csrf
                <div id="group1">
                    <h4>
                        <label for="nomeInput">Nome Completo</label>
                    </h4>
                    <input type="text" name="nomeInput" id="nomeInput" required value="{{$user->name ?? ''}}">

                    <h4>
                        <label for="cpfInput">CPF</label>
                    </h4>
                    <input 
                    type="text" 
                    name="cpfInput" 
                    id="cpfInput" 
                    required
                    value="{{$user->cpf ?? ''}}"
                    onkeypress="$(this).mask('000.000.000-00');">

                    <h4>
                        <label for="nascInput">Data de Nascimento</label>
                    </h4>
                    <input type="date" name="nascInput" id="nascInput" required value="{{$user->data_nasc ?? ''}}">

                    <h4>
                        <label for="emailInput">Email</label>
                    </h4>
                    <input type="email" name="emailInput" id="emailInput" required value="{{$user->email ?? ''}}">
                </div>
                
                <div id="group2">
                    <h4>
                        <label for="telInput">Telefone</label>
                    </h4>
                    <input 
                    type="text" 
                    name="telInput" 
                    id="telInput" 
                    required
                    value="{{$user->telefone ?? ''}}"
                    onkeypress="$(this).mask('(00) 00000-0000')">

                    <h4>
                        <label for="estadoSelect">Estado</label>
                    </h4>
                    <select 
                    name="estadoSelect" 
                    id="estadoSelect" 
                    onchange="cityUpdate()" 
                    value="{{$user->estado ?? ''}}"
                    required>                    
                        @if (!empty($estados)) {
                        <option value="{{ $user->estado ?? 'Selecione um estado' }}" default>{{ $user->estado ?? 'Selecione um estado' }}</option>
                            @foreach ($estados as $estado) {
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        @else
                            <option value="">Erro ao carregar os estados, recarregue a página</option>
                        @endif
                    </select>
                    
                    <h4>
                        <label for="cidadeSelect">Cidade</label>
                    </h4>
                    <select name="cidadeSelect" id="cidadeSelect" required value="{{$user->cidade ?? ''}}">
                        <option value="{{$user->cidade ?? ''}}">{{$user->cidade ?? ''}}</option>
                    </select>

                    <h4>
                        <label for="enderecoInput">Endereço</label>
                    </h4>
                    <input type="text" name="enderecoInput" id="enderecoInput" required value="{{$user->endereco ?? ''}}">

                </div>

                <div id="submit-container">
                    <input id="button" type="submit" value="Concluir edição" required>
                </div>
            </form>
        @else
            <form name="form-cad" id="form-cad" action="{{ route('users.store') }}" method="post">
                @csrf
                <div id="group1">
                    <h4>
                        <label for="nomeInput">Nome Completo</label>
                    </h4>
                    <input type="text" name="nomeInput" id="nomeInput" required>

                    <h4>
                        <label for="cpfInput">CPF</label>
                    </h4>
                    <input type="text" name="cpfInput" id="cpfInput" 
                    required
                    onkeypress="$(this).mask('000.000.000-00');">

                    <h4>
                        <label for="nascInput">Data de Nascimento</label>
                    </h4>
                    <input type="date" name="nascInput" id="nascInput" required>

                    <h4>
                        <label for="emailInput">Email</label>
                    </h4>
                    <input type="email" name="emailInput" id="emailInput" 
                    required>
                </div>
                
                <div id="group2">
                    <h4>
                        <label for="telInput">Telefone</label>
                    </h4>
                    <input type="text" name="telInput" id="telInput" 
                    required
                    onkeypress="$(this).mask('(00) 00000-0000')">

                    <h4>
                        <label for="estadoSelect">Estado</label>
                    </h4>
                    <select name="estadoSelect" id="estadoSelect" onchange="cityUpdate()" required>                    
                        @if (!empty($estados)) {
                            <option value="" default>Selecione um estado</option>
                            @foreach ($estados as $estado) {
                                <option value="{{$estado->id}}">{{$estado->nome}}</option>
                            @endforeach
                        @else
                            <option value="">Erro ao carregar os estados, recarregue a página</option>
                        @endif
                    </select>
                    
                    <h4>
                        <label for="cidadeSelect">Cidade</label>
                    </h4>
                    <select name="cidadeSelect" id="cidadeSelect" required>
                        <option value="" default>Selecione um estado</option>
                    </select>

                    <h4>
                        <label for="enderecoInput">Endereço</label>
                    </h4>
                    <input type="text" name="enderecoInput" id="enderecoInput" required>

                </div>

                <div id="submit-container">
                    <input id="button" type="submit" value="Cadastrar">
                </div>
            </form>
        @endif
    </div>
@endsection