<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//Libreria util para hacer sentencias db
use App\Models\categoryModel;//Importar el modelo correspondiente

class categoryControler extends Controller
{
    //Funcion para devolver todos los registros de la tabla categorias
    public function category(Request $request){
        $categoria = new categoryModel();

        $category = DB::select('select * from categoria order by created_at');//Seleccionar todos los datos de la tabla categoria
        
        // Retorna la vista pasando los datos del usuario
        return view('categorias', compact('category'));
    }

    //Función que crea una nueva categoria
    public function createCat(Request $request){
        //Validar los datos
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
        ]);
    
        // Crear una nueva instancia del modelo de catálogo
        $category = new categoryModel();
        $category->nombre = $request->name;
        $category->descripcion = $request->desc;
        $category->save(); // Guardar en la base de datos
        
        // Redirigir a la vista de registro de categoria con un mensaje de éxito
        return view('registerCat')->with('success', 'Categoria registrada con éxito');
    }

    //Funcion que actualiza los datos de una categoria
    public function modifyCat(Request $request){
    // Validar los datos ingresados
    $request->validate([
        'id'=>'required|string|exists:categoria,nombre',    
        'name'=>'required',
        'desc'=>'required',
    ]); 

    $id = $request->id;
    $nombre = $request->name;
    $descripcion = $request->desc;

    //Sentencia
    $sentencia = "UPDATE categoria 
    SET nombre = ?, descripcion = ? WHERE nombre = ?";

    //Valores a rellenar
    $valores = [$nombre, $descripcion, $id];

    //Consulta update
    DB::update($sentencia, $valores);

        // Redirigir a la ruta 'productos2' con un mensaje de éxito
        return view('modCat')->with('message', 'Categoria actualizada con éxito');
    }

    public function deleteCat(Request $request){
        // Validar los datos ingresados
        $request->validate([
            'name' => 'required|string|exists:categoria,nombre', // Validar que el nombre exista en la base de datos
            ]); 
        
            $name = $request->name;
        
            //Sentencia
            $sentencia = "DELETE FROM categoria 
            WHERE nombre = ?";
        
            //Valores a rellenar
            $valores = [$name];
        
            //Consulta delete
            DB::delete($sentencia, $valores);
        
        // Redirigir a la ruta con un mensaje de éxito
        return view('delCat')->with('success', 'Categoria eliminada con éxito');
    }
}
