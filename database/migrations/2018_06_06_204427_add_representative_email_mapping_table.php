<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepresentativeEmailMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- representative and email mapping --
            CREATE TABLE representative_email_mapping (
                representative_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the representative.',
                email_id BIGINT UNSIGNED NOT NULL COMMENT 'The ID for the email.',
                FOREIGN KEY (representative_id) REFERENCES representative(id) ON DELETE CASCADE,
                FOREIGN KEY (email_id) REFERENCES email(id) ON DELETE CASCADE
            )
            COMMENT 'Mapping between representative and email records.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE representative_email_mapping CASCADE');
    }
}

