<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\MemberCategory;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adv = MemberCategory::where('slug', 'advisor-committee')->first();
        $exec = MemberCategory::where('slug', 'executive-committee')->first();
        $life = MemberCategory::where('slug', 'lifetime-member')->first();
        $gen = MemberCategory::where('slug', 'general-member')->first();

        // 1. Chief Medical Advisor
        Member::updateOrCreate(
            ['phone' => '01711000001'],
            [
                'member_category_id' => $adv ? $adv->id : null,
                'name' => 'Prof. Dr. A. K. Azad',
                'name_bn' => 'অধ্যাপক ড. এ. কে. আজাদ',
                'designation' => 'Chief Medical Advisor',
                'designation_bn' => 'প্রধান উপদেষ্টা ও মেডিসিন বিশেষজ্ঞ',
                'organization' => 'National Health & Medicine Council',
                'profession' => 'Professor & Senior Physician',
                'email' => 'dr.azad@safemedicine.org',
                'blood_group' => 'B+',
                'gender' => 'Male',
                'present_address' => 'Dhanmondi, Dhaka',
                'photo' => 'frontend/images/about/sq1.jpg',
                'bio' => 'Senior Professor of Internal Medicine with over 30 years of clinical and pharmacological research experience.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 1,
                'member_id_no' => 'ADV-001'
            ]
        );

        // 2. President
        Member::updateOrCreate(
            ['phone' => '01711000002'],
            [
                'member_category_id' => $exec ? $exec->id : null,
                'name' => 'Dr. Mohammad Shamsul Huda',
                'name_bn' => 'ড. মোহাম্মদ শামসুল হুদা',
                'designation' => 'President',
                'designation_bn' => 'সভাপতি ও জনস্বাস্থ্য গবেষক',
                'organization' => 'Safe Medicine For All Foundation',
                'profession' => 'Public Health Researcher',
                'email' => 'shamsul.huda@safemedicine.org',
                'blood_group' => 'O+',
                'gender' => 'Male',
                'present_address' => 'Gulshan, Dhaka',
                'photo' => 'frontend/images/about/sq2.jpg',
                'bio' => 'Dedicated researcher working on public drug quality assurance and citizen health rights nationwide.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 2,
                'member_id_no' => 'EC-001'
            ]
        );

        // 3. Clinical Pharmacologist & Advisor
        Member::updateOrCreate(
            ['phone' => '01711000004'],
            [
                'member_category_id' => $adv ? $adv->id : null,
                'name' => 'Prof. Dr. Fahmida Sultana',
                'name_bn' => 'অধ্যাপক ডা. ফাহমিদা সুলতানা',
                'designation' => 'Clinical Pharmacologist & Advisor',
                'designation_bn' => 'ক্লিনিক্যাল ফার্মাকোলজি বিশেষজ্ঞ ও উপদেষ্টা',
                'organization' => 'Institute of Public Health & Clinical Research',
                'profession' => 'Pharmacology Specialist',
                'email' => 'fahmida.sultana@safemedicine.org',
                'blood_group' => 'A+',
                'gender' => 'Female',
                'present_address' => 'Uttara, Dhaka',
                'photo' => 'frontend/images/about/sq3.jpg',
                'bio' => 'Renowned pharmacologist leading laboratory testing and counter-analysis of spurious drug formulations.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 3,
                'member_id_no' => 'ADV-002'
            ]
        );

        // 4. General Secretary & Drug Quality Auditor
        Member::updateOrCreate(
            ['phone' => '01711000005'],
            [
                'member_category_id' => $exec ? $exec->id : null,
                'name' => 'Pharmacist S. M. Tanvir Ahmed',
                'name_bn' => 'ফার্মাসিস্ট এস. এম. তানভীর আহমেদ',
                'designation' => 'General Secretary',
                'designation_bn' => 'সাধারণ সম্পাদক ও ঔষধ মান নিয়ন্ত্রণ বিশেষজ্ঞ',
                'organization' => 'Bangladesh Pharmacy Council & Quality Lead',
                'profession' => 'Registered Pharmacist & QA Specialist',
                'email' => 'tanvir.ahmed@safemedicine.org',
                'blood_group' => 'AB+',
                'gender' => 'Male',
                'present_address' => 'Banani, Dhaka',
                'photo' => 'frontend/images/about/sq4.jpg',
                'bio' => 'Certified pharmaceutical auditor with extensive expertise in GMP manufacturing compliance and retail surveillance.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 4,
                'member_id_no' => 'EC-002'
            ]
        );

        // 5. Director of Public Awareness
        Member::updateOrCreate(
            ['phone' => '01711000006'],
            [
                'member_category_id' => $exec ? $exec->id : null,
                'name' => 'Dr. Mahbubur Rahman',
                'name_bn' => 'ডা. মাহবুবুর রহমান',
                'designation' => 'Director (Public Health Outreach)',
                'designation_bn' => 'পরিচালক (জনস্বাস্থ্য ও গণসচেতনতা)',
                'organization' => 'Safe Medicine Campaign',
                'profession' => 'Medical Practitioner',
                'email' => 'mahbub.rahman@safemedicine.org',
                'blood_group' => 'B+',
                'gender' => 'Male',
                'present_address' => 'Mirpur, Dhaka',
                'photo' => 'frontend/images/about/ab1.jpg',
                'bio' => 'Organizer of rural medical camps and counterfeit medicine identification workshops.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 5,
                'member_id_no' => 'EC-003'
            ]
        );

        // 6. Legal & Consumer Rights Advisor
        Member::updateOrCreate(
            ['phone' => '01711000007'],
            [
                'member_category_id' => $adv ? $adv->id : null,
                'name' => 'Adv. Kamrul Hasan',
                'name_bn' => 'অ্যাডভোকেট কামরুল হাসান',
                'designation' => 'Legal & Consumer Rights Advisor',
                'designation_bn' => 'আইন ও ভোক্তা অধিকার বিষয়ক উপদেষ্টা',
                'organization' => 'Supreme Court of Bangladesh',
                'profession' => 'Senior Advocate',
                'email' => 'kamrul.hasan@safemedicine.org',
                'blood_group' => 'O+',
                'gender' => 'Male',
                'present_address' => 'Motijheel, Dhaka',
                'photo' => 'frontend/images/about/ab2.jpg',
                'bio' => 'Leading legal advocate prosecuting counterfeit pharmaceutical syndicates and defending consumer health rights.',
                'status' => 'approved',
                'is_featured' => true,
                'order_index' => 6,
                'member_id_no' => 'ADV-003'
            ]
        );

        // 7. General Member
        Member::updateOrCreate(
            ['phone' => '01711000003'],
            [
                'member_category_id' => $gen ? $gen->id : null,
                'name' => 'Md. Faruk Hossain',
                'name_bn' => 'মো. ফারুক হোসেন',
                'designation' => 'General Member',
                'designation_bn' => 'সাধারণ সদস্য',
                'organization' => 'Green Model Pharmacy',
                'profession' => 'Pharmacist',
                'email' => 'faruk@example.com',
                'blood_group' => 'A+',
                'gender' => 'Male',
                'present_address' => 'Mirpur, Dhaka',
                'status' => 'approved',
                'is_featured' => false,
                'order_index' => 7,
                'member_id_no' => 'GEN-001'
            ]
        );
    }
}
