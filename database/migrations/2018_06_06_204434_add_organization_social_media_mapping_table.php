<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationSocialMediaMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- organization and social media mapping --
            CREATE TABLE organization_social_media_mapping (
                organization_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the organization.',
                social_media_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the social media.',
                FOREIGN KEY (organization_id) REFERENCES organization(id) ON DELETE CASCADE,
                FOREIGN KEY (social_media_id) REFERENCES social_media(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between organization and social media records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE organization_social_media_mapping CASCADE');
    }
}

