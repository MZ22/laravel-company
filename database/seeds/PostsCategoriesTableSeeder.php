<?php

use Illuminate\Database\Seeder;
use App\PostsCategories;

class PostsCategoriesTableSeeder extends Seeder
{
	protected $rows = [
        [
            'id' => 1,
            'catname' => "Génerale"
        ],
        [
            'id' => 2,
            'catname' => "IT et Télécommunications"
        ],
        [
            'id' => 3,
            'catname' => "Logiciels"
        ],
        [
            'id' => 4,
            'catname' => "Editoriel"
        ],
        [
            'id' => 5,
            'catname' => "Management"
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
            $postscategories = PostsCategories::where('id', '=', $row['id'])->first();
            if (!$postscategories) {
                $postscategories = new PostsCategories;
                $postscategories->fill($row);
                $postscategories->save();
            } else {
                $postscategories->update($row);
            }
        }
    }
}
 
