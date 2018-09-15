<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
			$table->string('category_name_ar');
			$table->string('category_name_en');
			$table->boolean('is_active')->default(1);
			$table->boolean('is_deleted')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
