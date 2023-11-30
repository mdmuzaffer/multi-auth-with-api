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
   7. 
 








