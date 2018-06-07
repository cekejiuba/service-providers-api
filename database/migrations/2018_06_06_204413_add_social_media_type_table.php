<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialMediaTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec("
            -- social media type --
            CREATE TABLE social_media_type (
                id SERIAL PRIMARY KEY NOT NULL COMMENT 'The unique ID for this record.',
                name VARCHAR(255) NOT NULL COMMENT 'The type of social media (i.e. \"Facebook,\" \"Twitter\").',
                description TEXT COMMENT 'A description of this social media type.',
                is_deleted BOOLEAN NOT NULL DEFAULT FALSE COMMENT 'Is this social media type deleted?',
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'The time this record was created.',
                updated_at TIMESTAMP COMMENT 'The time this record was last updated.',
                deleted_at TIMESTAMP COMMENT 'The time this record was last deleted.'
            )
            COMMENT 'A type of social media, such as \"Facebook\" or \"Twitter\".';
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection()->getPdo()->exec('DROP TABLE social_media_type CASCADE');
    }
}

