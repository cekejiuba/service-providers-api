<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- website --
            CREATE TABLE website (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                url VARCHAR(255) NOT NULL COMMENT 'The website URL.',
                description TEXT COMMENT 'A description of this website.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this website deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'A website URL.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE website CASCADE');
    }
}

