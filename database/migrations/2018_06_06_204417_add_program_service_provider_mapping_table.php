<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramServiceProviderMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- program and service provider mapping --
            CREATE TABLE program_service_provider_mapping (
                program_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the program.',
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                FOREIGN KEY (program_id) REFERENCES program(id) ON DELETE CASCADE,
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between program and service provider records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE program_service_provider_mapping CASCADE');
    }
}

