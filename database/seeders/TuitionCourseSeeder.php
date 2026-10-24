<?php

namespace Database\Seeders;

use App\Models\TuitionCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TuitionCourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'GCSE Mathematics',
                'level' => 'GCSE',
                'description' => 'Build confidence across number, algebra, geometry and statistics with weekly exam-style practice and clear feedback on every paper.',
                'duration' => '24 weeks',
                'fee' => '£720',
                'schedule' => 'Tuesdays, 5:00 – 7:00pm',
                'image' => 'images/study-1.jpg',
                'sort_order' => 1,
            ],
            [
                'title' => 'GCSE English Language',
                'level' => 'GCSE',
                'description' => 'Master reading analysis, creative writing and spoken language with a tutor who marks for a major exam board.',
                'duration' => '20 weeks',
                'fee' => '£640',
                'schedule' => 'Wednesdays, 5:00 – 7:00pm',
                'image' => 'images/study-2.jpg',
                'sort_order' => 2,
            ],
            [
                'title' => 'A-Level Biology',
                'level' => 'A-Level',
                'description' => 'Deepen understanding of biological processes and sharpen the extended-response technique that earns top-band marks.',
                'duration' => '30 weeks',
                'fee' => '£960',
                'schedule' => 'Thursdays, 5:30 – 7:30pm',
                'image' => 'images/hero-lab.jpg',
                'sort_order' => 3,
            ],
            [
                'title' => 'A-Level Chemistry',
                'level' => 'A-Level',
                'description' => 'A structured journey through physical, organic and inorganic chemistry with practical-style questions woven into every session.',
                'duration' => '30 weeks',
                'fee' => '£960',
                'schedule' => 'Mondays, 5:30 – 7:30pm',
                'image' => 'images/study-3.webp',
                'sort_order' => 4,
            ],
            [
                'title' => 'IGCSE Science (Double Award)',
                'level' => 'IGCSE',
                'description' => 'A supportive small-group course covering Biology, Chemistry and Physics for private and international candidates.',
                'duration' => '28 weeks',
                'fee' => '£880',
                'schedule' => 'Saturdays, 10:00am – 12:30pm',
                'image' => 'images/centre-1.webp',
                'sort_order' => 5,
            ],
            [
                'title' => 'University Entrance & Interview Prep',
                'level' => 'University',
                'description' => 'Personal statement guidance, admissions-test practice and mock interviews for competitive UK university courses.',
                'duration' => '10 weeks',
                'fee' => '£450',
                'schedule' => 'Flexible weekday evenings',
                'image' => 'images/centre-2.webp',
                'sort_order' => 6,
            ],
            [
                'title' => 'Adult Functional Skills',
                'level' => 'Adult',
                'description' => 'Friendly, judgement-free Maths and English tuition for adults working towards functional skills or career progression.',
                'duration' => '16 weeks',
                'fee' => '£520',
                'schedule' => 'Wednesdays, 6:00 – 8:00pm',
                'image' => 'images/centre-3.webp',
                'sort_order' => 7,
            ],
        ];

        foreach ($courses as $course) {
            TuitionCourse::updateOrCreate(
                ['slug' => Str::slug($course['title'])],
                array_merge($course, [
                    'slug' => Str::slug($course['title']),
                    'is_active' => true,
                ])
            );
        }
    }
}
