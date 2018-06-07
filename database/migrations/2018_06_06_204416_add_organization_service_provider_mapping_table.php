<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationServiceProviderMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- organization and service provider mapping --
            CREATE TABLE organization_service_provider_mapping (
                organization_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the organization.',
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                FOREIGN KEY (organization_id) REFERENCES organization(id) ON DELETE CASCADE,
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between organization and service provider records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE organization_service_provider_mapping CASCADE');
    }
}

