<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceProviderRepresentativeMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service provider and representative mapping --
            CREATE TABLE service_provider_representative_mapping (
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                representative_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the representative.',
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE,
                FOREIGN KEY (representative_id) REFERENCES representative(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between service provider and representative records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_provider_representative_mapping CASCADE');
    }
}

