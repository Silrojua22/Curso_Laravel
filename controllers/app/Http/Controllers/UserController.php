<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() 
    {

    //Traer todos los usuarios

        $users = User::all();
        return view('user.index',compact('users')); // ['users'-> $users];

    //Traer el usuario segun la condicion where(donde), en este caso sea mayor a 18
    //Tenemos tambien la concidion orWhere, donde lo trae si se cumple una u otra

        // $users = User::where('age', '>=', '30') -> get();
        // return view('user.index',compact('users'));

    //Ordenamiento: asc, desc-->podemos indicar el orden que quiere tarer

        // $users = User::where('age', '>=', '30')-> orderBy('age', 'asc') -> get();
        // return view('user.index',compact('users'));

    //Especificar un limite --> Sirve para las paginaciones

        // $users = User::where('age', '>=', '30')-> limit(5, 10) -> get();
        // return view('user.index',compact('users'));
    
    //Trae el primero

        // $users = User::where('age', '>=', '30')-> first() -> get();
        // return view('user.index',compact('users'));

    //Traer por id --> findOrFail(1) si no lo ecuentra arroja un error

        // $users = User::find(1);
        // return view('user.index',compact('users'));

    }
    //Crear usuarios
    public function create()
    {
        $user = new User;
        $user ->name = "Silvio";
        $user -> email = "quetal@demo.com";
        $user -> password = Hash::make('123456');
        $user -> age = 25;
        $user -> address = 'calle falsa 123';
        $user -> zip_code = 290909;
        $user ->save();

        User::create([
            "name" => "Rodrigo",
            'email' => 'info@mail.com',
            'password' => Hash::make('12345678'),
            'age' => 32,
            'address' => "Avenida de prueba",
            'zip_code' => 280808,
        ]);

        User::create([
            'name' => 'Juarez',
            'email' => 'info@demodemo.com',
            'password' => Hash::make('12345678'),
            'age' => 38,
            'address' => "Avenida de prueba 2",
            'zip_code' => 280808,
        ]);
        
        return redirect()->route('user-index');
    }
}
