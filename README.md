<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Project

### This project make base on simply multiple users login and redirect their own dashboard

1. Multiple role type users login with single form
. ![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/434fd501-c567-4a3c-acee-43f12bcf4037)

2. redirect own dashboard
   ![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/9d3dc16e-624e-4f3f-9669-c3103abbe0c0)

3. Other role type user login

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/e8013091-ddfe-4af1-b52a-7b5a77490221)

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/d5cb1da7-e80e-402f-9440-a88bdb093041)

### Now code details

1. I have created four type role for Admin, Doctor, Intern , Patient.
Here role table 
![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/57e4aec3-e740-4db5-94e1-2c2bc5bc70ae)

2. Also I have created migrattion and seeder
   command php artisan make:seeder UserTableSeeder

####===================================================

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $users = [
            ['name' => 'Admin', 'email'=>'admin@gmail.com', 'role'=>'1', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Doctor', 'email'=>'doctor@gmail.com', 'role'=>'2', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Intern', 'email'=>'intern@gmail.com', 'role'=>'3', 'password' => bcrypt('123456'), 'status' =>'1'],
            ['name' => 'Patient', 'email'=>'patient@gmail.com', 'role'=>'4', 'password' => bcrypt('123456'), 'status' =>'1'],
        ];

         foreach ($users as $key => $value) {
            User::create($value);
        }

    }
}
####=======================

3. Also I have crated seprated middleware for admin , doctor, intern and patient
   ![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/0218c051-c703-4a19-8522-63a4222ff5ea)

   Also I have assigned in the karnel.php file the middleware
   ![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/756d84d4-1ad3-4102-8ed1-359eb4d2ad3e)

   4. Also I have created prefix in route and make route .
   5. I have make controller and function login, register, login for all role type user is comman.
      ![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/17ca9671-dbc9-46be-9ee1-eb523f691d4a)


   6. Also I have make master layout in resource view assigned all type user's dashboard

   ### Also I have setup API with JWT toke

   Step 1. Install JWT Package

   composer require tymon/jwt-auth

    Step 2.  Add jwt package into a service provider

   Open config/app.php file and update the providers and aliases array.

'providers' => [

'Tymon\JWTAuth\Providers\LaravelServiceProvider',
],
'aliases' => [

    'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
     'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
],
Now , you have successfully added the JWT package into the service provider. Next, we will publish the package config. File.
 

Step 3. Publish jwt configuration


php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
Then you will see a new file in config/jwt.php
In the next step, you need to run a php artisan jwt:secret from the console to generate a secret auth secret.

Step 4. Generate JWT Key

Step 6. Create jwt middleware


use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
To use this middleware register this into Kernel. Open app\Http\Kernel.php


protected $routeMiddleware = [
        'jwt.verify' => \App\Http\Middleware\JwtMiddleware::class,
        'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
        'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
    ];

    

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/fff35d69-fa01-4f2a-bafa-41126ebaab49)

Step 7.  Create API Routes

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/28652d0a-ccfb-4157-85b8-8e56cf6416d0)

Step 8. Create api controller

php artisan make:controller ApiController

#### Check the code from Apicontroller 
Here login and getting token 
![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/6df3cc0c-ff33-43b8-a301-185eae33c8bb)

Here getting user with jwt token

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/33e84227-6162-4c53-9758-ae957326a714)

Also Logout with token 

![image](https://github.com/mdmuzaffer/multi-auth-with-api/assets/58267203/737c829d-b7de-457c-bf0a-a5e3dc31733f)










