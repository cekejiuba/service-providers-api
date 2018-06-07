<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceProviderAddressMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service provider and address mapping --
            CREATE TABLE service_provider_address_mapping (
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                address_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the address.',
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE,
                FOREIGN KEY (address_id) REFERENCES address(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between service provider and address records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_provider_address_mapping CASCADE');
    }
}

