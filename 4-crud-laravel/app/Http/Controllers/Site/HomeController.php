<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(3);
        return view('home', compact('cursos'));
    }
}
