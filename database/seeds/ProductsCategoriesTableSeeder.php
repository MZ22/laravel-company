<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	protected $rows = [
        [
            'idcat' => 1,
            'nomcat' => "Mobile",
			'image' => "/storage/files/divya.jpg",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        ],
        [
            'idcat' => 2,
            'nomcat' => "PC portable",
			'image' => "/storage/files/divya.jpg",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        
        ],
        [
            'idcat' => 3,
            'nomcat' => "Accessoires",
			'image' => "/storage/files/divya.jpg",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        
        ],
        [
            'idcat' => 4,
            'nomcat' => "PC gamer",
			'image' => "/storage/files/divya.jpg",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        
        ],
        [
            'idcat' => 5,
            'nomcat' => "Bureaux",
			'image' => "/storage/files/divya.jpg",
			'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
        
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
            $ProductCategory = ProductCategory::where('idcat', '=', $row['idcat'])->first();
            if (!$ProductCategory) {
                $ProductCategory = new ProductCategory;
                $ProductCategory->fill($row);
                $ProductCategory->save();
            } else {
                $ProductCategory->update($row);
            }
        }
    }
}
