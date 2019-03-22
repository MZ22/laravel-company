<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{

	protected $rows = [
		[
			'id' => 1,
			'dprtname' => "Administration, Comptabilité et Finance"
		],
		[
			'id' => 2,
			'dprtname' => "IT et Télécommunications"
		],
		[
			'id' => 3,
			'dprtname' => "Ressources humaines"
		],
		[
			'id' => 4,
			'dprtname' => "Editoriel"
		],
		[
			'id' => 5,
			'dprtname' => "Management et Direction"
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
			$department = Department::where('id', '=', $row['id'])->first();
			if (!$department) {
				$department = new Department;
				$department->fill($row);
				$department->save();
			} else {
				$department->update($row);
			}
		}
    }
}
