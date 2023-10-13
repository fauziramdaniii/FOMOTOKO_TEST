<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlashSaleRaceConditionTest extends TestCase
{
    use RefreshDatabase;

    public function testFlashSaleRaceCondition()
    {
        // Mulai flash sale
        $product = factory(Product::class)->create();
        $flashSaleData = [
            'product_id' => $product->id,
            'harga_flash_sale' => 50.00,
            'mulai_flash_sale' => now(),
            'selesai_flash_sale' => now()->addHours(1),
        ];

        $this->post('/api/flash-sales', $flashSaleData);

        // Simulasikan kondisi balapan
        $orderCount = 10; // Jumlah pesanan yang akan dibuat secara bersamaan
        $responses = [];

        for ($i = 0; $i < $orderCount; $i++) {
            $responses[] = $this->post('/api/pesanan', ['product_id' => $product->id]);
        }

        // Verifikasi hanya satu pesanan yang berhasil
        $successfulOrders = collect($responses)->filter(function ($response) {
            return $response->status() === 201; // Menyatakan pesanan berhasil
        });

        $this->assertCount(1, $successfulOrders);
    }


    // public function testFlashSaleRaceCondition2()
    // {
    //     // Simulasikan permintaan flash sale yang bersaing
    //     $response = $this->post('/api/flash-sales', [
    //         'product_id' => 1,
    //         'harga_flash_sale' => 50000,
    //         'mulai_flash_sale' => '2023-10-14 10:00:00',
    //         'selesai_flash_sale' => '2023-10-14 14:00:00',
    //     ]);

    //     $response->assertStatus(201); // Harapannya adalah status 201 karena flash sale berhasil
    // }
}
