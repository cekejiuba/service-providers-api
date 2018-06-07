<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceTagMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service and tag mapping --
            CREATE TABLE linked_service_tag_mapping (
                linked_service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the linked service.',
                tag_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the tag.',
                FOREIGN KEY (linked_service_id) REFERENCES linked_service(id) ON DELETE CASCADE,
                FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between linked service and tag records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service_tag_mapping CASCADE');
    }
}

