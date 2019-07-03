<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Schema::table('reviews', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onDelete('cascade');
        });

        Schema::table('review_tags', function (Blueprint $table) {
            $table
                ->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
}
