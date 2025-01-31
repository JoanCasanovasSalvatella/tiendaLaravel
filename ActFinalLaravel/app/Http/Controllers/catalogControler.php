<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//Libreria util para hacer sentencias db
use App\Models\catalogModel;//Importar el modelo correspondiente
use App\Models\categoryModel;//Importar el modelo correspondiente

class catalogControler extends Controller
{
    //Funcion para devolver todos los registros de la tabla catalogo
    public function catalog(Request $request){
        $var = new catalogModel();

        $catalog = DB::select('select * from catalogo');//Seleccionar todos los datos de la tabla catalogo
        
        // Retorna la vista pasando los datos del usuario
        return view('catalogo', compact('catalog'));
    }

    public function returnDatos(Request $request){
        $categories = DB::select('select * from categoria'); // Obtener todas las categorías de la BD
        return view('registerProd', compact('categories')); // Pasar las categorías a la vista
    }

    //Funcion para recuperar los datos de la bd para la vista modProd
    public function returnDatosUpd(Request $request){
        $categories = DB::select('select * from categoria'); // Obtener todas las categorías de la BD
        return view('modProd', compact('categories'))->with('success', 'Producto actualizado con éxito'); // Pasar las categorías a la vista
    }

    //Funcion para agregar registros al catalogo
    public function addCatalog(Request $request){
        //Validar los datos
        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'units'=>'required',
            'prun'=>'required',
            'cat'=>'required',
        ]);
    
        // Crear una nueva instancia del modelo de catálogo
        $catalog = new catalogModel();
        $catalog->nombre = $request->name;
        $catalog->descripcion = $request->desc;
        $catalog->unidades = $request->units;
        $catalog->precio_unidad = $request->prun;
        $catalog->categoria = $request->cat;
        $catalog->save(); // Guardar en la base de datos
        
        // Redirigir a la ruta 'productos' con un mensaje de éxito
        return redirect()->route('productos')->with('success', 'Producto registrado con éxito');
    }

    public function updCatalog(Request $request){
        // Validar los datos ingresados
        $request->validate([
            'id'=>'required|string|exists:catalogo,nombre',    
            'name'=>'required',
            'desc'=>'required',
            'units'=>'required',
            'price'=>'required',
            'cat'=>'required',
        ]); 

        $id = $request->id;
        $nombre = $request->name;
        $descripcion = $request->desc;
        $unidades = $request->units;
        $precio_unidad = $request->price;
        $categoria = $request->cat;

        //Sentencia
        $sentencia = "UPDATE catalogo 
        SET nombre = ?, descripcion = ?, unidades = ?, precio_unidad = ?, categoria = ? WHERE nombre = ?";
    
        //Valores a rellenar
        $valores = [$nombre, $descripcion, $unidades, $precio_unidad, $categoria, $id];
    
        //Consulta update
        DB::update($sentencia, $valores);
    
        // Redirigir a la ruta 'productos2' con un mensaje de éxito
        return redirect()->route('productos2')->with('success', 'Producto actualizado con éxito');
    }

    //Funcion que elimina un producto del catalogo
    public function delCatalog(Request $request){
        // Validar los datos ingresados
        $request->validate([
        'nombre' => 'required|string|exists:catalogo,nombre', // Validar que el nombre exista en la base de datos
        ]); 
    
        $name = $request->nombre;
    
        //Sentencia
        $sentencia = "DELETE FROM catalogo 
        WHERE nombre = ?";
    
        //Valores a rellenar
        $valores = [$name];
    
        //Consulta delete
        DB::delete($sentencia, $valores);

        return view('delProd')->with('success', 'Producto eliminado con exito');
    }
}
