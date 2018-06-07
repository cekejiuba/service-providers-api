<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceRepresentativeMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service and representative mapping --
            CREATE TABLE linked_service_representative_mapping (
                linked_service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the linked service.',
                representative_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the representative.',
                FOREIGN KEY (linked_service_id) REFERENCES linked_service(id) ON DELETE CASCADE,
                FOREIGN KEY (representative_id) REFERENCES representative(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between linked service and representative records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service_representative_mapping CASCADE');
    }
}

