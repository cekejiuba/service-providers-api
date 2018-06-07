<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationWebsiteMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- organization and website mapping --
            CREATE TABLE organization_website_mapping (
                organization_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the organization.',
                website_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the website.',
                FOREIGN KEY (organization_id) REFERENCES organization(id) ON DELETE CASCADE,
                FOREIGN KEY (website_id) REFERENCES website(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between organization and website records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE organization_website_mapping CASCADE');
    }
}

