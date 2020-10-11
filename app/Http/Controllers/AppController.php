<?php

namespace App\Http\Controllers;

use App\Amount;
use Illuminate\Http\Request;
use App\Category;

class AppController extends Controller
{
    public function show()
    {
        return view('layouts.app');
    }

    public function loadCategory(Category $category)
    {
        $category = new Category;
        $category->name = 'Vývary';
        $category->save();
        $category = new Category;
        $category->name = 'Polévky';
        $category->save();
        $category = new Category;
        $category->name = 'Štávy';
        $category->save();
        $category = new Category;
        $category->name = 'Základy a omáčky';
        $category->save();
        $category = new Category;
        $category->name = 'Kořenící směsi';
        $category->save();
        $category = new Category;
        $category->name = 'Koření';
        $category->save();
        $category = new Category;
        $category->name = 'Vložky a závařky';
        $category->save();
        $category = new Category;
        $category->name = 'Sterilované výrobky';
        $category->save();
        $category = new Category;
        $category->name = 'Přílohy';
        $category->save();
        $category = new Category;
        $category->name = 'Těstoviny';
        $category->save();
        $category = new Category;
        $category->name = 'Moučníky';
        $category->save();
        $category = new Category;
        $category->name = 'Džemy';
        $category->save();
        $category = new Category;
        $category->name = 'Dezertní omáčky';
        $category->save();
        $category = new Category;
        $category->name = 'Nápoje';
        $category->save();
        $category = new Category;
        $category->name = 'Zdravá výživa';
        $category->save();
        $category = new Category;
        $category->name = 'Doplňkový sortiment';
        $category->save();
        $category = new Category;
        $category->name = 'Ostatní';
        $category->save();
        return back();
    }
}
