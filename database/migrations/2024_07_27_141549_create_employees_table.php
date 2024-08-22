<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code', 60);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('dob');
            $table->integer('gender');
            $table->string('email');
            $table->string('mobile', 30);
            $table->integer('religion_id')->comment('1:Hindu 2:Muslim 3:Sikh 4:Cristian');
            $table->integer('category_id')->comment('1:General 2:OBC 3:SC 4:ST');
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->integer('emp_type')->comment('1:Full time, 2:Part time');
            $table->date('joining_date')->nullable();
            $table->integer('state');
            $table->integer('city');
            $table->string('caddress');
            $table->string('paddress');
            $table->string('photo');
            $table->tinyInteger('status')->default(1)->comment('0:Inactive 1:Active');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
