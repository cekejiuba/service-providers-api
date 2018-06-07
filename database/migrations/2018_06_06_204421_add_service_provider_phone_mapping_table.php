<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceProviderPhoneMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service provider and phone mapping --
            CREATE TABLE service_provider_phone_mapping (
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                phone_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the phone.',
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE,
                FOREIGN KEY (phone_id) REFERENCES phone(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between service provider and phone records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_provider_phone_mapping CASCADE');
    }
}

