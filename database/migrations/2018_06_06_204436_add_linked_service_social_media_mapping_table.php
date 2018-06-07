<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkedServiceSocialMediaMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- linked service and social media mapping --
            CREATE TABLE linked_service_social_media_mapping (
                linked_service_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the linked service.',
                social_media_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the social media.',
                FOREIGN KEY (linked_service_id) REFERENCES linked_service(id) ON DELETE CASCADE,
                FOREIGN KEY (social_media_id) REFERENCES social_media(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between linked service and social media records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE linked_service_social_media_mapping CASCADE');
    }
}

