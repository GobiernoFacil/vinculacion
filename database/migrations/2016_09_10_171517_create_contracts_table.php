<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('opd_id');
            $table->datetime('contract_timestamp')->nullable();
            $table->string('contract_opd')->nullable();
            $table->string('contract_name')->nullable();
            $table->string('contract_objective')->nullable();
            $table->text('contract_description')->nullable();
            $table->text('contract_short_description')->nullable();
            $table->integer('contract_benefit_students')->nullable();
            $table->integer('contract_participant_students')->nullable();
            $table->integer('contract_benefit_teachers')->nullable();
            $table->integer('contract_participant_teachers')->nullable();
            $table->string('contract_federal_budget')->nullable();
            $table->string('contract_state_budget')->nullable();
            $table->string('contract_own_budget')->nullable();
            $table->string('contract_funding_source')->nullable();
            $table->datetime('contract_signature_date')->nullable();
            $table->datetime('contract_expiry_date')->nullable();
            $table->string('contract_responsable_name')->nullable();
            $table->string('contract_responsable_email')->nullable();
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
        Schema::drop('contracts');
    }
}
