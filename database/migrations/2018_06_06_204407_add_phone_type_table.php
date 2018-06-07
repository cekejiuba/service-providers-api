<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- phone type --
            CREATE TABLE phone_type (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                name VARCHAR(255) NOT NULL COMMENT 'The type of phone number (i.e. \"land line,\" \"cell\").',
                description TEXT COMMENT 'A description of this phone type.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this phone type deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'A type of phone number, such as \"land line\" or \"cell\".';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE phone_type CASCADE');
    }
}

