<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepresentativePhoneMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- representative and phone mapping --
            CREATE TABLE representative_phone_mapping (
                representative_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the representative.',
                phone_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the phone.',
                FOREIGN KEY (representative_id) REFERENCES representative(id) ON DELETE CASCADE,
                FOREIGN KEY (phone_id) REFERENCES phone(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between representative and phone records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE representative_phone_mapping CASCADE');
    }
}

