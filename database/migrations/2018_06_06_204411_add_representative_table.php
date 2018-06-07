<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepresentativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- representative --
            CREATE TABLE representative (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                first_name VARCHAR(255) NOT NULL COMMENT 'The first name[s] of this representative.',
                middle_name VARCHAR(255) COMMENT 'The middle name[s] of this representative.',
                last_name VARCHAR(255) NOT NULL COMMENT 'The last name[s] of this representative.',
                prefix VARCHAR(255) COMMENT 'A prefix to the name of the representative (i.e. \"Dr.\").',
                suffix VARCHAR(255) COMMENT 'A suffix to the name of the representative (i.e. \"Jr.\" or \"III\").',
                title TEXT COMMENT 'A title of this representative, such as a position within an organization.',
                description TEXT COMMENT 'A description of this representative.',
                representative_type_id BIGINT UNSIGNED COMMENT 'The type of representative.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this organization deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.',
                FOREIGN KEY (representative_type_id) REFERENCES representative_type(id) ON DELETE CASCADE
            )
            COMMENT 'A notable representative of an organization.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE representative CASCADE');
    }
}

