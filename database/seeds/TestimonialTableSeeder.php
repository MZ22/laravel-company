<?php

use Illuminate\Database\Seeder;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Testimonial::class, 5)->create()->each(function ($p) {
            $p->save();
        });
    }
}
