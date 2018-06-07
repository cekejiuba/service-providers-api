<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceEmailMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service and email mapping --
            CREATE TABLE linked_service_email_mapping (
                linked_service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the linked service.',
                email_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the email.',
                FOREIGN KEY (linked_service_id) REFERENCES linked_service(id) ON DELETE CASCADE,
                FOREIGN KEY (email_id) REFERENCES email(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between linked service and email records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service_email_mapping CASCADE');
    }
}

