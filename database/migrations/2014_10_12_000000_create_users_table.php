<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('Role');
            $table->string('description');
            $table->timestamps();
        });

        //Aggiuno i ruoli definiti
        DB::table('roles')->insert(
            [
            [
                'Role' => 'dipendente',
                'description' => "can only registers the sold product"
            ],
            [
                'Role' => 'proprietario',
                'description' => "can registers the sold items and sees the stats"
            ],
            
            [
                'Role' => 'admin',
                'description' => "can do everything"
            ]
            ]
        );

        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();

        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

        });
        Schema::create('update_prizes', function (Blueprint $table) {
            $table->id();
            $table->date('date');

        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('prezzo',8,2);
            $table->string('codice');
            $table->integer('Grammi/Pezzi');
            $table->string('img');
            $table->foreignId('id_category');
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('categories');

        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_industry');
            $table->foreignId('id_product');
            $table->integer('quantità');
            $table->timestamps();

            $table->foreign('id_industry')->references('id')->on('industries');
            $table->foreign('id_product')->references('id')->on('products');

        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->char('Nazione',2);
            $table->string('Provincia');
            $table->string('Città');
            $table->foreignId('id_industry');
            $table->string('password');
            $table->foreignId('id_role');
            $table->timestamp('last_activity')->nullable();
            $table->timestamps();

            $table->foreign('id_industry')->references('id')->on('industries');
            $table->foreign('id_role')->references('id')->on('roles');
        });

        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_industry');
            $table->foreignId('id_product');
            $table->integer('quantità');
            $table->integer('incasso');
            $table->foreignId('id_user');
            $table->timestamps();

            $table->foreign('id_industry')->references('id')->on('industries');
            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');

        });



        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_industry');
            $table->integer('incasso');
            $table->json('Pezzi_categorie');
            $table->timestamps();

            $table->foreign('id_industry')->references('id')->on('industries');
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
