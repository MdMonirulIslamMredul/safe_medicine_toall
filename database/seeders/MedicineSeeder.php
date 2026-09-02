<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\MedicineImage;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Napa Extra (Safe / Authentic with Counterfeit awareness notes)
        $napa = Medicine::create([
            'name'               => 'Napa Extra',
            'generic_name'       => 'Paracetamol + Caffeine',
            'manufacturer'       => 'Beximco Pharmaceuticals Ltd.',
            'dosage_form'        => 'Tablet',
            'strength'           => '500 mg + 65 mg',
            'dar_number'         => 'DAR 025-0145-022',
            'price'              => 2.50,
            'therapeutic_class'  => 'Analgesic & Antipyretic',
            'status'             => 'safe',
            'safety_verdict'     => 'DGDA Approved Genuine Drug. Watch out for counterfeit copies circulating in local retail pharmacies.',
            'indications'        => 'Fever, headache, toothache, migraine, muscular pain, cold and flu symptoms.',
            'dosage_guidelines'  => 'Adults: 1-2 tablets every 4-6 hours as needed. Maximum 8 tablets in 24 hours.',
            'side_effects'       => 'Rare at recommended dosage. Overdose may cause severe liver damage.',
            'storage_condition'  => 'Store below 30°C in a dry place. Protect from direct light and moisture.',
            'authentic_features' => "1. 3D Optical Security Hologram on box flap that changes color under light.\n2. Embossed Batch Number & Expiry date on blister foil.\n3. Crisp Beximco Logo with high-resolution typography.\n4. Official DGDA Registration DAR No (025-0145-022) clearly printed.\n5. High quality solid foil with smooth pill depression.",
            'fake_indicators'    => "1. Flat printed yellow or rainbow sticker without real 3D depth.\n2. Blurry company logo or misspelled brand name (e.g., 'Bexmco' or 'Napafast').\n3. Black ink stamped batch date instead of foil embossing.\n4. Powdery, chalky, easily crumbled tablet texture.\n5. Abnormally cheap retail price or missing barcode.",
            'affected_batches'   => 'Counterfeit batch reports found: NX-0099, NX-FAKE-01',
            'is_featured'        => true,
            'view_count'         => 142,
        ]);

        MedicineImage::create([
            'medicine_id'      => $napa->id,
            'image_path'       => 'uploads/medicines/napa_extra_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Napa Extra Packaging & Blister Pack',
            'highlight_points' => 'Genuine 3D Security Hologram, deep foil embossing, and clear DGDA DAR 025-0145-022 registration.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        MedicineImage::create([
            'medicine_id'      => $napa->id,
            'image_path'       => 'uploads/medicines/napa_extra_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Counterfeit / Fake Napa Extra Copy Alert',
            'highlight_points' => 'Red flags: Flat fake hologram sticker, misspelled "Bexmco", blurry barcode, and ink-stamped foil.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 2. Seclo 20 (Safe / Authentic with Counterfeit awareness notes)
        $seclo = Medicine::create([
            'name'               => 'Seclo 20',
            'generic_name'       => 'Omeprazole BP',
            'manufacturer'       => 'Square Pharmaceuticals Ltd.',
            'dosage_form'        => 'Capsule',
            'strength'           => '20 mg',
            'dar_number'         => 'DAR 028-0248-020',
            'price'              => 5.00,
            'therapeutic_class'  => 'Proton Pump Inhibitor (PPI)',
            'status'             => 'safe',
            'safety_verdict'     => 'Verified Genuine DGDA Registered PPI Capsule. Inspect Alu-Alu blister foil security seal.',
            'indications'        => 'Gastric ulcer, duodenal ulcer, gastroesophageal reflux disease (GERD), acid-related dyspepsia.',
            'dosage_guidelines'  => '1 capsule (20mg) once daily before breakfast for 4-8 weeks, or as directed by a physician.',
            'side_effects'       => 'Headache, diarrhea, constipation, abdominal pain, nausea.',
            'storage_condition'  => 'Store in a cool and dry place below 30°C. Protect from moisture.',
            'authentic_features' => "1. High-grade moisture-proof Alu-Alu foil with Square embossed emblem.\n2. Genuine security color-shifting seal on box.\n3. Distinct two-tone capsule (amber & dark red) with enteric coated pellets inside.\n4. DGDA DAR 028-0248-020 on outer box and foil back.",
            'fake_indicators'    => "1. Cheap translucent plastic blister instead of authentic Alu-Alu foil.\n2. Misspelled 'Omeprazol' or 'Squar Pharma'.\n3. Clumped or discolored powder instead of uniform mini-pellets inside capsule.\n4. Faded blue stripe on packaging.",
            'affected_batches'   => 'Spurious batches flagged in local markets: SQ-FAKE-990',
            'is_featured'        => true,
            'view_count'         => 189,
        ]);

        MedicineImage::create([
            'medicine_id'      => $seclo->id,
            'image_path'       => 'uploads/medicines/seclo_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Seclo 20 Alu-Alu Blister & Security Box',
            'highlight_points' => 'Moisture-proof silver Alu-Alu foil, distinct Square logo, and official DGDA DAR number.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        MedicineImage::create([
            'medicine_id'      => $seclo->id,
            'image_path'       => 'uploads/medicines/seclo_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Counterfeit Seclo 20 Substandard Plastic Copy',
            'highlight_points' => 'Red flags: Cheap plastic blister, misspelled "Squar", flat sticker with zero holographic reflection.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 3. Sergel 20 (Healthcare Pharmaceuticals)
        $sergel = Medicine::create([
            'name'               => 'Sergel 20',
            'generic_name'       => 'Esomeprazole Magnesium Trihydrate',
            'manufacturer'       => 'Healthcare Pharmaceuticals Ltd.',
            'dosage_form'        => 'Capsule',
            'strength'           => '20 mg',
            'dar_number'         => 'DAR 241-0185-020',
            'price'              => 7.00,
            'therapeutic_class'  => 'Proton Pump Inhibitor (PPI)',
            'status'             => 'safe',
            'safety_verdict'     => 'Genuine Anti-Ulcerant. Check Healthcare Pharma silver hologram and micro-text.',
            'indications'        => 'Gastroesophageal reflux disease (GERD), erosive esophagitis, H. pylori eradication.',
            'dosage_guidelines'  => '20 mg to 40 mg once daily at least 1 hour before meals.',
            'side_effects'       => 'Headache, flatulence, abdominal pain, dry mouth.',
            'storage_condition'  => 'Store below 25°C in a dry place. Keep out of reach of children.',
            'authentic_features' => "1. Healthcare Pharmaceuticals distinct holographic seal.\n2. High quality blister packaging with crisp blue & silver printing.\n3. Enteric-coated pellets with consistent size and off-white color.\n4. Microtext verification pattern visible under magnifying glass.",
            'fake_indicators'    => "1. Dull packaging with misaligned color boundaries.\n2. Missing DAR license number on the blister back.\n3. Loose foil sealing prone to air leaks and degraded medication.",
            'affected_batches'   => null,
            'is_featured'        => true,
            'view_count'         => 98,
        ]);

        MedicineImage::create([
            'medicine_id'      => $sergel->id,
            'image_path'       => 'uploads/medicines/seclo_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Sergel 20 Packaging & Holographic Seal',
            'highlight_points' => 'Clear silver foil, official Healthcare Pharma logo, and crisp micro-text.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 4. Monas 10 (Acme Laboratories)
        $monas = Medicine::create([
            'name'               => 'Monas 10',
            'generic_name'       => 'Montelukast Sodium',
            'manufacturer'       => 'The ACME Laboratories Ltd.',
            'dosage_form'        => 'Tablet',
            'strength'           => '10 mg',
            'dar_number'         => 'DAR 004-0312-010',
            'price'              => 16.00,
            'therapeutic_class'  => 'Leukotriene Receptor Antagonist',
            'status'             => 'safe',
            'safety_verdict'     => 'DGDA Approved Respiratory & Allergy Medicine.',
            'indications'        => 'Prophylaxis and chronic treatment of asthma, relief of symptoms of seasonal and perennial allergic rhinitis.',
            'dosage_guidelines'  => 'Adults & adolescents 15 years and older: 10 mg tablet once daily in the evening.',
            'side_effects'       => 'Upper respiratory infection, fever, headache, pharyngitis, cough, abdominal pain.',
            'storage_condition'  => 'Store below 30°C in a dry and cool place away from sunlight.',
            'authentic_features' => "1. Distinct ACME logo in red & blue hexagon.\n2. Rounded square tablets with crisp breakline.\n3. Heavy gauge aluminum blister foil.\n4. DGDA DAR 004-0312-010 clearly marked on carton and foil.",
            'fake_indicators'    => "1. Pale or chalky tablets with irregular shape.\n2. Misspelled 'Montelucast' or 'ACME Lab'.\n3. Faded print on the back of the blister pack.",
            'affected_batches'   => null,
            'is_featured'        => true,
            'view_count'         => 115,
        ]);

        MedicineImage::create([
            'medicine_id'      => $monas->id,
            'image_path'       => 'uploads/medicines/napa_extra_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Monas 10 Blister & Carton',
            'highlight_points' => 'Genuine ACME logo, crisp print, and heavy gauge aluminum foil.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 5. Ciprocin 500 (Square Pharmaceuticals)
        $ciprocin = Medicine::create([
            'name'               => 'Ciprocin 500',
            'generic_name'       => 'Ciprofloxacin USP',
            'manufacturer'       => 'Square Pharmaceuticals Ltd.',
            'dosage_form'        => 'Tablet',
            'strength'           => '500 mg',
            'dar_number'         => 'DAR 028-0056-020',
            'price'              => 14.00,
            'therapeutic_class'  => 'Fluoroquinolone Antibiotic',
            'status'             => 'warning',
            'safety_verdict'     => 'CAUTION: Prescription-only antibiotic. Check batch numbers carefully against registered DGDA database.',
            'indications'        => 'Urinary tract infections, respiratory tract infections, enteric infections, skin & soft tissue infections.',
            'dosage_guidelines'  => '500 mg every 12 hours for 7-14 days or as strictly prescribed by a registered doctor.',
            'side_effects'       => 'Nausea, diarrhea, tendonitis risk, dizziness, rash.',
            'storage_condition'  => 'Store in a cool & dry place below 30°C.',
            'authentic_features' => "1. Square Pharmaceuticals security seal.\n2. Film-coated white oblong tablet with 'SQUARE' debossed.\n3. Moisture-proof strip with batch & exp date stamped clearly.",
            'fake_indicators'    => "1. Substandard un-coated tablets that dissolve or crumble in hand.\n2. Mismatched typography on blister back.\n3. Unregistered batch numbers or non-standard price discounts.",
            'affected_batches'   => 'Batch SQ-CP-4402 flagged for quality recall',
            'is_featured'        => false,
            'view_count'         => 76,
        ]);

        MedicineImage::create([
            'medicine_id'      => $ciprocin->id,
            'image_path'       => 'uploads/medicines/seclo_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Ciprocin 500 Film-Coated Pack',
            'highlight_points' => 'Original Square seal, debossed tablet markings, and registered DAR number.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 6. Ace Plus (Square Pharmaceuticals)
        $ace = Medicine::create([
            'name'               => 'Ace Plus',
            'generic_name'       => 'Paracetamol + Caffeine',
            'manufacturer'       => 'Square Pharmaceuticals Ltd.',
            'dosage_form'        => 'Tablet',
            'strength'           => '500 mg + 65 mg',
            'dar_number'         => 'DAR 028-0310-022',
            'price'              => 2.50,
            'therapeutic_class'  => 'Analgesic & Antipyretic',
            'status'             => 'safe',
            'safety_verdict'     => 'DGDA Verified Analgesic & Antipyretic Tablet.',
            'indications'        => 'Fever, headache, backache, toothache, neuralgias, dysmenorrhea.',
            'dosage_guidelines'  => '1-2 tablets every 4 to 6 hours as needed. Maximum 8 tablets in 24 hours.',
            'side_effects'       => 'Rare. Allergic reactions or liver toxicity if overdosed.',
            'storage_condition'  => 'Store below 30°C in a dry place. Protect from light.',
            'authentic_features' => "1. Distinct red & white Square carton design.\n2. Clear blister foil with red Ace Plus logo.\n3. Embossed batch & expiry date on the edge of the strip.",
            'fake_indicators'    => "1. Faded pinkish color instead of vibrant red.\n2. Ink-printed expiry date instead of mechanical embossing.\n3. Missing Square logo on blister foil.",
            'affected_batches'   => null,
            'is_featured'        => true,
            'view_count'         => 64,
        ]);

        MedicineImage::create([
            'medicine_id'      => $ace->id,
            'image_path'       => 'uploads/medicines/napa_extra_safe.svg',
            'type'             => 'safe',
            'title'            => 'Authentic Ace Plus Strip & Carton',
            'highlight_points' => 'Crisp Square logo, embossed expiry date, and official registration.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 7. Counterfeit Napa Extra Clone (Explicit Unsafe Alert)
        $fakeNapa = Medicine::create([
            'name'               => 'Fake Napa Extra (Counterfeit Batch)',
            'generic_name'       => 'Spurious Paracetamol + Unknown Fillers',
            'manufacturer'       => 'Unauthorized Counterfeiter (Falsely labeled as Beximco)',
            'dosage_form'        => 'Tablet',
            'strength'           => '500 mg + 65 mg (Fake)',
            'dar_number'         => 'FAKE-DAR-99120',
            'price'              => 1.00,
            'therapeutic_class'  => 'Counterfeit / Spurious Drug Alert',
            'status'             => 'unsafe',
            'safety_verdict'     => 'বিপজ্জনক নকল ঔষধ: বাজারে প্রচলিত জিপসাম ও চক পাউডার মিশ্রিত ভেজাল প্যারাসিটামল। সেবনে লিভার ও কিডনির মারাত্মক ক্ষতি হতে পারে।',
            'indications'        => 'DANGEROUS: DO NOT CONSUME. Lacks therapeutic efficacy and contains toxic adulterants.',
            'dosage_guidelines'  => 'DO NOT TAKE. Hand over immediately to local DGDA drug inspector or hospital pharmacy.',
            'side_effects'       => 'Severe organ toxicity, lack of fever reduction, potential poisoning.',
            'storage_condition'  => 'Quarantine in laboratory.',
            'authentic_features' => "Original Beximco Napa Extra features a 3D hologram with color shifting and mechanical foil embossing.",
            'fake_indicators'    => "1. Flat yellow sticker that does NOT shift colors under light.\n2. Company misspelled as 'Bexmco'.\n3. Black ink stamp on blister foil instead of mechanical embossing.\n4. Tablets crumble instantly into powder upon light pressure.",
            'affected_batches'   => 'Batch: NX-0099, NX-FAKE-01',
            'is_featured'        => true,
            'view_count'         => 312,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeNapa->id,
            'image_path'       => 'uploads/medicines/napa_extra_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Counterfeit Packaging with Flat Yellow Sticker',
            'highlight_points' => 'Red flag: Flat sticker with no 3D holographic effect, misspelled Bexmco logo.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 8. Counterfeit Seclo 20 Substandard Batch (Explicit Unsafe Alert)
        $fakeSeclo = Medicine::create([
            'name'               => 'Seclo 20mg (Substandard Batch)',
            'generic_name'       => 'Substandard Omeprazole Blend',
            'manufacturer'       => 'Pirated Lab (Falsely labeled as Square Pharma)',
            'dosage_form'        => 'Capsule',
            'strength'           => '20 mg (Substandard)',
            'dar_number'         => 'FAKE-DAR-0044',
            'price'              => 2.00,
            'therapeutic_class'  => 'Proton Pump Inhibitor (Counterfeit)',
            'status'             => 'unsafe',
            'safety_verdict'     => 'অননুমোদিত ভেজাল ক্যাপসুল: স্কয়ার ফার্মার মোড়কে নকল প্লাস্টিক ফয়েল ও কার্যকারিতাহীন চকের গুঁড়া মিশ্রিত ঝুঁকিপূর্ণ ব্যাচ।',
            'indications'        => 'WARNING: Ineffective and chemically degraded. Zero acid suppression effect.',
            'dosage_guidelines'  => 'DO NOT CONSUME. Report seller to DGDA consumer safety hotline.',
            'side_effects'       => 'Gastric irritation, treatment failure, toxic contamination.',
            'storage_condition'  => 'Seized batch.',
            'authentic_features' => "Original Square Seclo 20 uses moisture-barrier Alu-Alu foil and high-definition security seal.",
            'fake_indicators'    => "1. Cheap transparent plastic blister instead of Alu-Alu foil.\n2. Misspelled 'Squar Pharma' on carton.\n3. Discolored clumpy powder inside capsules.\n4. Invalid barcode.",
            'affected_batches'   => 'Batch: SQ-FAKE-990, SQ-0441',
            'is_featured'        => true,
            'view_count'         => 240,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeSeclo->id,
            'image_path'       => 'uploads/medicines/seclo_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Substandard Plastic Blister Strip Example',
            'highlight_points' => 'Red flag: Cheap plastic backing instead of official Alu-Alu foil, misspelled "Squar".',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 9. Hazardous Tofen Syrup (Toxic Solvent Alert)
        $fakeTofen = Medicine::create([
            'name'               => 'Tofen Syrup (Toxic Solvent Alert)',
            'generic_name'       => 'Counterfeit Ketotifen Fumarate',
            'manufacturer'       => 'Unlicensed Workshop (Falsely Labeled as Beximco)',
            'dosage_form'        => 'Syrup',
            'strength'           => '1 mg / 5 ml',
            'dar_number'         => 'BANNED-TF-881',
            'price'              => 25.00,
            'therapeutic_class'  => 'Antiasthmatic & Antiallergic (Adulterated)',
            'status'             => 'unsafe',
            'safety_verdict'     => 'নিষিদ্ধ ও বিষাক্ত সিরাপ সতর্কতা: অননুমোদিত ক্ষতিকর ডাই-ইথিলিন গ্লাইকল দ্রাবক মিশ্রিত ভেজাল কিটোটিফেন সিরাপ।',
            'indications'        => 'DEADLY HAZARD: DO NOT GIVE TO CHILDREN. Causes acute renal failure and toxicity.',
            'dosage_guidelines'  => 'STRICTLY PROHIBITED. Hand over to DGDA inspector immediately.',
            'side_effects'       => 'Acute kidney injury, severe metabolic acidosis, central nervous system depression.',
            'storage_condition'  => 'Quarantined evidence.',
            'authentic_features' => "Genuine Beximco Tofen has tamper-proof sealed cap with embossed logo and clear syrup.",
            'fake_indicators'    => "1. Bottle cap has no breakable safety seal.\n2. Cloudiness or sediment at the bottom of bottle.\n3. Pungent chemical odor.\n4. Blurry label printing with missing registration.",
            'affected_batches'   => 'Batch: TF-881, TF-902',
            'is_featured'        => true,
            'view_count'         => 428,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeTofen->id,
            'image_path'       => 'uploads/medicines/napa_extra_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Unsealed Toxic Syrup Bottle Alert',
            'highlight_points' => 'Red flag: Unsealed cap, sediment formation, pungent chemical odor, missing DAR code.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 10. Illicit Azithrocin 500 (Chalk / Gypsum Antibiotic Copy)
        $fakeAzithro = Medicine::create([
            'name'               => 'Azithrocin 500 (Illicit Chalk Batch)',
            'generic_name'       => 'Adulterated Azithromycin USP',
            'manufacturer'       => 'Illegal Workshop (Falsely Labeled as Aristopharma)',
            'dosage_form'        => 'Tablet',
            'strength'           => '500 mg (Fake)',
            'dar_number'         => 'BANNED-AZ-990',
            'price'              => 10.00,
            'therapeutic_class'  => 'Macrolide Antibiotic (Spurious)',
            'status'             => 'unsafe',
            'safety_verdict'     => 'অবৈধ কারখানায় তৈরি নকল অ্যান্টিবায়োটিক: এরিস্টোফার্মার প্যাকেজিং নকল করে তৈরি অননুমোদিত ট্যাবলেট যাতে কোনো অ্যান্টিবায়োটিক উপাদান নেই।',
            'indications'        => 'HAZARDOUS: Lacks active antibiotic. Leads to life-threatening infection progression and sepsis.',
            'dosage_guidelines'  => 'DO NOT TAKE. Seek genuine prescription medication immediately.',
            'side_effects'       => 'Therapeutic failure, progression of bacterial infections, stomach cramps from chalk fillers.',
            'storage_condition'  => 'Seized batch.',
            'authentic_features' => "Original Aristopharma Azithrocin features high quality blister foil with sharp red & silver typography.",
            'fake_indicators'    => "1. Faded ink stamping that rubs off easily with finger moisture.\n2. Tablet has powdery, chalky residue.\n3. Thin, fragile blister foil prone to punctures.\n4. No genuine security code.",
            'affected_batches'   => 'Batch: AZ-500-X, AZ-FAKE-99',
            'is_featured'        => true,
            'view_count'         => 380,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeAzithro->id,
            'image_path'       => 'uploads/medicines/seclo_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Chalk Filled Counterfeit Blister Pack',
            'highlight_points' => 'Red flag: Thin blister foil, rubbed-off expiry date, zero active ingredients.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 11. Counterfeit Sergel 20 (Altered Hologram Fake Batch)
        $fakeSergel = Medicine::create([
            'name'               => 'Sergel 20 (Altered Hologram Batch)',
            'generic_name'       => 'Counterfeit Esomeprazole Magnesium',
            'manufacturer'       => 'Counterfeit Ring (Falsely Labeled as Healthcare Pharma)',
            'dosage_form'        => 'Capsule',
            'strength'           => '20 mg (Spurious)',
            'dar_number'         => 'BANNED-HL-402',
            'price'              => 3.00,
            'therapeutic_class'  => 'Proton Pump Inhibitor (Counterfeit)',
            'status'             => 'unsafe',
            'safety_verdict'     => 'জাল হলোগ্রামযুক্ত নকল সার্জেল: হেলথকেয়ার ফার্মার লোগো বিকৃত করে তৈরি ভেজাল গ্যাস্ট্রিক ক্যাপসুল যা ড্রাগ পরীক্ষায় অকার্যকর প্রমাণিত।',
            'indications'        => 'DANGEROUS: Does not reduce stomach acid and causes gastric irritation.',
            'dosage_guidelines'  => 'DO NOT CONSUME. Report to nearest DGDA drug monitoring cell.',
            'side_effects'       => 'Severe acid rebound, nausea, stomach inflammation.',
            'storage_condition'  => 'Quarantined evidence.',
            'authentic_features' => "Original Sergel has multi-angle color shifting hologram and silver Alu-Alu blister packaging.",
            'fake_indicators'    => "1. Non-reflective flat printed silver sticker.\n2. Misaligned color printing on carton borders.\n3. Capsules have uneven fill levels with off-color powder.",
            'affected_batches'   => 'Batch: HL-402, HL-990',
            'is_featured'        => true,
            'view_count'         => 295,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeSergel->id,
            'image_path'       => 'uploads/medicines/seclo_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Altered Hologram Counterfeit Packaging',
            'highlight_points' => 'Red flag: Flat non-holographic seal, uneven capsule powder, misspelled company info.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);

        // 12. Fake Maxpro 20 (Unregistered Renata Copycat)
        $fakeMaxpro = Medicine::create([
            'name'               => 'Maxpro 20 (Unregistered Copycat)',
            'generic_name'       => 'Adulterated Esomeprazole USP',
            'manufacturer'       => 'Clandestine Laboratory (Falsely Labeled as Renata Ltd)',
            'dosage_form'        => 'Capsule',
            'strength'           => '20 mg (Fake)',
            'dar_number'         => 'BANNED-MX-771',
            'price'              => 2.50,
            'therapeutic_class'  => 'Proton Pump Inhibitor (Fake)',
            'status'             => 'unsafe',
            'safety_verdict'     => 'অননুমোদিত নকল ম্যাক্সপ্রো: রেনাটার মোড়ক হুবহু নকল করে নিম্নমানের উপাদান দিয়ে বাজারজাতকৃত ভেজাল ব্যাচ।',
            'indications'        => 'HAZARD: Unsanitary manufacturing conditions, high risk of bacterial contamination.',
            'dosage_guidelines'  => 'DO NOT TAKE. Hand over immediately to authorized pharmacy.',
            'side_effects'       => 'Bacterial infection, vomiting, diarrhea, acute gastric ulceration.',
            'storage_condition'  => 'Seized batch.',
            'authentic_features' => "Original Renata Maxpro 20 features tamper-evident holographic tear-strip and crisp typography.",
            'fake_indicators'    => "1. Missing micro-embossed QR verification code.\n2. Foil leaks air when pressed gently.\n3. Dark grey discolored powder inside capsules.",
            'affected_batches'   => 'Batch: MX-771, MX-FAKE-02',
            'is_featured'        => true,
            'view_count'         => 350,
        ]);

        MedicineImage::create([
            'medicine_id'      => $fakeMaxpro->id,
            'image_path'       => 'uploads/medicines/seclo_unsafe.svg',
            'type'             => 'unsafe',
            'title'            => 'Counterfeit Renata Maxpro Strip',
            'highlight_points' => 'Red flag: Missing micro-embossed QR code, air leaks in foil, discolored dark powder.',
            'is_primary'       => true,
            'sort_order'       => 1,
        ]);
    }
}
