<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $rows = [
        [
            'id' => 1,
            'type' => "Paiement par chèque",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
			'image' => "/storage/files/divya.jpg",
		],
        [
            'id' => 2,
            'type' => "Virement bancaire",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
			'image' => "/storage/files/divya.jpg",
		]
    ];
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->rows as $row) {
            $payment = Payment::where('id', '=', $row['id'])->first();
            if (!$payment) {
                $payment = new Payment;
                $payment->fill($row);
                $payment->save();
            } else {
                $payment->update($row);
            }
        }
    }
}
