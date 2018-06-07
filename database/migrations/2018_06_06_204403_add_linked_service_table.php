<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service --
            CREATE TABLE linked_service (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                name VARCHAR(255) NOT NULL COMMENT 'The name of this linked service.',
                description TEXT COMMENT 'A description of this linked service.',
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The service provider getting a service linked to it.',
                service_id BIGINT UNSIGNED NOT NULL COMMENT 'The service being linked to a service provider.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this linked service deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.',
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE,
                FOREIGN KEY (service_id) REFERENCES service(id) ON DELETE CASCADE
            )
            COMMENT 'An instance of a service linked to a particular service provider.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service CASCADE');
    }
}

