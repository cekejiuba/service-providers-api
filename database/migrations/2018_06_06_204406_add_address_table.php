<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- address --
            CREATE TABLE address (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                primary_address_line VARCHAR(255) NOT NULL COMMENT 'The first line of an address (i.e. \"101 Test Street\").',
                secondary_address_line VARCHAR(255) COMMENT 'The secondary line of an address (i.e. \"Apt. #2\").',
                description TEXT COMMENT 'A description of this address.',
                address_type_id BIGINT UNSIGNED NOT NULL DEFAULT 1 COMMENT 'The type of postal address (defaults to \"physical\").',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this address deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.',
                FOREIGN KEY (address_type_id) REFERENCES address_type(id) ON DELETE CASCADE
            )
            COMMENT 'A postal address.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE address CASCADE');
    }
}

