<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamUser>
 */
class ExamUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exam_id' => Exam::pluck('id')->random(),
            'user_id' => User::pluck('id')->random(),
            'mark' => rand(0, 100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
