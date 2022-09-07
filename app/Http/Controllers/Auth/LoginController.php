<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)
    {   

        $input = $request->all();
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',

        ]);
        //filtra si es correo, caso contrario name
        $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $dato=array($fieldType=>$input['name'],'password' => $input['password']);
        
        $salida='';
        $us=array();
        if($fieldType=='name'){
            $us=User::where('name',$dato['name'])->first();
            $salida='Usuario';
        }
        else{
            $us=User::where('email',$dato['email'])->first();
            $salida='Email';
        }


        //attempt para usar en array para consultar varias condiciones en auth
        if($us)
        {   
            if(Hash::check($dato['password'],$us->password)){
                //return response()->json(array('salida'=>$us),200);
                if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])))
                    return redirect('/');
            }
            else{
                return redirect()->route('login')
                ->with('error','Contraseña es incorrecta.');
            }
        }
            
        return redirect()->route('login')
            ->with('error',$salida.' es incorrecto.');
        
    }
}
