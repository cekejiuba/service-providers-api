<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceTagMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service and tag mapping --
            CREATE TABLE service_tag_mapping (
                service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service.',
                tag_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the tag.',
                FOREIGN KEY (service_id) REFERENCES service(id) ON DELETE CASCADE,
                FOREIGN KEY (tag_id) REFERENCES tag(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between service and tag records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_tag_mapping CASCADE');
    }
}

