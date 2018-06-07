<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- social media --
            CREATE TABLE social_media (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                url VARCHAR(255) NOT NULL COMMENT 'The social media URL.',
                description TEXT COMMENT 'A description of this social media.',
                social_media_type_id BIGINT UNSIGNED COMMENT 'The type of social media.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this social media deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.',
                FOREIGN KEY (social_media_type_id) REFERENCES social_media_type(id) ON DELETE CASCADE
            )
            COMMENT 'A social media URL.';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE social_media CASCADE');
    }
}

