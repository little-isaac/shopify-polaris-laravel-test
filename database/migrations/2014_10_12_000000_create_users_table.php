<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('guid');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('shop_name');
            $table->string('money_format',255)->nullable();
            $table->string('shopify_plan');
            $table->string('store_name',255);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_uninstall')->default(false);
            $table->string('shopify_token')->nullable();
            $table->string('token')->nullable()->comment('this token is used for api access');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
