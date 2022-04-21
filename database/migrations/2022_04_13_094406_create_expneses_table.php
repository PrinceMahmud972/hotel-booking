<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expneses', function (Blueprint $table) {
            $table->id();
            $table->string('expense_name');
            $table->string('expense_amount');
            $table->string('expense_note');
            $table->string('expense_doc');
            $table->date('expense_date');
            $table->string('prepared_by');
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
        Schema::dropIfExists('expneses');
    }
}
