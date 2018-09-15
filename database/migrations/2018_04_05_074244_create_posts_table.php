<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title_ar');
			$table->string('title_en');
			$table->text('details_ar');
			$table->text('details_en');
			$table->string('image');
			$table->string('file');
			$table->integer('category_id');
			$table->boolean('is_active');
			$table->boolean('is_deleted')->default(0);
			$table->boolean('comment_status');
			$table->integer('visit_account')->default(0);
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->integer('deleted_by')->default(0);
			$table->timestamp('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
