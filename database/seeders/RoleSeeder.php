<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Capturar possíveis exceções durante a execução do seeder.
        try {
            /******* Super Admin - tem acesso a todas as páginas *******/
            // Se não encontrar o registro, cadastra o registro no BD
            Role::firstOrCreate(
                ['name' => 'Super Admin'],
                ['name' => 'Super Admin'],
            );

            /******* Admin *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $admin = Role::firstOrCreate(
                ['name' => 'Admin'],
                ['name' => 'Admin'],
            );

            // Cadastrar permissão para o papel
            $admin->givePermissionTo([
                'dashboard',

                'index-course',
                'show-course',
                'create-course',
                'edit-course',
                'destroy-course',

                'index-course-batch',
                'show-course-batch',
                'create-course-batch',
                'edit-course-batch',
                'destroy-course-batch',

                'index-module',
                'show-module',
                'create-module',
                'edit-module',
                'destroy-module',

                'index-lesson',
                'show-lesson',
                'create-lesson',
                'edit-lesson',
                'destroy-lesson',

                'index-course-status',
                'show-course-status',
                'create-course-status',
                'edit-course-status',
                'destroy-course-status',

                'show-profile',
                'edit-profile',
                'edit-password-profile',

                'index-user',
                'show-user',
                'create-user',
                'edit-user',
                'edit-password-user',
                'destroy-user',
                'edit-roles-user',
                'generate-pdf-user',
                'generate-pdf-users',
                'generate-csv-users',

                'index-user-status',
                'show-user-status',
                'create-user-status',
                'edit-user-status',
                'destroy-user-status',

                'index-role',
                'show-role',
                'create-role',
                'edit-role',
                'destroy-role',

                'index-role-permission',

                'index-transactions',
                'show-transactions',
                'create-transactions',
                'edit-transactions',
                'destroy-transactions',

                'index-precos',
                'create-precos',
                'edit-precos',
                'destroy-precos',
                'pdfpreco-precos',


            ]);

            /******* Professor *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $teacher = Role::firstOrCreate(
                ['name' => 'Professor'],
                ['name' => 'Professor'],
            );

            // Cadastrar permissão para o papel
            $teacher->givePermissionTo([
                'dashboard',

                'index-course',
                'show-course',

                'index-course-batch',
                'show-course-batch',

                'index-module',
                'show-module',

                'index-lesson',
                'show-lesson',
                'create-lesson',
                'edit-lesson',
                'destroy-lesson',

                'show-profile',
                'edit-profile',
                'edit-password-profile',

                'index-user',
                'show-user',


            ]);


            /******* Usuario *******/
            // Se não encontrar o registro, cadastra o registro no BD
            $student = Role::firstOrCreate(
                ['name' => 'Usuario'],
                ['name' => 'Usuario'],
            );

            // Cadastrar permissão para o papel
            $student->givePermissionTo([
                'dashboard',

                'show-profile',
                'edit-profile',
                'edit-password-profile',

                
                'create-course',
             
            ]);
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Papel não cadastrado.', ['error' => $e->getMessage()]);
        }
    }
}
