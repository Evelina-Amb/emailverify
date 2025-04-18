<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\City;
use App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthDate = $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d');

        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'city_id' => City::inRandomOrder()->first()->id ?? 1, // Atsitiktinis miestas
            'grupe_id' => Group::inRandomOrder()->first()->id ?? 1, // Atsitiktinė grupė
            'gim_data' => $birthDate,
            'asmens_kodas' => $this->generateAsmensKodas($birthDate),
        ];
    }

    private function generateAsmensKodas($birthDate)
    {
        $year = substr($birthDate, 2, 2); // Paskutiniai du gimimo metų skaitmenys
        $month = substr($birthDate, 5, 2); // Mėnuo
        $day = substr($birthDate, 8, 2); // Diena

        // Sugeneruojame atsitiktinius 5 skaitmenis
        $randomDigits = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        return $year . $month . $day . $randomDigits;
    }
}
