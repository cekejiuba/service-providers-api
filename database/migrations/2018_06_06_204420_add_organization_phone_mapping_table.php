<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationPhoneMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- organization and phone mapping --
            CREATE TABLE organization_phone_mapping (
                organization_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the organization.',
                phone_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the phone.',
                FOREIGN KEY (organization_id) REFERENCES organization(id) ON DELETE CASCADE,
                FOREIGN KEY (phone_id) REFERENCES phone(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between organization and phone records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE organization_phone_mapping CASCADE');
    }
}

