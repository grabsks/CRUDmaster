<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->url = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
        $this->user = new Usuario();
    }

    public function index()
    {
        $users = $this->user->all();

        return view('index', compact('users'));
    }

    public function create()
    {
        $estados = collect(json_decode(file_get_contents($this->url)))->sortBy('nome');

        return view ('create', compact('estados'));
    }

    public function store(Request $request)
    {

        $cad = $this->user->create([
            'name'=>$request->nomeInput,
            'cpf'=>$request->cpfInput,
            'data_nasc'=>$request->nascInput,
            'email'=>$request->emailInput,
            'telefone'=>$request->telInput,
            'estado'=>$this->setNametoState($request->estadoSelect),
            'cidade'=>$request->cidadeSelect,
            'endereco'=>$request->enderecoInput,
        ]);

        if ($cad) {
            return redirect('/');
        }

        return view('index');
    }

    public function show($id)
    {
        echo $id;
    }
    public function edit($id)
    {
        $user = $this->user->find($id);

        $estados = collect(json_decode(file_get_contents($this->url)))->sortBy('nome');

        return view ('create', compact('user', 'estados'));
    }

    public function update(Request $request, $id)
    {
        if (is_numeric($request->estadoSelect)) {
            $this->user->where(['id' => $id])->update([
                'name'=>$request->nomeInput,
                'cpf'=>$request->cpfInput,
                'data_nasc'=>$request->nascInput,
                'email'=>$request->emailInput,
                'telefone'=>$request->telInput,
                'estado'=>$this->setNametoState($request->estadoSelect),
                'cidade'=>$request->cidadeSelect,
                'endereco'=>$request->enderecoInput,
            ]);
        }

        $this->user->where(['id' => $id])->update([
            'name'=>$request->nomeInput,
            'cpf'=>$request->cpfInput,
            'data_nasc'=>$request->nascInput,
            'email'=>$request->emailInput,
            'telefone'=>$request->telInput,
            'estado'=>$request->estadoSelect,
            'cidade'=>$request->cidadeSelect,
            'endereco'=>$request->enderecoInput,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return redirect ('/');
    }

    public function setNametoState($selecionado)
    {
        $estados = json_decode(file_get_contents($this->url));

        foreach ($estados as $estado) {
            if ($estado->id == $selecionado) {
                $nomeEstado = $estado->nome;
                break;
            }
        }
        return $nomeEstado;
    }
}
