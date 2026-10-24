<?php

namespace App\Support;

use App\Models\PageContent;

class SiteContent
{
    public static function defaults(string $slug): array
    {
        return match ($slug) {
            'home' => self::homeDefaults(),
            'tuition' => self::tuitionCentreDefaults(),
            'contact' => self::contactDefaults(),
            'tuition-page' => self::tuitionPageDefaults(),
            'form' => self::formDefaults(),
            'blog' => self::blogIndexDefaults(),
            'sitemap' => self::sitemapDefaults(),
            default => self::fallbackDefaults($slug),
        };
    }

    public static function get(string $slug): array
    {
        return self::merge(self::defaults($slug), self::stored($slug));
    }

    public static function blogPost(string $slug): ?array
    {
        if (! BlogPosts::find($slug)) {
            return null;
        }

        return self::merge(self::defaults('blog-'.$slug), self::stored('blog-'.$slug));
    }

    public static function blogPosts(): array
    {
        $posts = [];

        foreach (BlogPosts::all() as $slug => $post) {
            $posts[$slug] = self::merge($post, self::stored('blog-'.$slug));
        }

        return $posts;
    }

    private static function stored(string $slug): array
    {
        $stored = PageContent::where('page_slug', $slug)->first()?->content ?? [];

        return is_array($stored) ? $stored : [];
    }

    private static function merge(array $defaults, array $stored): array
    {
        foreach ($stored as $key => $value) {
            if (! is_string($key)) {
                continue;
            }

            if (str_contains($key, '.')) {
                data_set($defaults, $key, $value);
            } else {
                $defaults[$key] = $value;
            }
        }

        return $defaults;
    }

    private static function fallbackDefaults(string $slug): array
    {
        if (str_starts_with($slug, 'blog-')) {
            $post = BlogPosts::find(substr($slug, 5));

            if (! $post) {
                return [];
            }

            return array_merge($post, [
                'cta_eyebrow' => 'Your next step',
                'cta_title' => 'Need help applying this to your exam?',
                'cta_text' => 'Send us the subject and series you are considering and we will confirm what is possible.',
            ]);
        }

        return SitePages::find($slug) ?? [];
    }

    private static function homeDefaults(): array
    {
        return [
            'title' => 'Colchester Exam Centre | Private Exam & Tuition Centre in Colchester',
            'meta' => 'Sit GCSE, IGCSE, A-Level and university entrance exams as a private candidate in Colchester. Expert tuition, JCQ-compliant facilities and a genuinely supportive team.',
            'hero_eyebrow' => "Colchester's trusted private exam centre",
            'hero_title' => 'Where ambition meets its moment.',
            'hero_highlight' => 'ambition',
            'hero_text' => 'A calm, modern exam centre in the heart of Colchester. We give private candidates the clarity, support and confidence to perform at their very best - from GCSE and A-Level to university entrance exams.',
            'hero_secondary_label' => 'Explore our tuition',
            'hero_image' => 'images/centre-1.webp',
            'hero_image_small' => 'images/hero-lab.jpg',
            'stat_1_value' => '15+',
            'stat_1_label' => 'Years of exam experience',
            'stat_2_value' => '3,500+',
            'stat_2_label' => 'Candidates supported',
            'stat_3_value' => '98%',
            'stat_3_label' => 'Candidate satisfaction',
            'intro_eyebrow' => 'Why candidates choose us',
            'intro_title' => 'Serious about your success, thoughtful about your experience.',
            'intro_text' => 'We combine rigorous exam standards with a genuinely human approach. Every candidate is welcomed, guided and treated as an individual - because results matter, and so does how you feel getting there.',
            'intro_image_main' => 'images/study-1.jpg',
            'intro_image_secondary' => 'images/centre-2.webp',
            'cta_title' => 'Your next chapter starts with one conversation.',
            'cta_text' => 'Tell us what you are working towards and our team will map out the right exam or tuition pathway for you.',
        ];
    }

    private static function tuitionCentreDefaults(): array
    {
        return [
            'title' => 'Tuition Centre in Colchester | Colchester Exam Centre',
            'meta' => 'Small-group and one-to-one tuition in Colchester for GCSE, IGCSE, A-Level, university entrance and adult learners. Specialist tutors, examiner insight and flexible evening and weekend classes.',
            'hero_eyebrow' => 'Tuition centre',
            'hero_title' => 'Tuition that turns potential into progress.',
            'hero_text' => 'Small-group and one-to-one tuition led by subject specialists in Colchester. Whether you are catching up, stretching further or preparing for exams, we build a plan around you.',
            'hero_image' => 'images/study-2.jpg',
            'intro_title' => 'Teaching that adapts to the way you learn.',
            'intro_text' => 'Our tutors are experienced teachers and examiners who know exactly what the boards are looking for. Sessions are structured, encouraging and focused on the skills that move grades - not just content coverage.',
            'fee_note' => 'All tuition fees are per course and include learning materials, progress updates and exam-style practice. Flexible payment plans are available on request.',
            'intro_image_main' => 'images/centre-2.webp',
            'intro_image_secondary' => 'images/study-3.webp',
            'enquiry_title' => 'Not sure which course is right?',
            'enquiry_text' => 'Send us a short message and we will recommend the best starting point for your goals, timetable and budget.',
        ];
    }

    private static function contactDefaults(): array
    {
        return [
            'title' => 'Contact Us | Colchester Exam Centre',
            'meta' => 'Contact Colchester Exam Centre for private exam entries, tuition enquiries and registration support. Call, email or send us a message and we will reply within one working day.',
            'hero_eyebrow' => 'Contact us',
            'hero_title' => "Let's talk about your next step.",
            'hero_text' => 'Questions about exams, tuition or registration? Our team is here to help. Send a message, call us, or drop in during opening hours.',
            'hero_image' => 'images/centre-3.webp',
            'address_line1' => 'Colchester Exam Centre',
            'address_line2' => '42 High Street',
            'city' => 'Colchester',
            'postcode' => 'CO1 1DH',
            'phone' => '+44 (0)1206 000 000',
            'email' => 'hello@colchesterexamcentre.co.uk',
            'hours_weekday' => 'Monday - Friday: 9:00am - 6:00pm',
            'hours_saturday' => 'Saturday: 9:00am - 2:00pm',
            'hours_sunday' => 'Sunday: Closed',
            'map_query' => 'Colchester, Essex, United Kingdom',
        ];
    }

    private static function tuitionPageDefaults(): array
    {
        return [
            'title' => 'Tuition in Colchester | Colchester Exam Centre',
            'meta' => 'Focused GCSE, IGCSE, A-Level and university entrance tuition in Colchester. One-to-one and small-group teaching built around your exam board and target grade.',
            'hero_eyebrow' => 'Tuition at Colchester Exam Centre',
            'hero_title' => 'Teaching that targets the paper in front of you.',
            'hero_text' => 'Focused tuition for private candidates, home-educated learners and students who need a clearer route through the specification. Choose one-to-one support or a small group that fits your timetable.',
            'hero_points' => ['GCSE, IGCSE and A-Level', '1:1 and small groups', 'Online or in Colchester'],
            'hero_primary_label' => 'Ask about tuition',
            'hero_secondary_label' => 'View tuition centre',
            'hero_image' => 'images/study-3.webp',
            'hero_chip' => 'Exam-board focused',
            'intro_eyebrow' => 'A plan made for you',
            'intro_title' => 'One clear plan. No wasted sessions.',
            'intro_text' => 'We start with the qualification, board and target grade, then build the teaching around the skills and content that will actually move your result.',
            'intro_cta_label' => 'Build my tuition plan',
            'intro_image_main' => 'images/study-2.jpg',
            'intro_image_secondary' => 'images/centre-2.webp',
            'intro_badge_value' => '1:1',
            'intro_badge_label' => 'Support available',
            'benefits' => [
                ['title' => 'Specification-led teaching', 'text' => 'Every session connects back to your board, papers and assessment objectives.'],
                ['title' => 'Exam technique from day one', 'text' => 'Learn how marks are awarded, not just what is on the page.'],
                ['title' => 'Regular feedback', 'text' => 'Know what is improving and what to work on before the next session.'],
                ['title' => 'Flexible format', 'text' => 'In-centre, online, one-to-one or small group - whatever helps you focus.'],
            ],
            'pathways_eyebrow' => 'Tuition pathways',
            'pathways_title' => 'Choose the support that fits your next step.',
            'pathways_text' => 'Every pathway can be adapted to the exam board, timetable and level you are working at.',
            'pathways' => [
                ['tag' => 'GCSE', 'title' => 'GCSE tuition', 'text' => 'Core subjects, science pathways and resit preparation with a clear focus on exam technique.', 'link' => 'Explore GCSE exams', 'route' => 'gcse.exams'],
                ['tag' => 'IGCSE', 'title' => 'IGCSE tuition', 'text' => 'Support for Pearson Edexcel and Cambridge International specifications, including English and sciences.', 'link' => 'Explore IGCSE exams', 'route' => 'igcse.exams'],
                ['tag' => 'A-Level', 'title' => 'A-Level tuition', 'text' => 'Subject-specific teaching for first entries, resits and university offer conditions.', 'link' => 'Explore A-Level exams', 'route' => 'alevel.exams'],
                ['tag' => 'University', 'title' => 'University entrance', 'text' => 'Preparation for admissions tests, interviews and the academic skills expected at university.', 'link' => 'Explore university exams', 'route' => 'international.university.exams'],
                ['tag' => 'Online', 'title' => 'Online tuition', 'text' => 'Live, tutor-led sessions for candidates who need specialist teaching without travelling.', 'link' => 'Explore online learning', 'route' => 'online.learning'],
                ['tag' => 'Adults', 'title' => 'Mature learners', 'text' => 'A calm, respectful route back into study for career changes, access courses and personal goals.', 'link' => 'Private candidate guide', 'route' => 'private.candidates'],
            ],
            'approach_eyebrow' => 'What to expect',
            'approach_title' => 'Structured teaching, without the pressure.',
            'approach_items' => [
                ['title' => 'A short diagnostic', 'text' => 'We identify the gaps that matter most, rather than starting from page one.'],
                ['title' => 'A written plan', 'text' => 'Clear goals, session focus and the exam skills we will build together.'],
                ['title' => 'Practice with feedback', 'text' => 'Exam-style questions are reviewed so you know how to improve the next answer.'],
                ['title' => 'Progress you can see', 'text' => 'Regular updates keep you and your family clear about what is working.'],
            ],
            'steps_eyebrow' => 'Getting started',
            'steps_title' => 'From first message to first session.',
            'steps_items' => [
                ['title' => 'Tell us your goal', 'text' => 'Share the subject, level, board and target grade or date.'],
                ['title' => 'We check the fit', 'text' => 'We confirm whether one-to-one, small group or online support is the better route.'],
                ['title' => 'Agree a timetable', 'text' => 'Choose a schedule that works around school, work or independent study.'],
                ['title' => 'Start with a plan', 'text' => 'Your first session establishes priorities and the path to exam day.'],
            ],
            'faq_eyebrow' => 'Tuition questions',
            'faq_title' => 'Good questions before you book.',
            'faq_items' => [
                ['q' => 'Do you offer one-to-one tuition?', 'a' => 'Yes. One-to-one sessions are available for most subjects and levels, subject to tutor availability and the exam board you are preparing for.'],
                ['q' => 'Can tuition be online?', 'a' => 'Yes. Live online sessions are available for candidates who cannot travel. They follow the same structured, specification-led approach as in-centre tuition.'],
                ['q' => 'Can you help with a resit?', 'a' => 'We can. We review the previous result, the paper structure and the areas that need the most attention, then build a focused resit plan.'],
                ['q' => 'Do I need an exam entry to book tuition?', 'a' => 'No. Tuition and exam entry are separate services, though many candidates choose to arrange both with us.'],
                ['q' => 'How do I know which format is right?', 'a' => 'Tell us about your subject, timetable and confidence. We will recommend the format that gives you the most useful support.'],
            ],
            'cta_eyebrow' => 'Ready to start?',
            'cta_title' => 'Let us build the right tuition plan around you.',
            'cta_text' => 'Send us the subject, level and exam board you are working towards. We will explain the options and the next step.',
            'cta_primary_label' => 'Ask about tuition',
            'cta_secondary_label' => 'Browse courses',
        ];
    }

    private static function formDefaults(): array
    {
        return [
            'title' => 'Online Form | Colchester Exam Centre',
            'meta' => 'Complete an online form for Colchester Exam Centre. Use this page to submit your exam, tuition or registration details securely.',
            'hero_eyebrow' => 'Online form',
            'hero_title' => 'Complete your details in one place.',
            'hero_text' => 'Use the form below for registration, tuition enquiries or exam-related requests. If you are unsure which option to choose, contact the team first and we will point you in the right direction.',
            'hero_points' => ['Secure online submission', 'Clear confirmation', 'Help available if needed'],
            'card_eyebrow' => 'Before you begin',
            'card_title' => 'Have these ready',
            'card_items' => [
                'Your full name and contact details',
                'The exam, subject or service you need',
                'Your preferred exam series or start date',
                'Any access arrangements or support needs',
            ],
            'card_link_label' => 'Need help first?',
            'form_eyebrow' => 'Your submission',
            'form_title' => 'Online form',
            'form_text' => 'Complete the embedded form below. If it does not load, please contact us and we will help you finish your request.',
            'form_label' => 'Secure form',
            'form_brand' => 'Colchester Exam Centre',
            'form_status' => 'Ready to complete',
            'form_note' => 'Your information is used only to respond to your enquiry or process your request.',
            'form_placeholder_title' => 'Online form area',
            'form_placeholder_text' => 'This space is ready for the online form. If you need to submit your details now, please contact the centre and we will help you complete your request.',
            'form_placeholder_button' => 'Contact the centre',
            'cta_eyebrow' => 'Prefer to speak to us?',
            'cta_title' => 'We are happy to help you complete your form.',
            'cta_text' => 'If you have a question about exams, tuition or which form you need, contact the team directly.',
            'cta_primary_label' => 'Contact us',
            'cta_secondary_label' => 'Call the centre',
        ];
    }

    private static function blogIndexDefaults(): array
    {
        return [
            'title' => 'Blog | Colchester Exam Centre',
            'meta' => 'Practical guides for private exam candidates, from choosing an exam board to preparing for exam day.',
            'eyebrow' => 'Guidance from the centre',
            'hero_title' => 'Clear thinking for your next exam.',
            'hero_text' => 'Practical guides for private candidates, families and independent learners. No jargon, no guesswork - just the details that help you plan well.',
            'cta_eyebrow' => 'Still unsure?',
            'cta_title' => 'Ask a question before you enter.',
            'cta_text' => 'Tell us the subject, level and series you have in mind. We will check the practical details and explain the next step.',
        ];
    }

    private static function sitemapDefaults(): array
    {
        return [
            'title' => 'Sitemap | Colchester Exam Centre',
            'meta' => 'A complete guide to the pages and information available on the Colchester Exam Centre website.',
            'eyebrow' => 'Website guide',
            'hero_title' => 'Everything in one place.',
            'hero_text' => 'Use this page to find exam information, candidate guidance, centre services and our policies.',
            'posts_eyebrow' => 'From the blog',
            'posts_title' => 'Recent guidance for candidates.',
            'posts_link_label' => 'View the blog',
        ];
    }
}
