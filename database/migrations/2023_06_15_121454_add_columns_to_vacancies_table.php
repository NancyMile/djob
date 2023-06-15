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
        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('last_date');
            $table->text('description');
            $table->string('image');
            $table->integer('posted')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancies', function (Blueprint $table) {
            //brramos las llaves foraneas
            $table->dropForeign('vacancies_category_id_foreign');
            $table->dropForeign('vacancies_salary_id_foreign');
            $table->dropForeign('vacancies_user_id_foreign');
            //cuando  son muchos campos a eliminar mejor los agregamos en un array
            $table->dropColumn(['title','salary_id','category_id','company',
            'last_date','description','image','posted','user_id']);
        });
    }
};
