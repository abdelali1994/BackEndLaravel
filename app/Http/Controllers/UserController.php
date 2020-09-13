<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;
class UserController extends Controller
{
    public $successStatus = 200;
    /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function login(){ 
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success' => $success,'user'=>$user], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'Unauthorised'], 401); 
            } 
        }
    /** 
         * Register api 
         * 
         * @return \Illuminate\Http\Response 
         */ 

        public function register(Request $request) 

        { 

            $validator = Validator::make($request->all(), [ 
                'first_name' => 'required|min:4|max:20', 
                'last_name' => 'required|min:4|max:20', 
                'email' => 'required|email', 
                'cin' => 'required|min:4|max:20', 
                'phone' => 'required|numeric|min:10|max:12', 
                'addresse' => 'required', 
                'password' => 'required', 
                'c_password' => 'required|same:password'
            ]);

                if ($validator->fails()) { 
                            return response()->json(['error'=>$validator->errors()], 401);            
                        }
                $input = $request->all(); 
                        $input['password'] = bcrypt($input['password']); 
                        $user = User::create($input); 
                        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                        $success['name'] =  $user->name;
                return response()->json(['success'=>$success], $this-> successStatus); 
                    }
    /** 
         * details api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function updateAvatar(Request $request)
    {
        // dd($request->get('event_id'));
        $user = Auth::user();
        // return response()->json(['user' => $user], $this-> successStatus);

        $file= $request->file('file');
        $ext= $file->extension();
        $name=Carbon::now()->format('d-m-Y').'-'.Str::random(10).'.'.$ext;
        $path=Storage::disk('public')->putFileAs('users',$file,$name);
        $user->avatar = 'users/'.$name;
        $user->save();
        // dd($request->all());
        return response()->json(['user' => $user], $this-> successStatus);
        // foreach ($request->all()  as $key => $req) {
            # code...
            // $user->$key = $req;
        }
        public function details() 
        {
            $user = Auth::user(); 
            // return UserResource::collection($user);
            // return response()->json(['success' => $user], $this-> successStatus); 
            return response()->json(['success' =>new UserResource($user) ], $this-> successStatus); 
        }

        public function index()
        {
            $users=User::all();
            // return $users[0]->locations;
            // return  UserResource::collection($users);
            return response()->json(UserResource::collection($users));
        }
        public function show($id)
        {
            // $user = User::findOrFail($id);
            // return UserResource::collection(User::all()->keyBy->id);
            return  new UserResource(User::findOrFail($id));
            // return UserResource::collection($user);
        }
        public function update(Request $request, $id)
        // public function update(StoreUserRequest $request, $id)
        {

            // $request->user()->fill([
            //     'password' => Hash::make($request->newPassword)
            // ])->save();

            // $validator = Validator::make($request->all(), [ 
            //     'first_name' => 'required|min:4|max:20', 
            //     'last_name' => 'required|min:4|max:20', 
            //     'email' => 'required|email', 
            //     'cin' => 'required|min:4|max:20', 
            //     'phone' => 'required|numeric|min:10|max:12', 
            //     'addresse' => 'required', 
            //     'password' => 'required', 
            //     'c_password' => 'required|same:password'
            // ]);

            // if ($validator->fails()) { 
            //     return response()->json(['error'=>$validator->errors()], 401);            
            // }
          

            $user = User::findOrFail($id)->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'cin'=>$request->cin,
                'phone'=>$request->phone,
                'addresse'=>$request->addresse,
                'password'=>Hash::make($request->password),
    
            ]);
            // return UserResource::collection(User::all()->keyBy->id);
            // return new UserResource($user);
            // return $user;
        }
    
}
