<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Tambahkan field untuk manajemen pengguna.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('role')
                ->default('editor')
                ->after('password');

            $table->boolean('is_active')
                ->default(true)
                ->after('role');

            $table->timestamp('last_login_at')
                ->nullable()
                ->after('is_active');

        });


        /*
        |--------------------------------------------------------------------------
        | Jadikan akun pengguna pertama sebagai Super Admin
        |--------------------------------------------------------------------------
        */

        $firstUser = DB::table('users')
            ->orderBy('id')
            ->first();

        if ($firstUser) {

            DB::table('users')
                ->where('id', $firstUser->id)
                ->update([
                    'role' => 'super_admin',
                    'is_active' => true,
                ]);

        }
    }


    /**
     * Menghapus field jika migration di-rollback.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'role',
                'is_active',
                'last_login_at',
            ]);

        });
    }
};