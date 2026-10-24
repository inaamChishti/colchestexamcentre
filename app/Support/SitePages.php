<?php

namespace App\Support;

class SitePages
{
    public static function all(): array
    {
        return array_merge(
            self::examPages(),
            self::infoPages(),
            self::servicePages(),
            self::policyPages()
        );
    }

    public static function find(string $slug): ?array
    {
        return self::all()[$slug] ?? null;
    }

    public static function routeNames(): array
    {
        return [
            'exams' => 'exams',
            'gcse-exams' => 'gcse.exams',
            'igcse-exams' => 'igcse.exams',
            'alevel-exams' => 'alevel.exams',
            'gce-o-level-exams' => 'gceolevel.exams',
            'international-universities-exams' => 'international.university.exams',
            'exam-registration' => 'exam.registration',
            'about-us' => 'about.us',
            'private-candidates' => 'private.candidates',
            'exam-fees' => 'exam.fees',
            'exam-dates' => 'exam.dates',
            'subjects-offered' => 'subjects.offered',
            'exam-boards' => 'exam.boards',
            'booking-process' => 'booking.process',
            'testimonials' => 'testimonials',
            'practical-endorsement' => 'practical.endorsement',
            'online-learning' => 'online.learning',
            'privacy-policy' => 'privacy.policy',
            'terms-of-use' => 'terms.of.use',
            'cookie-policy' => 'cookie.policy',
        ];
    }

    public static function navGroups(): array
    {
        return [
            'Exams' => [
                'exams' => 'All Exams',
                'gcse.exams' => 'GCSE Exams',
                'igcse.exams' => 'IGCSE Exams',
                'alevel.exams' => 'A-Level Exams',
                'gceolevel.exams' => 'GCE O-Level Exams',
                'international.university.exams' => 'International University Exams',
                'exam.registration' => 'Exam Registration',
            ],
            'Information' => [
                'about.us' => 'About Us',
                'private.candidates' => 'Private Candidates',
                'exam.fees' => 'Exam Fees',
                'exam.dates' => 'Exam Dates',
                'subjects.offered' => 'Subjects Offered',
                'exam.boards' => 'Exam Boards',
                'booking.process' => 'Booking Process',
                'testimonials' => 'Testimonials',
                'blog' => 'Blog',
            ],
            'Services' => [
                'practical.endorsement' => 'Practical Endorsement',
                'online.learning' => 'Online Learning',
                'tuition' => 'Tuition',
                'tuition.centre' => 'Tuition Centre',
            ],
            'Policies' => [
                'privacy.policy' => 'Privacy Policy',
                'cookie.policy' => 'Cookie Policy',
                'terms.of.use' => 'Terms of Use',
                'sitemap' => 'Sitemap',
            ],
        ];
    }

    public static function sitemapGroups(): array
    {
        return [
            'Main pages' => [
                'home' => 'Home',
                'exams' => 'Exams',
                'tuition' => 'Tuition',
                'tuition.centre' => 'Tuition Centre',
                'form' => 'Online Form',
                'practical.endorsement' => 'Practical Endorsement',
                'online.learning' => 'Online Learning',
                'contact.us' => 'Contact Us',
                'blog' => 'Blog',
            ],
            'Exam pages' => [
                'exam.registration' => 'Exam Registration',
                'gcse.exams' => 'GCSE Exams',
                'igcse.exams' => 'IGCSE Exams',
                'alevel.exams' => 'A-Level Exams',
                'gceolevel.exams' => 'GCE O-Level Exams',
                'international.university.exams' => 'International University Exams',
            ],
            'Information' => [
                'about.us' => 'About Us',
                'private.candidates' => 'Private Candidates',
                'exam.fees' => 'Exam Fees',
                'exam.dates' => 'Exam Dates',
                'subjects.offered' => 'Subjects Offered',
                'exam.boards' => 'Exam Boards',
                'booking.process' => 'Booking Process',
                'testimonials' => 'Testimonials',
            ],
            'Policies' => [
                'privacy.policy' => 'Privacy Policy',
                'cookie.policy' => 'Cookie Policy',
                'terms.of.use' => 'Terms of Use',
                'sitemap' => 'Sitemap',
            ],
        ];
    }

    private static function examPages(): array
    {
        return [
            'exams' => [
                'name' => 'Exams',
                'title' => 'Private Exams in Colchester | Colchester Exam Centre',
                'meta' => 'Sit GCSE, IGCSE, A-Level, GCE O-Level and international university exams as a private candidate in Colchester.',
                'eyebrow' => 'Exams at Colchester Exam Centre',
                'hero_title' => 'Every qualification. One calm, professional centre.',
                'hero_text' => 'From first GCSEs to international university admissions, we give private candidates a clear route through the exam system with expert invigilation and genuine human support.',
                'hero_image' => 'images/hero-lab.jpg',
                'hero_points' => ['JCQ-compliant exam rooms', 'Private and resit entries', 'Guidance from enquiry to results'],
                'blocks' => [
                    [
                        'type' => 'cards',
                        'title' => 'Choose your exam pathway',
                        'text' => 'Each qualification has its own entry rules, deadlines and paperwork. We keep those details clear and manageable.',
                        'items' => [
                            ['tag' => 'GCSE', 'title' => 'GCSE Exams', 'text' => 'Flexible private entries and resits for home-educated, independent and mature candidates.', 'route' => 'gcse.exams', 'link' => 'Explore GCSE'],
                            ['tag' => 'IGCSE', 'title' => 'IGCSE Exams', 'text' => 'International GCSE entries through Pearson Edexcel and Cambridge International.', 'route' => 'igcse.exams', 'link' => 'Explore IGCSE'],
                            ['tag' => 'A-Level', 'title' => 'A-Level Exams', 'text' => 'First-time entries, resits and practical endorsements across the major UK boards.', 'route' => 'alevel.exams', 'link' => 'Explore A-Level'],
                            ['tag' => 'O-Level', 'title' => 'GCE O-Level Exams', 'text' => 'Cambridge O-Level assessment with structured documentation and registration support.', 'route' => 'gceolevel.exams', 'link' => 'Explore O-Level'],
                            ['tag' => 'University', 'title' => 'International University Exams', 'text' => 'Admissions tests and professional qualifications in a secure, distraction-free setting.', 'route' => 'international.university.exams', 'link' => 'Explore university exams'],
                            ['tag' => 'Support', 'title' => 'Private Candidate Support', 'text' => 'New to private entry? We help you choose the right board, subject and exam series.', 'route' => 'private.candidates', 'link' => 'Private candidate guide'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'How it works',
                        'title' => 'A straightforward private entry process.',
                        'text' => 'You do not need to be enrolled at a school to sit an exam with us. We work directly with candidates, families and tutors to arrange entries and make exam day feel predictable.',
                        'bullets' => [
                            'Tell us the subject, level, board and exam series you need.',
                            'We check availability and confirm the entry fee and deadline.',
                            'Complete the registration documents and pay the entry fee.',
                            'Receive your timetable, candidate pack and exam-day instructions.',
                        ],
                    ],
                    [
                        'type' => 'features',
                        'title' => 'What every candidate gets',
                        'items' => [
                            ['title' => 'A named contact', 'text' => 'One team who knows your entry and can answer questions without passing you around.'],
                            ['title' => 'Clear deadlines', 'text' => 'We tell you what is needed, when it is needed and what happens if a board deadline is close.'],
                            ['title' => 'Calm exam rooms', 'text' => 'Bright, quiet spaces with professional invigilation and JCQ-compliant arrangements.'],
                            ['title' => 'Access arrangements', 'text' => 'Where evidence is available, we help eligible candidates apply for approved access arrangements.'],
                        ],
                    ],
                ],
                'faq' => [
                    'title' => 'Common exam questions',
                    'items' => [
                        ['q' => 'Can I sit an exam without attending a school?', 'a' => 'Yes. As a private candidate you can enter exams directly through an exam centre. We will guide you through board selection and registration.'],
                        ['q' => 'Do you accept late entries?', 'a' => 'Sometimes, depending on the board and subject. Late entries usually carry an additional fee and are subject to availability.'],
                        ['q' => 'Can I transfer an existing entry?', 'a' => 'In many cases, yes. Contact us with your candidate number, board and subject details as early as possible.'],
                    ],
                ],
                'cta' => ['title' => 'Ready to arrange your exam entry?', 'text' => 'Tell us what you need and we will confirm the next step, deadline and likely fee.', 'label' => 'Start your exam entry', 'route' => 'exam.registration'],
            ],
            'gcse-exams' => [
                'name' => 'GCSE Exams',
                'title' => 'GCSE Exams for Private Candidates in Colchester',
                'meta' => 'Sit GCSE exams as a private candidate in Colchester. Flexible entries, resits and access arrangement guidance.',
                'eyebrow' => 'GCSE exams',
                'hero_title' => 'GCSE exams, arranged around your next step.',
                'hero_text' => 'Whether you are home-educated, retaking a subject or changing direction, we help you enter GCSE exams with confidence and clarity.',
                'hero_image' => 'images/study-1.jpg',
                'hero_points' => ['Private and resit entries', 'Major UK exam boards', 'Clear candidate guidance'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Private GCSE entry',
                        'title' => 'A practical route to GCSE qualifications.',
                        'text' => 'GCSEs remain the foundation for sixth-form study, apprenticeships and many career routes. As a private candidate, you can sit them without joining a school cohort.',
                        'paragraphs' => [
                            'We support candidates who are home-educated, studying independently, returning to education or improving a previous grade. The entry process is explained step by step, including board choice, subject codes and deadlines.',
                            'Some subjects include non-exam assessment or practical work. We will confirm what your chosen specification requires before you commit to an entry.',
                        ],
                        'bullets' => [
                            'Core subjects including maths, English language and science.',
                            'Humanities, languages and selected creative subjects where available.',
                            'Resits for candidates who want to improve a grade.',
                            'Access arrangement guidance where evidence is in place.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Popular GCSE subject areas',
                        'items' => [
                            ['tag' => 'Core', 'title' => 'Maths and English', 'text' => 'Essential qualifications for further study, employment and university pathways.'],
                            ['tag' => 'Science', 'title' => 'Biology, Chemistry and Physics', 'text' => 'Separate science or combined science entries, subject to board availability.'],
                            ['tag' => 'Humanities', 'title' => 'History, Geography and RE', 'text' => 'Essay-based subjects with clear specification and revision guidance.'],
                            ['tag' => 'Languages', 'title' => 'French, Spanish and more', 'text' => 'Speaking tests and written papers arranged where the board permits private entry.'],
                            ['tag' => 'Resits', 'title' => 'Grade improvement', 'text' => 'A focused route for candidates who need a higher grade for a college or career plan.'],
                            ['tag' => 'Support', 'title' => 'Home education', 'text' => 'A straightforward entry process for families managing education outside school.'],
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'Typical GCSE entry guide',
                        'text' => 'Subject availability changes by board and series. This table is a starting point, not a live availability list.',
                        'columns' => ['Subject area', 'Common boards', 'Private entry notes'],
                        'rows' => [
                            ['Mathematics', 'AQA, Edexcel, OCR', 'Written papers only'],
                            ['English Language', 'AQA, Edexcel, OCR', 'Speaking endorsement may apply'],
                            ['Sciences', 'AQA, Edexcel, OCR', 'Required practicals may affect entry'],
                            ['Humanities', 'AQA, Edexcel, OCR', 'Written papers only for most specs'],
                            ['Languages', 'AQA, Edexcel', 'Speaking test usually required'],
                        ],
                        'note' => 'We confirm the exact specification, board and fee before taking payment.',
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'GCSE questions',
                        'items' => [
                            ['q' => 'Can I take just one GCSE?', 'a' => 'Yes. Private candidates can enter individual subjects rather than a full suite.'],
                            ['q' => 'Do I need a school reference?', 'a' => 'No. You will need identification and the information required by the exam board, which we will explain.'],
                            ['q' => 'Can I take a GCSE in one exam series?', 'a' => 'Most GCSE specifications are linear, so all papers are usually taken in the same series.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Plan your GCSE entry', 'text' => 'Send us the subject, board and series you have in mind. We will check what is possible and explain the deadline.', 'label' => 'Ask about GCSE entry', 'route' => 'exam.registration'],
            ],
            'igcse-exams' => [
                'name' => 'IGCSE Exams',
                'title' => 'IGCSE Exams for Private Candidates in Colchester',
                'meta' => 'Arrange IGCSE exams as a private candidate in Colchester with Pearson Edexcel and Cambridge International.',
                'eyebrow' => 'IGCSE exams',
                'hero_title' => 'International GCSEs, supported locally.',
                'hero_text' => 'IGCSEs offer a flexible, globally recognised route for private candidates. We help you navigate board differences, subject codes and exam-day requirements.',
                'hero_image' => 'images/study-2.jpg',
                'hero_points' => ['Edexcel and Cambridge experience', 'Private candidate friendly', 'Secure, JCQ-compliant rooms'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Why IGCSE',
                        'title' => 'A recognised qualification with international reach.',
                        'text' => 'IGCSEs are used by schools and private candidates around the world. They can be a strong option for home-educated learners, international families and students who need a flexible exam route.',
                        'paragraphs' => [
                            'Specifications differ between Pearson Edexcel and Cambridge International. Some subjects have optional papers, practical components or tiered entries. We check these details with you before registration so there are no surprises.',
                            'Our team can also advise on the difference between IGCSE and GCSE where a university, college or employer has a specific requirement.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'IGCSE subjects and routes',
                        'items' => [
                            ['tag' => 'Edexcel', 'title' => 'Pearson Edexcel IGCSE', 'text' => 'A broad subject offering with familiar UK board processes and specifications.'],
                            ['tag' => 'Cambridge', 'title' => 'Cambridge IGCSE', 'text' => 'Internationally recognised qualifications with a wide range of subject options.'],
                            ['tag' => 'Sciences', 'title' => 'Science pathways', 'text' => 'Single, double and separate science options vary by board and specification.'],
                            ['tag' => 'English', 'title' => 'English qualifications', 'text' => 'Language and literature routes with different assessment structures.'],
                            ['tag' => 'Maths', 'title' => 'Mathematics', 'text' => 'Tiered or untiered entry depending on the board and qualification.'],
                            ['tag' => 'Resits', 'title' => 'Improve a result', 'text' => 'Re-enter a subject where the board permits and the timetable allows.'],
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'IGCSE planning checklist',
                        'columns' => ['Step', 'What to confirm', 'Why it matters'],
                        'rows' => [
                            ['1', 'Board and specification', 'Subject codes and papers differ between boards'],
                            ['2', 'Exam series', 'Availability may change between January and summer'],
                            ['3', 'Practical or speaking components', 'Some subjects require additional arrangements'],
                            ['4', 'Entry deadline', 'Late entries can carry higher fees'],
                            ['5', 'Access arrangements', 'Evidence must usually be submitted before the deadline'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'IGCSE questions',
                        'items' => [
                            ['q' => 'Is IGCSE accepted by UK universities?', 'a' => 'Yes, IGCSEs are widely recognised, but you should always check the specific entry requirements for your chosen course.'],
                            ['q' => 'Can I mix GCSE and IGCSE subjects?', 'a' => 'Often yes. The key is choosing a board and specification for each subject that is available in your exam series.'],
                            ['q' => 'Do you offer January exams?', 'a' => 'Some IGCSE subjects have a January series. Availability changes by board, subject and year, so please ask us to check.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Check IGCSE availability', 'text' => 'Send us your subject and preferred series and we will confirm the board options open to you.', 'label' => 'Ask about IGCSE', 'route' => 'exam.registration'],
            ],
            'alevel-exams' => [
                'name' => 'A-Level Exams',
                'title' => 'A-Level Exams for Private Candidates in Colchester',
                'meta' => 'Sit A-Level exams as a private candidate in Colchester, including resits and practical endorsement support.',
                'eyebrow' => 'A-Level exams',
                'hero_title' => 'A-Level exams without the school-run stress.',
                'hero_text' => 'We support independent learners, resit candidates and home-educated students through A-Level entry, practical requirements and exam day.',
                'hero_image' => 'images/study-3.webp',
                'hero_points' => ['First-time and resit entries', 'Practical endorsement guidance', 'Major UK exam boards'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Independent A-Levels',
                        'title' => 'A clear pathway to university and beyond.',
                        'text' => 'A-Levels remain a key route into higher education and competitive apprenticeships. Private entry gives you flexibility, but the specification and practical requirements need careful planning.',
                        'paragraphs' => [
                            'We help you choose the right board, confirm whether coursework or practical endorsement is required, and work to the correct entry deadlines. If you are returning after a gap year or improving a grade, we can review your previous entry history with you.',
                            'For science subjects, the practical endorsement is separate from the written grade. Our practical endorsement pathway supports candidates who need to complete the required skills assessments.',
                        ],
                        'bullets' => [
                            'First-time A-Level entries for independent candidates.',
                            'Resits and grade improvement in available subjects.',
                            'Practical endorsement support for science candidates.',
                            'Access arrangement guidance where evidence exists.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'A-Level support areas',
                        'items' => [
                            ['tag' => 'Sciences', 'title' => 'Biology, Chemistry and Physics', 'text' => 'Written exams plus practical endorsement where the specification requires it.'],
                            ['tag' => 'Maths', 'title' => 'Mathematics and Further Maths', 'text' => 'Entry guidance for a subject that opens many university pathways.'],
                            ['tag' => 'Humanities', 'title' => 'History, Geography and more', 'text' => 'Essay-based A-Levels with clear revision and exam-technique support.'],
                            ['tag' => 'Resits', 'title' => 'Grade improvement', 'text' => 'A focused plan for candidates who need a specific grade for their next step.'],
                            ['tag' => 'Practical', 'title' => 'Practical endorsement', 'text' => 'Laboratory-based assessment for eligible science candidates.'],
                            ['tag' => 'Planning', 'title' => 'University requirements', 'text' => 'We help you check whether your subject and board match your offer conditions.'],
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'A-Level entry planning',
                        'columns' => ['Question', 'What to check', 'Action'],
                        'rows' => [
                            ['Does the subject need practical endorsement?', 'Check the specification and university offer', 'Book a practical pathway if required'],
                            ['Is the subject available in your series?', 'Board and subject availability', 'Confirm before paying any fee'],
                            ['Are you resitting?', 'Previous board, code and cash-in status', 'Share your candidate history with us'],
                            ['Do you need access arrangements?', 'Evidence and board deadlines', 'Submit documents as early as possible'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'A-Level questions',
                        'items' => [
                            ['q' => 'Can I take A-Levels privately without a school?', 'a' => 'Yes. Private candidates can enter through an exam centre, provided the subject and specification are available to external candidates.'],
                            ['q' => 'Do I need practical endorsement for science?', 'a' => 'Many science A-Levels require it for the full qualification. Some university offers also expect it, so check both the specification and your offer.'],
                            ['q' => 'Can I resit one module?', 'a' => 'Most A-Levels are linear, so resits usually mean retaking the full qualification in a later series.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Plan your A-Level entry', 'text' => 'Share your subjects and target series and we will confirm the practical and entry requirements.', 'label' => 'Ask about A-Level entry', 'route' => 'exam.registration'],
            ],
            'gce-o-level-exams' => [
                'name' => 'GCE O-Level Exams',
                'title' => 'GCE O-Level Exams in Colchester | Cambridge International',
                'meta' => 'Sit Cambridge GCE O-Level exams as a private candidate in Colchester with structured registration support.',
                'eyebrow' => 'GCE O-Level exams',
                'hero_title' => 'Cambridge O-Levels, handled with care.',
                'hero_text' => 'We support private candidates taking Cambridge GCE O-Level exams, from subject selection and documentation through to a calm exam day.',
                'hero_image' => 'images/centre-2.webp',
                'hero_points' => ['Cambridge International specifications', 'Private and international candidates', 'Documentation support'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Cambridge O-Level',
                        'title' => 'A respected international qualification.',
                        'text' => 'Cambridge GCE O-Levels are recognised by institutions around the world and can provide a strong academic foundation for further study.',
                        'paragraphs' => [
                            'The O-Level route is particularly relevant for international candidates and families following a Cambridge curriculum. Availability varies by subject and exam series, so we confirm the specification before registration.',
                            'Our team helps with candidate details, subject codes and the documents required by the board. We also explain what to expect on the day, including identification and equipment rules.',
                        ],
                        'bullets' => [
                            'Mathematics, sciences and humanities where available.',
                            'Support for home-educated and international candidates.',
                            'Clear guidance on deadlines and board documentation.',
                            'Professional invigilation in a quiet exam environment.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Subject areas to discuss',
                        'items' => [
                            ['tag' => 'Mathematics', 'title' => 'O-Level Mathematics', 'text' => 'Core and extended options may be available depending on the specification.'],
                            ['tag' => 'Sciences', 'title' => 'Physics, Chemistry and Biology', 'text' => 'Written papers with practical requirements confirmed before entry.'],
                            ['tag' => 'Humanities', 'title' => 'History and Geography', 'text' => 'Essay-based subjects with board-specific paper structures.'],
                            ['tag' => 'English', 'title' => 'English Language', 'text' => 'Language qualifications for international and private candidates.'],
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'O-Level entry checklist',
                        'columns' => ['Requirement', 'Details', 'When to act'],
                        'rows' => [
                            ['Candidate identification', 'Passport or approved photo ID', 'Before registration'],
                            ['Subject availability', 'Confirmed with the board', 'At enquiry stage'],
                            ['Exam series', 'Series and timetable', 'Before the entry deadline'],
                            ['Practical components', 'Check specification requirements', 'Before booking'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'GCE O-Level questions',
                        'items' => [
                            ['q' => 'Who takes GCE O-Levels?', 'a' => 'The qualification is often used by international and home-educated candidates following a Cambridge curriculum.'],
                            ['q' => 'Are O-Levels accepted in the UK?', 'a' => 'Acceptance depends on the institution and course. Always check the specific entry requirements before entering.'],
                            ['q' => 'Can I take O-Levels alongside other qualifications?', 'a' => 'Yes, provided the exam timetables do not clash and the boards permit the combination.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Ask about Cambridge O-Levels', 'text' => 'Tell us your subjects and country of study and we will confirm what is available.', 'label' => 'Start an O-Level enquiry', 'route' => 'exam.registration'],
            ],
            'international-universities-exams' => [
                'name' => 'International University Exams',
                'title' => 'International University Exams in Colchester',
                'meta' => 'Secure exam venue in Colchester for international university admissions tests and professional qualifications.',
                'eyebrow' => 'International university exams',
                'hero_title' => 'A secure venue for high-stakes assessments.',
                'hero_text' => 'We provide a professional, distraction-free environment for international university admissions tests, language qualifications and professional exams.',
                'hero_image' => 'images/centre-1.webp',
                'hero_points' => ['Secure exam environment', 'Admissions and professional tests', 'Candidate-focused administration'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Global assessments',
                        'title' => 'Local access to international qualifications.',
                        'text' => 'Candidates should not have to travel far for an important assessment. We offer a calm, well-managed venue for a range of international exams, subject to provider approval and availability.',
                        'paragraphs' => [
                            'Our team coordinates with awarding bodies and test providers to confirm the arrangements for each candidate. This includes identification checks, permitted materials and any computer-based or paper-based requirements.',
                            'Because international exams vary widely, we ask for the exam provider, qualification name and preferred date at the enquiry stage. We then confirm whether we can host the assessment and what the candidate needs to do next.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Types of assessment',
                        'items' => [
                            ['tag' => 'Admissions', 'title' => 'University entrance tests', 'text' => 'Subject-specific and general admissions assessments where provider approval is in place.'],
                            ['tag' => 'Language', 'title' => 'English proficiency', 'text' => 'Language qualifications for study, migration or professional registration.'],
                            ['tag' => 'Professional', 'title' => 'Professional qualifications', 'text' => 'Secure assessment for credentialing and professional bodies.'],
                            ['tag' => 'Computer-based', 'title' => 'On-screen exams', 'text' => 'Quiet workstations and controlled conditions for eligible computer-based tests.'],
                        ],
                    ],
                    [
                        'type' => 'steps',
                        'title' => 'How to arrange an international exam',
                        'items' => [
                            ['title' => 'Send the provider details', 'text' => 'Tell us the exam name, provider, qualification code and preferred date.'],
                            ['title' => 'We confirm availability', 'text' => 'We check whether the provider allows us to host the assessment and what the requirements are.'],
                            ['title' => 'Complete registration', 'text' => 'You follow the provider process while we prepare the venue and confirm local arrangements.'],
                            ['title' => 'Attend on the day', 'text' => 'Bring the identification and materials specified in your admission document.'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'University exam questions',
                        'items' => [
                            ['q' => 'Do you host every international university exam?', 'a' => 'No. Each provider has its own approval process. We confirm availability before you register.'],
                            ['q' => 'Can I use my own laptop?', 'a' => 'Only where the exam provider permits it and the required security arrangements are in place.'],
                            ['q' => 'How early should I enquire?', 'a' => 'As early as possible. Some providers require venue approval and candidate registration weeks in advance.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Check if we can host your exam', 'text' => 'Send the provider and qualification details and we will confirm the next step.', 'label' => 'Make an exam enquiry', 'route' => 'contact.us'],
            ],
            'exam-registration' => [
                'name' => 'Exam Registration',
                'title' => 'Exam Registration | Colchester Exam Centre',
                'meta' => 'Register for a private exam in Colchester. Send your subject, board and exam series to start the entry process.',
                'eyebrow' => 'Exam registration',
                'hero_title' => 'Start your exam entry with one clear step.',
                'hero_text' => 'Tell us what you want to sit and when. We will check availability, confirm the fee and send you the registration documents.',
                'hero_image' => 'images/hero-lab.jpg',
                'hero_points' => ['No school enrolment needed', 'Clear fee confirmation', 'Support with board paperwork'],
                'blocks' => [
                    [
                        'type' => 'steps',
                        'title' => 'The registration process',
                        'items' => [
                            ['title' => 'Send your details', 'text' => 'Use the enquiry form with your subject, level, exam board if known, and preferred series.'],
                            ['title' => 'We check availability', 'text' => 'We confirm the specification, timetable and whether the subject is open to private candidates.'],
                            ['title' => 'Receive a written quote', 'text' => 'The quote explains the board fee, centre administration and any additional charges.'],
                            ['title' => 'Complete the paperwork', 'text' => 'Return the registration form and identification, then pay the entry fee by the deadline.'],
                            ['title' => 'Prepare for exam day', 'text' => 'We send your timetable, candidate pack and instructions for the day.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Before you enquire',
                        'title' => 'Have these details ready.',
                        'bullets' => [
                            'The qualification and subject you want to enter.',
                            'The exam board or specification code, if you know it.',
                            'The exam series or month you are targeting.',
                            'Any previous candidate number or entry history.',
                            'Any access arrangements or additional needs.',
                        ],
                        'text' => 'If you are unsure about any of these, send what you have. We can help identify the right specification before you commit.',
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Deadlines',
                        'title' => 'Earlier is calmer.',
                        'paragraphs' => [
                            'Exam boards set strict entry deadlines. Late entries can be accepted for some subjects but usually cost more and may not be available for every paper.',
                            'We recommend enquiring at least eight to twelve weeks before the standard deadline, especially for science practicals, speaking tests or access arrangements.',
                        ],
                    ],
                ],
                'faq' => [
                    'title' => 'Registration questions',
                    'items' => [
                        ['q' => 'What information do you need first?', 'a' => 'Your subject, level and preferred exam series is enough to start. We can help with the board and specification.'],
                        ['q' => 'When do I pay?', 'a' => 'After we confirm availability and send a written quote. Your entry is not confirmed until payment and paperwork are complete.'],
                        ['q' => 'Can I cancel an entry?', 'a' => 'Cancellation and refund terms depend on the board deadline and the stage of the entry. We explain these before payment.'],
                    ],
                ],
                'cta' => ['title' => 'Ready to begin?', 'text' => 'Use the enquiry form and include your subject and target series. Our team will reply within one working day.', 'label' => 'Go to the enquiry form', 'route' => 'contact.us'],
            ],
        ];
    }

    private static function infoPages(): array
    {
        return [
            'about-us' => [
                'name' => 'About Us',
                'title' => 'About Us | Colchester Exam Centre',
                'meta' => 'Meet Colchester Exam Centre: a modern private exam and tuition centre built around clarity, care and confidence.',
                'eyebrow' => 'About the centre',
                'hero_title' => 'A modern exam centre built around people.',
                'hero_text' => 'We created Colchester Exam Centre to make private exams feel less intimidating and more straightforward. Professional standards, calm spaces and a team who explain what happens next.',
                'hero_image' => 'images/centre-1.webp',
                'hero_points' => ['Independent and candidate-focused', 'Central Colchester location', 'Exams and tuition under one roof'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Our story',
                        'title' => 'Confidence comes from clarity.',
                        'text' => 'Private candidates often juggle unfamiliar board rules, deadlines and paperwork on their own. Our role is to remove that friction without removing the rigour.',
                        'paragraphs' => [
                            'We support home-educated learners, mature students, international families and candidates improving a grade. Some are taking their first formal exam; others are returning after years away. Every entry gets the same careful attention.',
                            'Our centre brings exam entry and tuition together, so candidates can prepare and sit assessments in a familiar, well-equipped environment.',
                        ],
                    ],
                    [
                        'type' => 'features',
                        'title' => 'What we stand for',
                        'items' => [
                            ['title' => 'Professional standards', 'text' => 'JCQ-compliant invigilation, secure materials and careful attention to board regulations.'],
                            ['title' => 'Human communication', 'text' => 'Plain answers, named contacts and no jargon when something is time-sensitive.'],
                            ['title' => 'Calm surroundings', 'text' => 'Bright rooms and quiet spaces designed to help candidates settle and focus.'],
                            ['title' => 'Local access', 'text' => 'A central Colchester location with good transport links and nearby parking.'],
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Who we help',
                        'items' => [
                            ['tag' => 'Private', 'title' => 'Private candidates', 'text' => 'Candidates entering exams without a school cohort.', 'route' => 'private.candidates', 'link' => 'Private candidate guide'],
                            ['tag' => 'Home ed', 'title' => 'Home-educated learners', 'text' => 'Families who want a clear route to recognised qualifications.', 'route' => 'gcse.exams', 'link' => 'Explore GCSE'],
                            ['tag' => 'Resits', 'title' => 'Resit candidates', 'text' => 'Students improving a grade for college, university or work.', 'route' => 'exams', 'link' => 'Explore exams'],
                            ['tag' => 'Tuition', 'title' => 'Tuition students', 'text' => 'Learners who want specialist teaching alongside exam preparation.', 'route' => 'tuition.centre', 'link' => 'Explore tuition'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Visit us',
                        'title' => 'In the heart of Colchester.',
                        'text' => 'Our centre is easy to reach by bus, train and car. If you are considering an entry, you are welcome to contact us first and arrange a conversation about your options.',
                    ],
                ],
                'cta' => ['title' => 'Talk to our team', 'text' => 'Tell us what you are working towards and we will explain the most sensible next step.', 'label' => 'Contact the centre', 'route' => 'contact.us'],
            ],
            'private-candidates' => [
                'name' => 'Private Candidates',
                'title' => 'Private Candidate Exams in Colchester',
                'meta' => 'A practical guide to sitting exams as a private candidate in Colchester, from board choice to exam day.',
                'eyebrow' => 'Private candidates',
                'hero_title' => 'You do not need a school to sit an exam.',
                'hero_text' => 'Private entry gives you flexibility over subjects, boards and timing. We handle the centre side and help you understand everything the board needs.',
                'hero_image' => 'images/centre-2.webp',
                'hero_points' => ['Home-educated and independent candidates', 'Resits and first entries', 'Board and deadline guidance'],
                'blocks' => [
                    [
                        'type' => 'cards',
                        'title' => 'Who is a private candidate?',
                        'items' => [
                            ['tag' => 'Home ed', 'title' => 'Home-educated learners', 'text' => 'Students learning outside a registered school who need recognised qualifications.'],
                            ['tag' => 'Independent', 'title' => 'Independent students', 'text' => 'Candidates preparing with a tutor, online provider or on their own.'],
                            ['tag' => 'Resits', 'title' => 'Grade improvement', 'text' => 'Candidates retaking a subject to meet a college or university condition.'],
                            ['tag' => 'Mature', 'title' => 'Adult learners', 'text' => 'People returning to education or changing career direction.'],
                            ['tag' => 'International', 'title' => 'International families', 'text' => 'Candidates following UK or international qualifications while living in Essex.'],
                            ['tag' => 'Access', 'title' => 'Additional needs', 'text' => 'Candidates who may be eligible for approved access arrangements.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'What to expect',
                        'title' => 'A clear process, without the school gate.',
                        'paragraphs' => [
                            'As a private candidate, you are responsible for preparing for the exam and meeting the board requirements. We are responsible for checking that the entry is valid, submitting it correctly and running the exam in line with regulations.',
                            'You will need to provide identification, complete the entry paperwork and meet the payment deadline. For some subjects, there may be additional requirements such as a speaking test, practical work or a portfolio.',
                        ],
                        'bullets' => [
                            'Choose a board and specification that accepts private entries.',
                            'Confirm the exam series and any component requirements.',
                            'Check whether your university or college has a preferred board.',
                            'Keep copies of your candidate number and entry confirmation.',
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'Private candidate checklist',
                        'columns' => ['Stage', 'Your responsibility', 'How we help'],
                        'rows' => [
                            ['Before entry', 'Decide subject and target series', 'Check availability and board rules'],
                            ['Registration', 'Provide ID and complete forms', 'Prepare and submit the entry'],
                            ['Preparation', 'Study the specification and prepare', 'Share timetable and exam guidance'],
                            ['Exam day', 'Bring approved ID and equipment', 'Provide a calm, compliant venue'],
                            ['After the exam', 'Wait for results and certificates', 'Explain collection and board processes'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Private entry questions',
                        'items' => [
                            ['q' => 'Can I sit exams in a different board from my school?', 'a' => 'Usually yes, but check the specification and any university requirements. Some subjects assume prior teaching or practical work.'],
                            ['q' => 'Do I need to take all exams in one series?', 'a' => 'Most linear qualifications require all papers in the same series. We confirm this when you enquire.'],
                            ['q' => 'Can I get predicted grades?', 'a' => 'Predicted grades are usually provided by a school or tutor, not the exam centre. We can explain what is available for private candidates.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'New to private entry?', 'text' => 'Send us your situation and we will explain the simplest route to the qualification you need.', 'label' => 'Ask a private candidate question', 'route' => 'contact.us'],
            ],
            'exam-fees' => [
                'name' => 'Exam Fees',
                'title' => 'Exam Fees | Colchester Exam Centre',
                'meta' => 'Understand private exam fees, board charges and centre administration at Colchester Exam Centre.',
                'eyebrow' => 'Exam fees',
                'hero_title' => 'Clear fees, quoted before you commit.',
                'hero_text' => 'Private exam costs include board entry fees and centre administration. We confirm both in writing before you pay, so there are no hidden surprises.',
                'hero_image' => 'images/centre-3.webp',
                'hero_points' => ['Written quote before payment', 'Board fees passed through transparently', 'Late-entry costs explained upfront'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'How fees work',
                        'title' => 'You pay for the entry, not for uncertainty.',
                        'text' => 'Exam board fees differ by qualification, subject and series. Our centre administration covers the work involved in checking, submitting and running your entry.',
                        'paragraphs' => [
                            'We do not publish a single price list because the board component changes. Once we know your subject, board and series, we send a written quote showing the board fee, our administration fee and any additional charges.',
                            'Late entries, practical endorsements, speaking tests and access arrangements may carry extra costs. We explain these before you decide whether to proceed.',
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'What may appear on your quote',
                        'columns' => ['Item', 'What it covers', 'How it is charged'],
                        'rows' => [
                            ['Board entry fee', 'The awarding body charge for your subject and papers', 'Passed through at the rate confirmed by the board'],
                            ['Centre administration', 'Entry checks, submission, invigilation and room preparation', 'Fixed centre fee per candidate or subject'],
                            ['Late entry', 'Additional board charge after the standard deadline', 'Only where the board permits and availability exists'],
                            ['Practical endorsement', 'Laboratory time, materials and assessment arrangements', 'Quoted separately for eligible science subjects'],
                            ['Access arrangements', 'Additional invigilation or room requirements where approved', 'Confirmed after the board approves the arrangement'],
                        ],
                        'note' => 'The exact amount depends on the board, subject, series and entry timing.',
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Payment and refunds',
                        'title' => 'Pay only when the entry is confirmed as possible.',
                        'bullets' => [
                            'We check availability before requesting payment.',
                            'Your quote includes the total amount and payment deadline.',
                            'Cancellation terms depend on the board deadline and the stage of the entry.',
                            'Refunds are not usually available after the board deadline has passed.',
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Fee questions',
                        'items' => [
                            ['q' => 'Why can the price change between boards?', 'a' => 'Each board sets its own entry fees and some subjects have additional component charges.'],
                            ['q' => 'Is the centre fee included in the board fee?', 'a' => 'No. We show them separately so you can see exactly what you are paying for.'],
                            ['q' => 'Do you charge for an enquiry?', 'a' => 'No. We confirm availability and send a quote before any payment is required.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Get a written quote', 'text' => 'Send your subject, board and exam series and we will confirm the fee and deadline.', 'label' => 'Request a quote', 'route' => 'contact.us'],
            ],
            'exam-dates' => [
                'name' => 'Exam Dates',
                'title' => 'Exam Dates and Deadlines | Colchester Exam Centre',
                'meta' => 'Key exam series and entry deadline guidance for private candidates at Colchester Exam Centre.',
                'eyebrow' => 'Exam dates and deadlines',
                'hero_title' => 'Know the series. Meet the deadline.',
                'hero_text' => 'Exam boards publish final timetables and deadlines each year. We help you work backwards from the right date so nothing is left to the last minute.',
                'hero_image' => 'images/study-1.jpg',
                'hero_points' => ['Autumn, January and summer series', 'Board deadlines checked for you', 'Timetable guidance before exam day'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Plan early',
                        'title' => 'The cheapest entry is usually the one made on time.',
                        'text' => 'Board deadlines are fixed and late entry is not guaranteed. We recommend starting the conversation at least three months before a summer series and earlier for practical or access-arrangement cases.',
                        'paragraphs' => [
                            'The dates below are a planning guide, not a substitute for the official board timetable. Once your entry is confirmed, we send the final dates and session times for your papers.',
                        ],
                    ],
                    [
                        'type' => 'table',
                        'title' => 'Typical exam series',
                        'columns' => ['Series', 'When exams usually take place', 'Best time to enquire'],
                        'rows' => [
                            ['Autumn', 'October to November', 'June to August'],
                            ['January', 'January', 'September to October'],
                            ['Summer', 'May to June', 'December to February'],
                        ],
                        'note' => 'Not every subject is available in every series. January availability is especially limited.',
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Deadlines that matter',
                        'items' => [
                            ['tag' => 'Entry', 'title' => 'Standard entry deadline', 'text' => 'The normal deadline for the series. Missing it can trigger a higher late fee.'],
                            ['tag' => 'Late', 'title' => 'Late entry window', 'text' => 'A short period where some boards accept entries at an increased fee.'],
                            ['tag' => 'Access', 'title' => 'Access arrangements', 'text' => 'Evidence usually needs to be submitted before the entry deadline.'],
                            ['tag' => 'Practical', 'title' => 'Practical endorsement', 'text' => 'Science practical sessions need to be planned around written papers.'],
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Dates and deadlines questions',
                        'items' => [
                            ['q' => 'When will I receive my timetable?', 'a' => 'We send the confirmed timetable once the board publishes it and your entry is confirmed.'],
                            ['q' => 'Can I change an exam date?', 'a' => 'You cannot choose a different date for the same paper, but you may be able to change series. Board rules and deadlines apply.'],
                            ['q' => 'What happens if two exams clash?', 'a' => 'Boards have procedures for timetable clashes. Tell us as soon as you know so we can check the correct arrangements.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Check your exam series', 'text' => 'Tell us the qualification and target month and we will confirm the entry window.', 'label' => 'Ask about exam dates', 'route' => 'contact.us'],
            ],
            'subjects-offered' => [
                'name' => 'Subjects Offered',
                'title' => 'Subjects Offered | Colchester Exam Centre',
                'meta' => 'Explore the GCSE, IGCSE, A-Level and O-Level subject areas available to private candidates in Colchester.',
                'eyebrow' => 'Subjects offered',
                'hero_title' => 'Find the subject that fits your plan.',
                'hero_text' => 'Subject availability depends on the board and exam series. Use this guide to start your search, then ask us to confirm the exact specification.',
                'hero_image' => 'images/study-2.jpg',
                'hero_points' => ['GCSE, IGCSE, A-Level and O-Level', 'Major UK and international boards', 'Availability checked before entry'],
                'blocks' => [
                    [
                        'type' => 'table',
                        'title' => 'Subject areas by level',
                        'columns' => ['Level', 'Popular subject areas', 'Boards to discuss'],
                        'rows' => [
                            ['GCSE', 'Maths, English, sciences, humanities, languages', 'AQA, Edexcel, OCR'],
                            ['IGCSE', 'Maths, English, sciences, humanities, business', 'Pearson Edexcel, Cambridge International'],
                            ['A-Level', 'Maths, sciences, humanities, social sciences', 'AQA, Edexcel, OCR'],
                            ['GCE O-Level', 'Maths, sciences, humanities, English', 'Cambridge International'],
                            ['International', 'Admissions tests, language and professional exams', 'Provider-specific'],
                        ],
                        'note' => 'This is a planning guide. Not every subject is available in every series or to private candidates.',
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Popular subject groups',
                        'items' => [
                            ['tag' => 'STEM', 'title' => 'Mathematics and sciences', 'text' => 'Core academic subjects for university, healthcare, engineering and technical routes.'],
                            ['tag' => 'English', 'title' => 'English and languages', 'text' => 'Language and literature qualifications with speaking or written components.'],
                            ['tag' => 'Humanities', 'title' => 'History, geography and social sciences', 'text' => 'Essay-based subjects that reward clear argument and exam technique.'],
                            ['tag' => 'Business', 'title' => 'Business and economics', 'text' => 'Popular routes for students interested in enterprise, finance and management.'],
                            ['tag' => 'Practical', 'title' => 'Science practicals', 'text' => 'Laboratory endorsements for eligible A-Level science candidates.'],
                            ['tag' => 'Resits', 'title' => 'Improve a grade', 'text' => 'Re-enter a subject where the board and timetable allow.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Before you choose',
                        'title' => 'Check the specification, not just the subject name.',
                        'bullets' => [
                            'The board and specification code determine the papers and requirements.',
                            'Some subjects include coursework, speaking tests or practical assessments.',
                            'University and college offers may specify a particular board or subject.',
                            'Timetable clashes can affect subject combinations.',
                        ],
                    ],
                ],
                'faq' => [
                    'title' => 'Subject questions',
                    'items' => [
                        ['q' => 'How do I know if my subject is available?', 'a' => 'Send us the subject, level and target series. We check the board and specification before confirming.'],
                        ['q' => 'Can I take a subject I have not studied before?', 'a' => 'Yes, but you are responsible for preparing for the exam. Some subjects assume practical or classroom experience.'],
                        ['q' => 'Do you offer every subject?', 'a' => 'No. Availability depends on the board, series, room requirements and whether the specification accepts private candidates.'],
                    ],
                ],
                'cta' => ['title' => 'Confirm your subject', 'text' => 'Send us the subject and level you need and we will check the current options.', 'label' => 'Ask about a subject', 'route' => 'contact.us'],
            ],
            'exam-boards' => [
                'name' => 'Exam Boards',
                'title' => 'Exam Boards | Colchester Exam Centre',
                'meta' => 'Information about AQA, Pearson Edexcel, OCR, Cambridge International and WJEC Eduqas private exam entries.',
                'eyebrow' => 'Exam boards',
                'hero_title' => 'The right board makes the process clearer.',
                'hero_text' => 'Different boards offer different specifications, deadlines and assessment structures. We help you compare the practical differences before you enter.',
                'hero_image' => 'images/hero-lab.jpg',
                'hero_points' => ['Major UK boards', 'Cambridge International access', 'Specification guidance'],
                'blocks' => [
                    [
                        'type' => 'cards',
                        'title' => 'Boards we work with',
                        'items' => [
                            ['tag' => 'AQA', 'title' => 'AQA', 'text' => 'A major UK board with a wide range of GCSE and A-Level specifications.'],
                            ['tag' => 'Edexcel', 'title' => 'Pearson Edexcel', 'text' => 'GCSE, IGCSE, A-Level and international qualifications with familiar structures.'],
                            ['tag' => 'OCR', 'title' => 'OCR', 'text' => 'UK qualifications with clear specifications and assessment guidance.'],
                            ['tag' => 'Cambridge', 'title' => 'Cambridge International', 'text' => 'International GCSE, O-Level and other globally recognised qualifications.'],
                            ['tag' => 'Eduqas', 'title' => 'WJEC Eduqas', 'text' => 'Selected specifications where available to private candidates.'],
                            ['tag' => 'Other', 'title' => 'Provider-specific exams', 'text' => 'International university and professional assessments arranged on request.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Choosing a board',
                        'title' => 'Look beyond the name.',
                        'paragraphs' => [
                            'Two boards may offer the same subject name but use different paper structures, set texts or practical requirements. If you are self-studying, the availability of past papers and clear specifications can matter as much as the board name.',
                            'If you have a university offer or a college requirement, check it before choosing. Changing board later can mean starting the entry process again.',
                        ],
                        'bullets' => [
                            'Check whether the specification accepts private candidates.',
                            'Confirm the exam series and component requirements.',
                            'Review past papers and the specification before committing.',
                            'Ask us to check access arrangements and deadlines.',
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Board questions',
                        'items' => [
                            ['q' => 'Can I choose any board?', 'a' => 'You can choose any board that accepts private entries and is available at our centre for your subject and series.'],
                            ['q' => 'Does the board affect university acceptance?', 'a' => 'Usually the qualification matters more than the board, but some courses specify particular requirements. Always check the offer.'],
                            ['q' => 'Can I switch boards for a resit?', 'a' => 'Sometimes, but it may change the specification and preparation required. Discuss it with us before entering.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Need help choosing?', 'text' => 'Tell us the subject and your next step and we will explain the board options.', 'label' => 'Ask about exam boards', 'route' => 'contact.us'],
            ],
            'booking-process' => [
                'name' => 'Booking Process',
                'title' => 'Booking Process | Colchester Exam Centre',
                'meta' => 'How to book a private exam at Colchester Exam Centre, from first enquiry to exam day.',
                'eyebrow' => 'Booking process',
                'hero_title' => 'Five steps from enquiry to exam day.',
                'hero_text' => 'No maze of forms. Just a clear sequence with a real person checking each stage and telling you what happens next.',
                'hero_image' => 'images/study-3.webp',
                'hero_points' => ['One named contact', 'Written confirmation', 'No surprise fees'],
                'blocks' => [
                    [
                        'type' => 'steps',
                        'title' => 'How booking works',
                        'items' => [
                            ['title' => 'Make an enquiry', 'text' => 'Send your subject, level, board and preferred exam series through the contact form.'],
                            ['title' => 'We check availability', 'text' => 'We confirm the specification, timetable and whether private entry is open.'],
                            ['title' => 'Receive your quote', 'text' => 'You get a written breakdown of the board fee, centre fee and any extras.'],
                            ['title' => 'Complete registration', 'text' => 'Return the forms and identification and pay by the stated deadline.'],
                            ['title' => 'Prepare for the day', 'text' => 'We send your timetable, candidate pack and practical instructions.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'What we need from you',
                        'title' => 'Accurate details prevent delays.',
                        'bullets' => [
                            'Your full name exactly as it should appear on the certificate.',
                            'A valid photo ID and any previous candidate number.',
                            'The subject, board and specification if you already know them.',
                            'Any access arrangements or medical evidence.',
                            'A reliable email address and phone number.',
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Booking questions',
                        'items' => [
                            ['q' => 'Can I book by phone?', 'a' => 'We can discuss your entry by phone, but we ask for the key details in writing so there is a clear record.'],
                            ['q' => 'How quickly will I hear back?', 'a' => 'We aim to reply within one working day. Availability checks with a board may take longer.'],
                            ['q' => 'Can I book for someone else?', 'a' => 'Yes, but we will need the candidate’s consent and accurate personal details.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Begin your booking', 'text' => 'Send your requirements and we will start the availability check.', 'label' => 'Contact the exams team', 'route' => 'contact.us'],
            ],
            'testimonials' => [
                'name' => 'Testimonials',
                'title' => 'Testimonials | Colchester Exam Centre',
                'meta' => 'What candidates and families say about sitting exams and tuition at Colchester Exam Centre.',
                'eyebrow' => 'Candidate stories',
                'hero_title' => 'The best feedback is a calmer candidate.',
                'hero_text' => 'Our candidates come from different backgrounds and study routes. These are the themes we hear most often: clarity, kindness and a centre that feels manageable on the day.',
                'hero_image' => 'images/centre-3.webp',
                'hero_points' => ['Private candidates', 'Home-educating families', 'Tuition students'],
                'blocks' => [
                    [
                        'type' => 'cards',
                        'title' => 'What candidates say',
                        'items' => [
                            ['tag' => 'A-Level', 'title' => '“Everything was explained before I paid.”', 'text' => 'I was nervous about entering as a private candidate. The team checked the board requirements and told me exactly what to bring on the day.'],
                            ['tag' => 'GCSE', 'title' => '“The centre felt calm, not clinical.”', 'text' => 'My daughter sat her GCSEs here after home education. The rooms were quiet and the staff made the process feel ordinary.'],
                            ['tag' => 'Resit', 'title' => '“They caught a deadline issue early.”', 'text' => 'I almost missed the late-entry window. The team flagged it immediately and helped me get the paperwork completed.'],
                            ['tag' => 'Tuition', 'title' => '“The teaching connected to the exam.”', 'text' => 'The sessions focused on how marks are actually awarded, not just content. That changed how I revised.'],
                            ['tag' => 'International', 'title' => '“A professional setting for a big exam.”', 'text' => 'The venue was secure and well organised. I knew where to go and what to expect from the admission document.'],
                            ['tag' => 'Parent', 'title' => '“We finally knew who to ask.”', 'text' => 'Having one named contact made a complicated entry feel much simpler for our family.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Share your experience',
                        'title' => 'Your feedback helps us improve.',
                        'text' => 'If you have sat an exam or attended tuition with us, we would be glad to hear what worked and what could be clearer. We use feedback to improve the candidate pack and the way we explain deadlines.',
                    ],
                ],
                'cta' => ['title' => 'Speak to a real person', 'text' => 'If you have a question before booking, our team is happy to talk it through.', 'label' => 'Contact us', 'route' => 'contact.us'],
            ],
        ];
    }

    private static function servicePages(): array
    {
        return [
            'practical-endorsement' => [
                'name' => 'Practical Endorsement',
                'title' => 'A-Level Practical Endorsement in Colchester',
                'meta' => 'Complete A-Level science practical endorsement for Biology, Chemistry and Physics at Colchester Exam Centre.',
                'eyebrow' => 'Practical endorsement',
                'hero_title' => 'Meet the practical requirement with confidence.',
                'hero_text' => 'A-Level science qualifications often require a practical endorsement alongside the written exams. We provide structured laboratory sessions for eligible private candidates.',
                'hero_image' => 'images/hero-lab.jpg',
                'hero_points' => ['Biology, Chemistry and Physics', 'JCQ practical standards', 'Private candidate friendly'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'What it is',
                        'title' => 'The endorsement is separate from your written grade.',
                        'paragraphs' => [
                            'The practical endorsement confirms that a candidate has developed the required experimental skills. It appears separately on the certificate and may be required by universities for science courses.',
                            'Private candidates cannot usually complete the endorsement at home. Our laboratory sessions provide the apparatus, supervision and assessment needed to meet the required standards.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'Science pathways',
                        'items' => [
                            ['tag' => 'Physics', 'title' => 'Physics practical endorsement', 'text' => 'Circuit work, measurement, data analysis and experimental uncertainty.'],
                            ['tag' => 'Chemistry', 'title' => 'Chemistry practical endorsement', 'text' => 'Titration, qualitative analysis, synthesis and safe laboratory practice.'],
                            ['tag' => 'Biology', 'title' => 'Biology practical endorsement', 'text' => 'Microscopy, sampling, biological techniques and data interpretation.'],
                            ['tag' => 'Planning', 'title' => 'Check your offer', 'text' => 'Confirm whether your university course requires the practical endorsement.'],
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'eyebrow' => 'Before you book',
                        'title' => 'Practical requirements vary by board.',
                        'bullets' => [
                            'Tell us your board, specification and written exam series.',
                            'Confirm whether you have already completed any practical work.',
                            'Share any university offer that mentions the endorsement.',
                            'Book early so laboratory sessions fit around your revision.',
                        ],
                    ],
                    [
                        'type' => 'faq',
                        'title' => 'Practical endorsement questions',
                        'items' => [
                            ['q' => 'Can I take the practical endorsement separately?', 'a' => 'It is normally taken alongside the A-Level science qualification. We confirm the board rules for your subject before booking.'],
                            ['q' => 'Do I need to be enrolled at a school?', 'a' => 'No. We support private candidates who need to complete the practical requirement externally.'],
                            ['q' => 'Is the endorsement graded?', 'a' => 'It is reported as a pass or not classified, separate from the A-Level grade.'],
                        ],
                    ],
                ],
                'cta' => ['title' => 'Plan your practical sessions', 'text' => 'Send your subject, board and exam series and we will confirm the practical pathway.', 'label' => 'Ask about practical endorsement', 'route' => 'contact.us'],
            ],
            'online-learning' => [
                'name' => 'Online Learning',
                'title' => 'Online Learning | Colchester Exam Centre',
                'meta' => 'Live, tutor-led online learning for GCSE, IGCSE and A-Level candidates preparing for private exams.',
                'eyebrow' => 'Online learning',
                'hero_title' => 'Expert teaching, wherever you are.',
                'hero_text' => 'Live online sessions give private candidates structure, feedback and specialist teaching without needing to travel to a classroom.',
                'hero_image' => 'images/study-1.jpg',
                'hero_points' => ['Live tutor-led sessions', 'Exam-technique focus', 'Flexible around your timetable'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'eyebrow' => 'How it works',
                        'title' => 'Built for independent learners.',
                        'paragraphs' => [
                            'Our online lessons are live and interactive, not pre-recorded videos. Tutors explain concepts, check understanding and connect the content to the specification you are sitting.',
                            'Sessions are planned around the exam board and paper structure, with regular practice and feedback. This is particularly useful for candidates preparing without a school cohort.',
                        ],
                    ],
                    [
                        'type' => 'cards',
                        'title' => 'What online learning includes',
                        'items' => [
                            ['tag' => 'Live', 'title' => 'Tutor-led lessons', 'text' => 'Real-time teaching with opportunities to ask questions and clarify misunderstandings.'],
                            ['tag' => 'Focus', 'title' => 'Exam-technique coaching', 'text' => 'Practice in the command words, structures and timing that earn marks.'],
                            ['tag' => 'Feedback', 'title' => 'Progress feedback', 'text' => 'Regular guidance on what is improving and what to work on next.'],
                            ['tag' => 'Flexible', 'title' => 'Study around life', 'text' => 'Useful for home-educated learners, mature students and families outside Colchester.'],
                        ],
                    ],
                    [
                        'type' => 'steps',
                        'title' => 'Getting started',
                        'items' => [
                            ['title' => 'Tell us your subject and board', 'text' => 'Share the qualification, board and target exam series.'],
                            ['title' => 'We match the support', 'text' => 'We confirm whether a group or one-to-one route is the better fit.'],
                            ['title' => 'Agree a timetable', 'text' => 'Choose a schedule that fits around your exam preparation.'],
                            ['title' => 'Start learning', 'text' => 'Join live sessions and receive clear follow-up tasks.'],
                        ],
                    ],
                ],
                'faq' => [
                    'title' => 'Online learning questions',
                    'items' => [
                        ['q' => 'Are sessions recorded?', 'a' => 'Recording arrangements depend on the course. We confirm this before you enrol.'],
                        ['q' => 'Do I need special software?', 'a' => 'You need a reliable internet connection and a device with a camera and microphone. We send joining instructions before the first session.'],
                        ['q' => 'Can online learning replace exam entry?', 'a' => 'No. Tuition prepares you for the exam, but you still need a separate entry at an exam centre.'],
                    ],
                ],
                'cta' => ['title' => 'Ask about online tuition', 'text' => 'Tell us the subject and exam board you are preparing for.', 'label' => 'Contact our tuition team', 'route' => 'tuition.centre'],
            ],
        ];
    }

    private static function policyPages(): array
    {
        return [
            'privacy-policy' => [
                'name' => 'Privacy Policy',
                'title' => 'Privacy Policy | Colchester Exam Centre',
                'meta' => 'How Colchester Exam Centre collects, uses and protects personal information.',
                'eyebrow' => 'Privacy policy',
                'hero_title' => 'Your information, handled with care.',
                'hero_text' => 'This policy explains what personal information we collect, why we need it and the choices available to you.',
                'hero_image' => 'images/centre-2.webp',
                'hero_points' => ['Clear purpose', 'Limited retention', 'Your rights explained'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'title' => 'Who we are',
                        'paragraphs' => [
                            'Colchester Exam Centre provides private exam entry, tuition and related administrative services. We are responsible for the personal information we collect through this website and our centre operations.',
                            'If you have a privacy question, contact us using the details on the contact page and ask for the data protection contact.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Information we collect',
                        'bullets' => [
                            'Contact details such as your name, email address, phone number and postal address.',
                            'Exam entry details, including candidate numbers, subjects and awarding body information.',
                            'Identification and eligibility documents where required for entry or access arrangements.',
                            'Messages you send through our enquiry or contact forms.',
                            'Technical information such as browser type and pages visited, where analytics are enabled.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'How we use your information',
                        'paragraphs' => [
                            'We use personal information to respond to enquiries, arrange exam entries, provide tuition, meet awarding body requirements and manage our relationship with candidates and families.',
                            'We may also use information to keep records, improve our services and meet legal or regulatory obligations. We do not sell personal information.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Sharing and retention',
                        'paragraphs' => [
                            'We share information with awarding bodies, invigilators and service providers only where necessary to deliver the exam or tuition service. Where we use suppliers, we expect them to protect your information.',
                            'We keep information only for as long as needed for the purpose it was collected, including any period required by exam boards or law. After that, we delete or anonymise it securely.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Your rights',
                        'bullets' => [
                            'Ask for a copy of the personal information we hold about you.',
                            'Ask us to correct information that is inaccurate or incomplete.',
                            'Ask us to delete information where there is no lawful reason to keep it.',
                            'Object to certain uses or ask us to restrict processing.',
                            'Complain to the Information Commissioner’s Office if you are unhappy with our response.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Cookies and website data',
                        'paragraphs' => [
                            'Our website may use essential cookies to operate correctly and optional analytics cookies to understand how pages are used. See our Cookie Policy for more detail. You can control cookies through your browser settings.',
                        ],
                    ],
                ],
                'cta' => ['title' => 'Questions about privacy?', 'text' => 'Contact our team and we will direct your question to the right person.', 'label' => 'Contact us', 'route' => 'contact.us'],
            ],
            'terms-of-use' => [
                'name' => 'Terms of Use',
                'title' => 'Terms of Use | Colchester Exam Centre',
                'meta' => 'Terms governing the use of the Colchester Exam Centre website and our exam and tuition services.',
                'eyebrow' => 'Terms of use',
                'hero_title' => 'The ground rules for using our services.',
                'hero_text' => 'These terms explain the basis on which we provide our website, exam entry support and tuition services.',
                'hero_image' => 'images/centre-1.webp',
                'hero_points' => ['Website use', 'Exam entries', 'Fees and conduct'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'title' => 'Using this website',
                        'paragraphs' => [
                            'The information on this website is provided for general guidance. Exam availability, fees, dates and board rules can change, so you should confirm the details with us before making a decision.',
                            'You may use the website for lawful purposes only. You must not attempt to interfere with its security, availability or normal operation.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Exam entries',
                        'bullets' => [
                            'An exam entry is confirmed only when we have accepted the registration and received payment by the stated deadline.',
                            'The candidate is responsible for providing accurate personal details and valid identification.',
                            'Awarding body rules, deadlines and fees apply in addition to our centre requirements.',
                            'We may decline or cancel an entry where information is inaccurate, payment is not received or the board does not permit the entry.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Fees and cancellations',
                        'paragraphs' => [
                            'Fees are confirmed in writing before payment. Board fees and centre administration may be shown separately. Additional charges may apply for late entries, practical work or access arrangements.',
                            'Cancellation and refund terms depend on the awarding body deadline and the stage of the entry. Once a board deadline has passed, refunds are usually not available.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Candidate conduct',
                        'bullets' => [
                            'Candidates must follow all exam centre and awarding body instructions.',
                            'Unauthorised materials, phones or smart devices are not permitted in the exam room.',
                            'Disruptive, abusive or unsafe behaviour may lead to removal from the centre.',
                            'Malpractice may be reported to the awarding body and can affect results.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Liability and changes',
                        'paragraphs' => [
                            'We take reasonable care to provide a safe and compliant service, but we do not guarantee particular exam results or university outcomes. Nothing in these terms limits liability that cannot be limited by law.',
                            'We may update these terms from time to time. The version published on this website applies to new use of the site and new bookings.',
                        ],
                    ],
                ],
                'cta' => ['title' => 'Need clarification?', 'text' => 'If anything in these terms is unclear, contact us before booking.', 'label' => 'Contact us', 'route' => 'contact.us'],
            ],
            'cookie-policy' => [
                'name' => 'Cookie Policy',
                'title' => 'Cookie Policy | Colchester Exam Centre',
                'meta' => 'How Colchester Exam Centre uses cookies and how you can manage them.',
                'eyebrow' => 'Cookie policy',
                'hero_title' => 'Small files, clear choices.',
                'hero_text' => 'Cookies help a website work properly and can provide useful information about how pages are used. This policy explains what we use and how to control it.',
                'hero_image' => 'images/centre-3.webp',
                'hero_points' => ['Essential cookies', 'Optional analytics', 'Browser controls'],
                'blocks' => [
                    [
                        'type' => 'prose',
                        'title' => 'What cookies are',
                        'paragraphs' => [
                            'Cookies are small text files placed on your device when you visit a website. They can help a site remember your preferences, keep a session secure or collect anonymous usage information.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Cookies we may use',
                        'bullets' => [
                            'Essential cookies needed for the website and forms to function securely.',
                            'Session cookies that help keep your visit consistent while you move between pages.',
                            'Analytics cookies, where enabled, to understand which pages are useful and how visitors find us.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Managing cookies',
                        'paragraphs' => [
                            'You can accept, reject or delete cookies through your browser settings. Blocking essential cookies may affect how parts of the website work, including forms and login areas.',
                            'Where optional analytics are used, we aim to configure them in a privacy-conscious way. We do not use cookies to sell personal information.',
                        ],
                    ],
                    [
                        'type' => 'prose',
                        'title' => 'Changes to this policy',
                        'paragraphs' => [
                            'We may update this policy if our website or the law changes. The latest version will be published on this page.',
                        ],
                    ],
                ],
                'cta' => ['title' => 'Cookie questions?', 'text' => 'Contact us if you need more information about how our website works.', 'label' => 'Contact us', 'route' => 'contact.us'],
            ],
        ];
    }
}
