<?php

use App\Models\Announcement;
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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(false);
            $table->string('bannerText');
            $table->string('bannerColor');
            $table->string('titleText');
            $table->string('titleColor');
            $table->text('content');
            $table->string('buttonText');
            $table->string('buttonLink');
            $table->string('buttonColor');
            $table->timestamps();
        });

        Announcement::create([
            'is_active' => true,
            'bannerText' => 'Announcement banner',
            'bannerColor' => '#0000ff',
            'titleText' => 'Announcement title',
            'titleColor' => '#0000ff',
            'content' => 'This is an announcement',
            'buttonText' => 'Button for Action',
            'buttonLink' => 'https://google.com',
            'buttonColor' => '#0000ff',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
};
