<?php

namespace Database\Factories;
use App\Models\Acara;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Acara::class;


    public function definition()
    {
        return [
            //
            'judul' => $this->faker->sentence(10),
            'tanggal_pelaksanaan' => Now(),
            'tempat' => $this->faker->state,
            'media' => 'Zoom',
            'mulai' => $this->faker->time(),
            'berakhir' => $this->faker->time(),

        ];
    }
}
