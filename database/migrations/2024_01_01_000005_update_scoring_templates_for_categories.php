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
        Schema::table('scoring_templates', function (Blueprint $table) {
            // Add category field
            $table->enum('category', [
                'tahap_administrasi',
                'tahap_pemaparan', 
                'tahap_klarifikasi_lapangan',
                'daftar_inovasi'
            ])->after('admin_document_id');
            
            // Make admin_document_id nullable since not all categories need it
            $table->foreignId('admin_document_id')->nullable()->change();
            
            // Add additional fields for different categories
            $table->date('event_date')->nullable()->after('spreadsheet_url');
            $table->string('village_spreadsheet_url', 255)->nullable()->after('event_date');
            $table->string('district_spreadsheet_url', 255)->nullable()->after('village_spreadsheet_url');
            $table->string('questions_spreadsheet_url', 255)->nullable()->after('district_spreadsheet_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scoring_templates', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'event_date',
                'village_spreadsheet_url',
                'district_spreadsheet_url',
                'questions_spreadsheet_url'
            ]);
            
            // Make admin_document_id required again
            $table->foreignId('admin_document_id')->nullable(false)->change();
        });
    }
};
