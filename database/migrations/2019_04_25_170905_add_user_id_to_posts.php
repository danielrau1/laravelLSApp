<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // (6) in order to add a user id field to the posts table
            Schema::table('posts',function($table){
                $table->integer('user_id'); //when run the migration it will add user_id to table posts
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // To delete the field
        Schema::table('posts',function($table){
            $table->dropColumn('user_id');
        });
    }
}
