<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- email --
            CREATE TABLE email (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                address VARCHAR(255) NOT NULL COMMENT 'The email address.',
                description TEXT COMMENT 'A description of this email address.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this email address deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'An email address.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE email CASCADE');
    }
}

