<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['admin', 'manager', 'cashier'])->default('cashier')->after('email');
        });

        // Copy existing Spatie roles into user_type
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $role = DB::table('model_has_roles')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->where('model_has_roles.model_id', $user->id)
                ->where('model_has_roles.model_type', 'App\\Models\\User')
                ->value('roles.name');

            if ($role && in_array($role, ['admin', 'manager', 'cashier'])) {
                DB::table('users')->where('id', $user->id)->update(['user_type' => $role]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
    }
};
