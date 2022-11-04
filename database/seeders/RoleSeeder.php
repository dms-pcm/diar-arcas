<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            $data = [
                [
                    'id' => 1,
                    'name' => 'Super Admin'
                ],
                [
                    'id' => 2,
                    'name' => 'HRD'
                ],
                [
                    'id' => 3,
                    'name' => 'Karyawan'
                ]
            ];

            foreach ($data as $key => $value) {
                $role = Role::find($value['id']);

                if (empty($role)) {
                    $role = new Role();
                }

                $role->name = $value['name'];
                $role->save();
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
        }
    }
}
