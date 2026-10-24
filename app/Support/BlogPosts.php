<?php

namespace App\Support;

class BlogPosts
{
    public static function all(): array
    {
        return [
            'choosing-an-exam-board' => [
                'slug' => 'choosing-an-exam-board',
                'title' => 'How to choose the right exam board as a private candidate',
                'excerpt' => 'The board name matters less than the specification behind it. Here is what to compare before you enter.',
                'category' => 'Exam planning',
                'date' => '2026-09-18',
                'read_time' => '5 min read',
                'image' => 'images/study-1.jpg',
                'body' => [
                    [
                        'type' => 'prose',
                        'title' => 'Start with the specification, not the logo.',
                        'paragraphs' => [
                            'AQA, Pearson Edexcel, OCR and Cambridge International all offer respected qualifications, but two subjects with the same name can be assessed very differently. Paper structures, set texts, practical requirements and the availability of past papers all change between boards.',
                            'Before choosing, check that the specification accepts private candidates. Most do, but some subjects include non-exam assessment that a centre cannot easily arrange for an external entry.',
                        ],
                        'bullets' => [
                            'Check the exact specification code, not just the subject title.',
                            'Confirm the exam series and whether all papers are available.',
                            'Look at past papers and mark schemes before committing.',
                            'Ask whether your college or university states a board preference.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Match the board to your study route.',
                        'paragraphs' => [
                            'If you are self-studying, a specification with clear content and plenty of published support may be more practical than one designed around classroom practicals. If you have a tutor, ask which board they know best.',
                            'For international candidates, IGCSE or Cambridge O-Level routes may fit more naturally. For UK progression, GCSE and A-Level specifications remain the most familiar route.',
                        ],
                    ],
                    [
                        'type' => 'steps',
                        'title' => 'A simple board-check sequence',
                        'items' => [
                            ['title' => 'Shortlist two specifications', 'text' => 'Read the assessment overview and compare the paper structure.'],
                            ['title' => 'Check private entry rules', 'text' => 'Confirm that every component can be taken at a centre.'],
                            ['title' => 'Review the timetable', 'text' => 'Make sure the papers do not clash with your other subjects.'],
                            ['title' => 'Confirm before paying', 'text' => 'Ask us to verify availability for your chosen series.'],
                        ],
                    ],
                ],
            ],
            'gcse-resits-guide' => [
                'slug' => 'gcse-resits-guide',
                'title' => 'GCSE resits: a practical guide for autumn and summer entries',
                'excerpt' => 'A higher grade can open a college place, an apprenticeship or a change of direction. Here is how resit entry works.',
                'category' => 'GCSE',
                'date' => '2026-09-02',
                'read_time' => '4 min read',
                'image' => 'images/study-2.jpg',
                'body' => [
                    [
                        'type' => 'prose',
                        'title' => 'Decide whether a resit is the right move.',
                        'paragraphs' => [
                            'Resitting makes most sense when a specific grade is needed for a course, apprenticeship or career plan. If you are close to the boundary and know what went wrong, a focused resit can be worthwhile.',
                            'GCSE English language and maths are available in the autumn series at many centres. Other subjects usually wait for the summer series, and availability can vary by board.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Plan around the specification.',
                        'paragraphs' => [
                            'Most GCSEs are linear, so you will normally sit all papers in the same series. Check whether speaking tests, practical work or non-exam assessment are part of your subject.',
                            'If you are changing board, the content and paper style may differ from your previous course. Review the specification before entering rather than assuming the exams will feel the same.',
                        ],
                        'bullets' => [
                            'Confirm the subject, board and specification code.',
                            'Check the entry deadline and any late-entry fee.',
                            'Ask whether your previous candidate number is still relevant.',
                            'Build a revision plan around the actual paper structure.',
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'Typical resit windows',
                        'columns' => ['Series', 'Common subjects', 'When to enquire'],
                        'rows' => [
                            ['Autumn', 'English language, maths', 'Late August to early September'],
                            ['January', 'Selected IGCSE subjects only', 'September to October'],
                            ['Summer', 'Most GCSE subjects', 'December to February'],
                        ],
                        'note' => 'This is a planning guide. Availability changes by board, subject and year.',
                    ],
                ],
            ],
            'a-level-practical-endorsement' => [
                'slug' => 'a-level-practical-endorsement',
                'title' => 'What is A-Level practical endorsement?',
                'excerpt' => 'Science A-Levels often include a separate practical endorsement. Here is what it is and why private candidates should plan early.',
                'category' => 'A-Level',
                'date' => '2026-08-14',
                'read_time' => '4 min read',
                'image' => 'images/hero-lab.jpg',
                'body' => [
                    [
                        'type' => 'prose',
                        'title' => 'A separate statement on your certificate.',
                        'paragraphs' => [
                            'The practical endorsement confirms that a candidate has developed the experimental and investigative skills required by the specification. It is reported separately from the written A-Level grade as either a pass or not classified.',
                            'Some university science courses expect it, while others do not. Check both the specification and your offer conditions before deciding whether you need to complete it.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Private candidates need a laboratory pathway.',
                        'paragraphs' => [
                            'Practical skills cannot normally be completed at home. A centre must provide the apparatus, supervision and assessment arrangements needed to meet the required standards.',
                            'If you are entering as a private candidate, tell us early. Laboratory sessions need to be planned around written papers, and some boards have specific documentation requirements.',
                        ],
                        'bullets' => [
                            'Share your board, specification and written exam series.',
                            'Confirm whether any practical work has already been completed.',
                            'Check your university offer for an endorsement requirement.',
                            'Book sessions early enough to fit around revision.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Do not leave it until results season.',
                        'paragraphs' => [
                            'Practical endorsement is not a last-minute add-on. The assessment, recording and board checks take time. Starting the conversation with your centre early is the simplest way to avoid a gap between your written grade and your practical statement.',
                        ],
                    ],
                ],
            ],
            'first-private-exam-day' => [
                'slug' => 'first-private-exam-day',
                'title' => 'Your first private exam: what to expect on the day',
                'excerpt' => 'From identification checks to the quiet of the exam room, here is a calm walkthrough of exam day.',
                'category' => 'Candidate guide',
                'date' => '2026-07-28',
                'read_time' => '3 min read',
                'image' => 'images/centre-3.webp',
                'body' => [
                    [
                        'type' => 'prose',
                        'title' => 'Arrive with the right documents.',
                        'paragraphs' => [
                            'Your candidate pack will confirm the arrival time, identification requirements and permitted equipment. Bring the original ID specified by the board, not a photograph or a copy on your phone.',
                            'Allow extra time for travel. Arriving flustered is avoidable, and centres cannot usually admit candidates who arrive after the published start time.',
                        ],
                    ],
                    [
                        'type' => 'steps',
                        'title' => 'A typical exam-day sequence',
                        'items' => [
                            ['title' => 'Report to reception', 'text' => 'A member of staff will check your name and identification.'],
                            ['title' => 'Leave prohibited items', 'text' => 'Phones, smart watches and unauthorised notes must be stored as instructed.'],
                            ['title' => 'Enter the exam room', 'text' => 'You will be shown to your seat and given the board’s instructions.'],
                            ['title' => 'Follow the invigilator', 'text' => 'Listen carefully to the start, finish and emergency instructions.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'You do not have to manage the process alone.',
                        'paragraphs' => [
                            'If something is unclear before the day, ask. A quick question about equipment, access arrangements or timing is far better than an avoidable problem in the exam room.',
                        ],
                    ],
                ],
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }
}
