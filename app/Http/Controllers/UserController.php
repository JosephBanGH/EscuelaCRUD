<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserLogin;
use App\Models\UserLoginStudent;
use App\Models\UserLoginApoderado;


class UserController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    /*public function verificalogin(Request $request) 
    {
        //return dd($request->all());
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese contraseña',
        ]);
        if (Auth::attempt($data))
        {
            $con='OK';
        }
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if ($query->count()!=0)
        {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if (password_verify($password, $hashp))
            {
                return redirect()->route('prueba');
            }
            else
            {
                return back()->withErrors(['password'=>'Contraseña no válida'])->withInput(request(['name', 'password']));
            }
        }
        else
        {
            return back()->withErrors(['name'=>'Usuario no válido'])->withInput(request(['name']));
        }
    }*/


    //Permitir el ingreso de diferentes usuarios
    public function verifylogin(Request $request){
        $credentials = [
            'userLogin' => $request->input('name'),
            'password' => $request->input('password')
        ];


        //Verificar en la tabla USER_LOGIN
        if($user=UserLogin::where('userLogin',$credentials['userLogin'])->first()){
            if(Auth::guard('web')->attempt($credentials)){
                return redirect()->route('prueba');
            }
        }


        //Verificar en la tabla USER_LOGIN_STUDENT
        if($student=UserLoginStudent::where('userLogin',$credentials['userLogin'])->first()){
            if(Auth::guard('students')->attempt($credentials)){
                return redirect()->route('prueba');
            }
        }


        //Verificar en la tabla USER_LOGIN_APODERADO
        if($apoderado=UserLoginApoderado::where('userLogin',$credentials['userLogin'])->first()){
            if(Auth::guard('apoderados')->attempt($credentials)){
                return redirect()->route('prueba');
            }
        }

        return back()->withError([
            'message'=> 'Las credenciales proporcionadas no son correctas.',
        ]);
    }

    /*public function verificalogin(Request $request){
        $credentials = [
            'userLogin' => $request->input('name'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            // Redirigir si la autenticación es correcta
            return redirect()->route('prueba');
        } else {
            // Redirigir si la autenticación falla
            return back()->withErrors([
                'message' => 'Las credenciales proporcionadas no son correctas.',
            ]);
            dd('error');
        }
    }*/

    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}