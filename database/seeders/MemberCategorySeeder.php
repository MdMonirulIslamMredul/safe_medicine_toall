<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberCategory;
use Illuminate\Support\Str;

class MemberCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Advisor Committee',
                'name_bn' => 'উপদেষ্টা পরিষদ / উপদেষ্টার তালিকা',
                'slug' => 'advisor-committee',
                'description' => 'Honorable advisors providing guidance and leadership.',
                'order_index' => 1,
                'status' => true,
            ],
            [
                'name' => 'Executive Committee',
                'name_bn' => 'কার্যনির্বাহী কমিটি / কমিটির তালিকা',
                'slug' => 'executive-committee',
                'description' => 'Governing and executive members overseeing organization operations.',
                'order_index' => 2,
                'status' => true,
            ],
            [
                'name' => 'Lifetime Member',
                'name_bn' => 'আজীবন সদস্য',
                'slug' => 'lifetime-member',
                'description' => 'Dedicated lifelong members supporting our mission.',
                'order_index' => 3,
                'status' => true,
            ],
            [
                'name' => 'General Member',
                'name_bn' => 'সাধারণ সদস্য',
                'slug' => 'general-member',
                'description' => 'Active general members and volunteers.',
                'order_index' => 4,
                'status' => true,
            ],
            [
                'name' => 'Donor Member',
                'name_bn' => 'দাতা সদস্য',
                'slug' => 'donor-member',
                'description' => 'Philanthropic and contributing donor members.',
                'order_index' => 5,
                'status' => true,
            ],
        ];

        foreach ($categories as $cat) {
            MemberCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
