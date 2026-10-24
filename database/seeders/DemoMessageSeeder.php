<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class DemoMessageSeeder extends Seeder
{
    public function run(): void
    {
        if (ContactMessage::exists()) {
            return;
        }

        ContactMessage::create([
            'full_name' => 'Sophie Bennett',
            'email' => 'sophie.bennett@example.com',
            'phone' => '07700 900123',
            'subject' => 'A-Level Biology tuition',
            'message' => 'Hello, my daughter is sitting A-Level Biology next summer and would like to join the Thursday group. Could you confirm whether there are spaces and what the payment plan looks like?',
            'source' => 'tuition',
            'status' => 'new',
        ]);

        ContactMessage::create([
            'full_name' => 'Daniel Okafor',
            'email' => 'daniel.okafor@example.com',
            'phone' => '07700 900456',
            'subject' => 'Private candidate exam entry',
            'message' => 'I would like to register as a private candidate for GCSE Maths this November. Please let me know the deadlines and what identification I need to bring.',
            'source' => 'contact',
            'status' => 'new',
        ]);
    }
}
