<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $registros = Curso::all();
        return view ('admin.cursos.index', compact('registros'));
    }
    
    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if(isset($dados['publicado']))
        {
            $dados['publicado'] = 'sim';
        }else{
            $dados['publicado'] = 'nao';
        }

        if($req->hasFile('imagem'))
        {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = 'img/cursos/';
            $ex = $imagem->guessClientExtension();
            $nomeImagem = 'imagem_'.$num.'.'.$ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir.'/'.$nomeImagem;
        }

        Curso::create($dados);

        return redirect()->route('admin.cursos');
    }
}
