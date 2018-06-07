<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceWebsiteMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service and website mapping --
            CREATE TABLE linked_service_website_mapping (
                linked_service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the linked service.',
                website_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the website.',
                FOREIGN KEY (linked_service_id) REFERENCES linked_service(id) ON DELETE CASCADE,
                FOREIGN KEY (website_id) REFERENCES website(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between linked service and website records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service_website_mapping CASCADE');
    }
}

