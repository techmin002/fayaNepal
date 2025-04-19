<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Step 1: Update existing values to prevent truncation error
        DB::table('donors')->where('status', 'active')->update(['status' => 'on']);
        DB::table('donors')->where('status', 'inactive')->update(['status' => 'off']);

        // Step 2: Alter ENUM
        DB::statement("ALTER TABLE donors MODIFY status ENUM('on', 'off') DEFAULT 'on'");
    }

    public function down()
    {
        // Revert values before changing ENUM back
        DB::table('donors')->where('status', 'on')->update(['status' => 'active']);
        DB::table('donors')->where('status', 'off')->update(['status' => 'inactive']);

        DB::statement("ALTER TABLE donors MODIFY status ENUM('active', 'inactive') DEFAULT 'active'");
    }
};


