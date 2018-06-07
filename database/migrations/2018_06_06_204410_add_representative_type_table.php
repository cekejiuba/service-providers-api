<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepresentativeTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- representative type --
            CREATE TABLE representative_type (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                name VARCHAR(255) NOT NULL COMMENT 'The type of representative (i.e. \"CEO,\" \"Executive Director\").',
                description TEXT COMMENT 'A description of this representative type.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this representative type deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'A type of representative, such as \"CEO\" or \"Executive Director\".';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE representative_type CASCADE');
    }
}

