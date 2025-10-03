<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      //verificar se o usuario está cadastrado no Banco de Dados
        if(User::where('email', 'augusto@nicolau.com')->first()){
             User::create([
                'name'=>'Augusto',
               'email'=>'augusto@nicolau.com',
                'password'=>'123456AB',
             ]);
       }



        }
}
