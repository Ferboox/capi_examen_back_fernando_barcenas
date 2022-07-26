<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

 
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function getAll()
    {
        // Consulta para obtener la información y domicilio de todos los usuarios.
        $array = DB::table('users')->join('user_domicilio','user_domicilio.user_id','users.id')->select('users.*','user_domicilio.*')->get();

        // Arreglo para calcular la edad de cada usuario y agregarlo al arreglo a devolver.
        foreach($array as $a){
            $age = \Carbon\Carbon::parse($a->fecha_nacimiento)->age;         
            $a->edad = $age;
        }
        // Retorno de variable en formato JSON.
        return response()->json($array);
    }
}