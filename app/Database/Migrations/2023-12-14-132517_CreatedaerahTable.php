<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatedaerahTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 6,
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nama_gubernur" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ],
            "slug" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ],
            "tahun_menjabat" => [
                "type" => "VARCHAR",
                "constraint" => 150
            ],
            "periode" => [
                "type" => "INT",
                "constraint" => 1

            ],
            "wakil_gubernur" => [
                "type" => "VARCHAR",
                "constraint" => 150

            ],
            "asal_partai" => [
                "type" => "VARCHAR",
                "constraint" => 60
            ],
            "foto" => [
                "type" => "VARCHAR",
                "constraint" => 100
            ],
        ]);
        $this->forge->addkey("id", true);
        $this->forge->createTable("daerah");
    }

    public function down()
    {
        $this->forge->dropTable("daerah");

    }
}
