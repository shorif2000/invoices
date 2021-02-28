<?php

namespace Database\Seeders;

use App\Models\InvoiceHeaders;

class InvoiceLinesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = $this->getDatabaseConnection()->table('invoice_lines');

        $table->insertOrIgnore($this->withTimestampsAndId('id', [
            'invoice_header_id' => $this->getInvoiceHeaderIdForStatus(InvoiceHeaders::STATUS_DRAFT),
            'description' => 'Line 001',
            'value' => 10.00,
        ]));

        $table->insertOrIgnore($this->withTimestampsAndId('id', [
            'invoice_header_id' => $this->getInvoiceHeaderIdForStatus(InvoiceHeaders::STATUS_OPEN),
            'description' => 'Line 001',
            'value' => 29.00,
        ]));

        $table->insertOrIgnore($this->withTimestampsAndId('id', [
            'invoice_header_id' => $this->getInvoiceHeaderIdForStatus(InvoiceHeaders::STATUS_PROCESSED),
            'description' => 'Line 001',
            'value' => 1.00,
        ]));

        $table->insertOrIgnore($this->withTimestampsAndId('id', [
            'invoice_header_id' => $this->getInvoiceHeaderIdForStatus(InvoiceHeaders::STATUS_DRAFT),
            'description' => 'Line 002',
            'value' => 3.00,
        ]));
    }

    /**
     * Get primary key for a invoice_headers record for a specific status
     *
     * @param string $status
     * @return int
     */
    public function getInvoiceHeaderIdForStatus(string $status): int
    {
        return $this->getDatabaseConnection()->table('invoice_headers')
            ->select('id')
            ->where('status', $status)
            ->pluck('id')
            ->first();
    }
}
