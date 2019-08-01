<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UsersTableSeeder::class);
		$this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
		$this->call(PostsCategoriesTableSeeder::class);
		$this->call(PostsTableSeeder::class); 
		$this->call(TestimonialTableSeeder::class); 
		$this->call(TasksTableSeeder::class); 
		$this->call(ProductsCategoriesTableSeeder::class);
		$this->call(ProductsTableSeeder::class);
		$this->call(CarrierTableSeeder::class);
		$this->call(PaymentTableSeeder::class);
		$this->call(CustomersTableSeeder::class);

    }
}
