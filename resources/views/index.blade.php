<link rel="stylesheet" href="css/index.css">

@extends('templates.template')

@section('subTitle')
    Usuários cadastrados
@endsection

@section('content')
    @csrf
    <div id="list-heading">
        <a id="list-add-btn" onmouseover="buttonAddDescription()" onmouseout="buttonRmvDescription()" href="/create">
            +
        </a>
        <div>Nome</div>
        <div>Email</div>
        <div>Telefone</div>
        <div>Opções</div>
    </div>

    <div id="list-container">
        @if(!empty($users))
            @foreach($users as $user)
            <div class="list-row">
                <div class="list-item">{{$user->name}}</div>
                <div class="list-item">{{$user->email}}</div>
                <div class="list-item">{{$user->telefone}}</div>
                <div class="list-item icons">
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" id="edit">
                        <i class="fi-xnsuxl-setting-solid"></i>
                    </a>
                
                    <a href="{{ route('users.destroy', ['id' => $user->id]) }}" id="delete">
                        @csrf
                        @method('DELETE')
                        <i class="fi-xnsuxl-trash-bin"></i>
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <h2 style="color: white;">Não há nenhum usuário cadastrado ainda, deseja cadastrar?</h2>
        @endif
@endsection