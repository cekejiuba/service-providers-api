<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServiceProviderEmailMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- service provider and email mapping --
            CREATE TABLE service_provider_email_mapping (
                service_provider_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the service provider.',
                email_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the email.',
                FOREIGN KEY (service_provider_id) REFERENCES service_provider(id) ON DELETE CASCADE,
                FOREIGN KEY (email_id) REFERENCES email(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between service provider and email records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE service_provider_email_mapping CASCADE');
    }
}

