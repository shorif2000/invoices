<?php
namespace Database\Seeders;

use App\Models\InvoiceHeaders;

class InvoiceHeaderSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->getDatabaseConnection()->table('invoice_headers')->insertOrIgnore($this->withTimestampsAndId('id', [
            'status' => InvoiceHeaders::STATUS_DRAFT,
            'location_id' => 1,
            'date' => '2020-01-01'
        ]));

        $this->getDatabaseConnection()->table('invoice_headers')->insertOrIgnore($this->withTimestampsAndId('id', [
            'status' => InvoiceHeaders::STATUS_OPEN,
            'location_id' => 1,
            'date' => '2020-01-01'
        ]));

        $this->getDatabaseConnection()->table('invoice_headers')->insertOrIgnore($this->withTimestampsAndId('id', [
            'status' => InvoiceHeaders::STATUS_PROCESSED,
            'location_id' => 2,
            'date' => '2020-01-01'
        ]));
    }
}
