<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- phone --
            CREATE TABLE phone (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                country_code INTEGER COMMENT 'The international calling code for the country this phone number is from (i.e. \"1\" for United States).',
                number VARCHAR(14) NOT NULL COMMENT 'The phone number, non-formatted. Only integers.',
                description TEXT COMMENT 'A description of this phone number.',
                phone_type_id BIGINT UNSIGNED NOT NULL DEFAULT 1 COMMENT 'The type of phone number (defaults to \"land line\").',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this phone number deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.',
                FOREIGN KEY (phone_type_id) REFERENCES phone_type(id) ON DELETE CASCADE
            )
            COMMENT 'A phone number.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE phone CASCADE');
    }
}

