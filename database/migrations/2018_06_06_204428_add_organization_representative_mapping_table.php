<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationRepresentativeMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- organization and representative mapping --
            CREATE TABLE organization_representative_mapping (
                organization_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the organization.',
                representative_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the representative.',
                FOREIGN KEY (organization_id) REFERENCES organization(id) ON DELETE CASCADE,
                FOREIGN KEY (representative_id) REFERENCES representative(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between organization and representative records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE organization_representative_mapping CASCADE');
    }
}

