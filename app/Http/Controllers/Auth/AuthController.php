<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function getLogout(){
        // $this->auth->logout();
        //Session::flush();

        if(Auth::check()){

          Auth::logout();
          return redirect()->guest('/');

        }
          echo 'ERROR';exit;
    
      
    }
    public function add(){
       $View=[];
       $View['data']=[];
       return view('auth.add',$View);
    }
    public function saveadd(Request $request){
        $validator=Validator::make($request->all(),[
                "name"=>"required",
                "email"=>"required",
                "password"=>"required"
                ]
        );
        if($validator->fails()){
            return redirect("/auth/add")->withErrors($validator)->withInput();
        }else{
            $this->create(
                    [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => $request->input('password')
                    ]
            );
            $request->session()->flash("success"," * Successfully. ");
            return redirect("/auth/add");
        }
    }
    public function getLogin(){
       // echo bcrypt('admin@2018');exit;
        return view('auth.getLogin');
    }
     public function postLogin(Request $request){
            if($request->isMethod("post")){
                $validate=Validator::make($request->all(),
                        [
                            'username'=>"required|max:225",
                            'password'=>"required"
                        ]
                );
                if($validate->fails()){
                    return redirect("/auth/login")->withErrors($validate)->withInput();
                }else{
       
                    if(Auth::attempt(['email'=>$request->input("username"),'password'=>$request->input("password")])){
                        return redirect("/admin/index/index");
                    }else{
                        $validate->errors()->add('user'," something wrong.");
                        return redirect("/auth/login")->withErrors($validate);
                    }
                }
            }


    }
}
