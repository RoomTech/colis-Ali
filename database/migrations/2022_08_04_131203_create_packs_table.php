<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->string('serialNumber');
            $table->string('senderFirstName');
            $table->string('senderLastName');
            $table->string('senderFullName')->virtualAs('CONCAT(senderFirstName, " ", senderLastName)');
            $table->string('senderContact');
            $table->string('recipientFirstName');
            $table->string('recipientLastName');
            $table->string('recipientFullName')->virtualAs('CONCAT(recipientFirstName, " ", recipientLastName)');
            $table->string('recipientContact');
            $table->string('recipientAddress');
            $table->text('description');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->boolean('isDelivered')->default(false);
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
        Schema::dropIfExists('packs');
    }
};
