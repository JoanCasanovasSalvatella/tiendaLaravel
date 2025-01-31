<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;//Libreria util para hacer sentencias db
use Illuminate\Http\Request;

class userControler extends Controller
{
//Funcion que inserta usuarios en la base de datos
public function store(Request $request){
    //Validar los datos
    $request->validate([
        'nick'=>'required',
        'mail'=>'required',
        'name'=>'required',
        'lastName'=>'required',
        'dni' =>'required',
        'date' =>'required',
        'password' =>'required',
        'role' =>'required',
    ]);

    $user = new userModel();
    //Obtiene los valores introducidos en el formulario y los asigna a las variables
    $user->nick = $request -> nick;
    $user->email = $request -> mail;
    $user->nombre = $request -> name;
    $user->apellidos = $request -> lastName;
    $user->dni = $request -> dni;
    $user->fecha_nacimiento = $request -> date;
    $user->password = Hash::make($request->password); // Encriptar la contraseña
    $user->rol = $request -> role;
    $user->save(); //Guardar en la bd

    //Redirigir al usuario
    return redirect() -> route('inicio')->with('success', 'Usuario registrado con exito');
}

//Funcion que valida los datos introducidos, inicia session y redirige a la pagina del perfil
public function logearse(Request $request){
    // Validar los datos de entrada
    $request->validate([
        'nickname' => 'required|string', // Validar el nombre de usuario
        'password' => 'required|string', // Validar la contraseña
    ]);

    // Crear las credenciales con el usuario y la contraseña
    $credentials = [
        'nick' => $request->nickname, // Usuario ingresado
        'password' => $request->password, // Contraseña ingresada
    ];

    // Intentar autenticar al usuario
    if (Auth::attempt($credentials)) {
        //Si la autenticación fue exitosa
        $user = Auth::user();

        // Obtener el rol del usuario
        $rol = $user->rol;           

        // Redirigir según el rol del usuario
        if ($rol == 'Administrador') {
            // Obtiene todos los registros de la tabla 'users'
            $users = DB::select('select * from users');

            // Retorna la vista pasando los datos como una variable
            return view('profileAdm', compact('users'))->with('success', 'Inicio de sesión exitoso.');
        } 

        if($rol == 'Cliente'){                            
            // Retorna la vista pasando los datos del usuario
            return view('profile', compact('user'))->with('success', 'Inicio de sesión exitoso.');
        }
      

    } else {
        // Si las credenciales son incorrectas salta un mensaje de error
        return redirect()->route('login')->with('error', 'Credenciales incorrectas.');
    }
}

//Funcion para volver al perfil
public function profile(Request $request){
    $user = Auth::user();

    // Obtener el rol del usuario
    $rol = $user->rol; 

    if($rol =='Administrador'){
        //Recuperar todos los usuarios de la bd
        $users = DB::select('SELECT * FROM users'); // Recuperar todos los usuarios de la base de datos

        // Retorna la vista pasando los datos del usuario y el array de usuarios obtenidos de la bd
        return view('profileAdm', compact('user', 'users'));
    }

    if($rol == 'Cliente'){
        // Retorna la vista pasando los datos del usuario
        return view('profile', compact('user'));
    }
}

public function storeAdmin(Request $request){
    //Validar los datos
    $request->validate([
        'nick'=>'required',
        'mail'=>'required',
        'name'=>'required',
        'lastName'=>'required',
        'dni' =>'required',
        'date' =>'required',
        'password' =>'required',
        'role' =>'required',
    ]);

    $user = new userModel();
    //Obtiene los valores introducidos en el formulario y los asigna a las variables
    $user->nick = $request -> nick;
    $user->email = $request -> mail;
    $user->nombre = $request -> name;
    $user->apellidos = $request -> lastName;
    $user->dni = $request -> dni;
    $user->fecha_nacimiento = $request -> date;
    $user->password = Hash::make($request->password); // Encriptar la contraseña
    $user->rol = $request -> role;
    $user->save(); //Guardar en la bd

    //Redirigir al usuario
    return redirect() -> route('usersAdmin')->with('success', 'Usuario registrado con exito');
}

//Funcion que valida los datos introducidos, inicia session y redirige a la pagina del perfil
public function updAdmin(Request $request){
    // Validar los datos ingresados
    $request->validate([
    'dni' => 'required|string|exists:users,dni', // Validar que el DNI exista en la base de datos
    'nick' => 'nullable|string|max:255', // Validar el nuevo nickname
    'name' => 'nullable|string|max:255', // Validar el nuevo nombre
    'lastName' => 'nullable|string|max:255', // Validar el nuevo apellido
    'mail' => 'nullable|email|unique:users,email,',
    'date' => 'nullable|date', // Validar que la fecha sea válida
    'password' => 'nullable|string', // Validar que la contraseña tenga al menos 8 caracteres
    ]); 

    $username = $request ->nick;
    $name = $request ->name;
    $apellido = $request ->lastName;
    $correo = $request ->mail;
    $fecha = $request ->date;
    $passwd = $request ->password;
    $dni = $request->dni;

    //Sentencia
    $sentencia = "UPDATE users 
    SET nick = ?, nombre = ?, apellidos = ?, email = ?, fecha_nacimiento = ?, password = ?
    WHERE dni = ?";

    //Valores a rellenar
    $valores = [$username, $name, $apellido, $correo, $fecha, $passwd, $dni];

    //Consulta update
    DB::update($sentencia, $valores);

    // Retorna la vista pasando los datos como una variable
    return view('profileAdm')->with('success', 'Datos actualizados con exito.');          
    }

//Funcion que elimina un usuario
public function delAdmin(Request $request, $users){
    // Validar los datos ingresados
    $request->validate([
    'dni' => 'required|string|exists:users,dni', // Validar que el DNI exista en la base de datos
    ]); 

    $dni = $request->dni;

    //Sentencia
    $sentencia = "DELETE FROM users 
    WHERE dni = ?";

    //Valores a rellenar
    $valores = [$dni];

    //Consulta delete
    DB::delete($sentencia, $valores);

    //Recuperar todos los usuarios de la bd
    $users = DB::select('SELECT * FROM users'); // Recuperar todos los usuarios

    // Retorna la vista pasando los datos como una variable
    return view('profileAdm', compact('users'))->with('success', 'Usuario eliminado con exito.');          
    }
}
    