<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service provider --
            CREATE TABLE service_provider (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                name VARCHAR(255) NOT NULL COMMENT 'The name of this service provider.',
                description TEXT COMMENT 'A description of this service provider.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this service provider deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'Institution that provides services.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_provider CASCADE');
    }
}

