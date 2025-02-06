<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workout_norms')->insert([
            // FITNESS LEVEL: BEGINNER - MAN
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '3', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 24-29, WEIGHT 0-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '3', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '3', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => 0, 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 24-29, WEIGHT 0-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 24-29, WEIGHT 0-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 24-29, WEIGHT 0-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '15',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '15',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],

            // -------------------------------------------------------------------------------------------------
            // FITNESS LEVEL: BEGINNER - WOMAN
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '3', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '2', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '3', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '2', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '2', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '4', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '4', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '15',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '10',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '15',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '10',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '10',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '25',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '20',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-75', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-200', 'fitness_level' => 'Beginner',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],

            // -------------------------------------------------------------------------------------------------
            // FITNESS LEVEL: INTERMEDIATE - MAN
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '55',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '55',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '55',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],

            // -------------------------------------------------------------------------------------------------
            // FITNESS LEVEL: INTERMEDIATE - WOMAN
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '5', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '6', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '6', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '9', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '8', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '7', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-80', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-50', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '51-65', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '40',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '35',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 56-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '30',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '55',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '55',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '50',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 56-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '45',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 56-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-200', 'fitness_level' => 'Intermediate',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],

            // -------------------------------------------------------------------------------------------------
            // FITNESS LEVEL: ADVANCED - MAN
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '18', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '20', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '20', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 0-75KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '0-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '20', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '18-21', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '20', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '22-25', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '26-29', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-60KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-60', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 61-75KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '61-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 76-90KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '76-90', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 91-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '91-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '105',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '120',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '115',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '18-23', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '110',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '115',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '110',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '24-29', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '105',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '110',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 66-85KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '66-85', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '105',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 86-200KG
                'gender' => 'Man', 'age_range' => '30-34', 'weight_range' => '86-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],

            // -------------------------------------------------------------------------------------------------
            // FITNESS LEVEL: ADVANCED - WOMAN
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 22-25, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP BEGINNER, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 22-25, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // PUSH-UP INTERMEDIATE, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '10', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 22-25, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '114', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PUSH-UP ADVANCED, AGE 30-34, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Push-Up', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 22-25, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT BEGINNER, AGE 30-34, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Beginner', 'sets' => '2', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 51-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '13', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '12', 'duration' => '0',
            ],
            [ // SQUAT INTERMEDIATE, AGE 30-34, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Intermediate', 'sets' => '3', 'reps' => '11', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '19', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 18-21, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '18-21', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '18', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 51-65KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '51-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 22-25, WEIGHT 66-200KG
                'gender' => 'Woman', 'age_range' => '22-25', 'weight_range' => '66-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 0-50KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '0-50', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '17', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 51-80KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '51-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 26-29, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '26-29', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 0-65KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-65', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '16', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 66-80KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '66-80', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '15', 'duration' => '0',
            ],
            [ // SQUAT ADVANCED, AGE 30-34, WEIGHT 81-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '81-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Squat', 'difficulty_level' => 'Advanced', 'sets' => '3', 'reps' => '14', 'duration' => '0',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK BEGINNER, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK BEGINNER, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '70',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '65',
            ],
            [ // PLANK BEGINNER, AGE 30-34, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Beginner', 'sets' => '0', 'reps' => '0', 'duration' => '60',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK INTERMEDIATE, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK INTERMEDIATE, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '85',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '80',
            ],
            [ // PLANK INTERMEDIATE, AGE 30-34, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Intermediate', 'sets' => '0', 'reps' => '0', 'duration' => '75',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '110',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '105',
            ],
            [ // PLANK ADVANCED, AGE 18-23, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '18-23', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '105',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],
            [ // PLANK ADVANCED, AGE 24-29, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '24-29', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 0-55KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '0-55', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '100',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 56-75KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '56-75', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '95',
            ],
            [ // PLANK ADVANCED, AGE 30-34, WEIGHT 76-200KG
                'gender' => 'Woman', 'age_range' => '30-34', 'weight_range' => '76-200', 'fitness_level' => 'Advanced',
                'exercise_type' => 'Plank', 'difficulty_level' => 'Advanced', 'sets' => '0', 'reps' => '0', 'duration' => '90',
            ],
        ]);
    }
}
