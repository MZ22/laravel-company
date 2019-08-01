<?php

use Illuminate\Database\Seeder;
use App\Carrier;

class CarrierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	protected $rows = [
        [
            'id' => 1,
            'name' => "Livraison gratuite",
			'price' => "0.00",
			'image' => "/storage/files/divya.jpg",
		],
        [
            'id' => 2,
            'name' => "Livraison",
			'price' => "5.00",
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
            $carrier = Carrier::where('id', '=', $row['id'])->first();
            if (!$carrier) {
                $carrier = new Carrier;
                $carrier->fill($row);
                $carrier->save();
            } else {
                $carrier->update($row);
            }
        }
    }
}
