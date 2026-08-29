<?php $__env->startSection('content'); ?>
<!-- Hero & Search Header Section -->
<section class="medicine-hero-section py-5 position-relative text-white" style="background: linear-gradient(135deg, #064e3b 0%, #0f766e 50%, #0369a1 100%); padding: 60px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge badge-light text-success px-3 py-2 rounded-pill font-weight-bold mb-3 shadow-sm" style="font-size: 13px; letter-spacing: 0.5px;">
                    <i class="fa fa-shield-alt text-success mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> বাংলাদেশ নিরাপদ ঔষধ যাচাই পোর্টাল <?php else: ?> BANGLADESH SAFE MEDICINE &amp; AUTHENTICITY HUB <?php endif; ?>
                </span>
                <h1 class="font-weight-bold text-white mb-3" style="font-size: 38px; line-height: 1.2;">
                    <?php if(session()->get('language')=='bangla'): ?>
                        আসল ও নকল ঔষধ চিনুন, নিরাপদ থাকুন
                    <?php else: ?>
                        Verify Medicine Authenticity &amp; Identify Fake Drugs
                    <?php endif; ?>
                </h1>
                <p class="text-white-50 font-16 mb-4 lead" style="color: #e2e8f0 !important;">
                    <?php if(session()->get('language')=='bangla'): ?>
                        ঔষধের জেনেরিক নাম, প্রস্তুতকারক কোম্পানি, DAR নম্বর ও আসল-নকল প্যাকেজিংয়ের চাক্ষুষ তুলনা দেখে সুরক্ষিত থাকুন।
                    <?php else: ?>
                        Search DGDA registered medicines, verify security holograms &amp; packaging, and stay alerted on counterfeit copies.
                    <?php endif; ?>
                </p>

                <!-- Big Search Box -->
                <form action="<?php echo e(route('medicines.index')); ?>" method="GET" class="medicine-search-form shadow-lg rounded-pill p-2 bg-white">
                    <div class="input-group">
                        <div class="input-group-prepend pl-3">
                            <span class="input-group-text bg-transparent border-0 text-muted">
                                <i class="fa fa-search fa-lg text-primary"></i>
                            </span>
                        </div>
                        <input type="text" name="search" class="form-control border-0 font-16" placeholder="<?php if(session()->get('language')=='bangla'): ?> ঔষধের নাম, জেনেরিক, কোম্পানি বা DAR নম্বর দিয়ে খুঁজুন... (e.g. Napa, Seclo, Beximco) <?php else: ?> Search brand name, generic, DAR no, company... (e.g. Napa Extra, Seclo, Square) <?php endif; ?>" value="<?php echo e(request('search')); ?>" style="box-shadow: none;">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 font-weight-bold" style="background: #10b981; border-color: #10b981;">
                                <?php if(session()->get('language')=='bangla'): ?> অনুসন্ধান <?php else: ?> Search <?php endif; ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Filter Tabs & Stats Section -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <!-- Filter Pills -->
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <a href="<?php echo e(route('medicines.index')); ?>" class="btn btn-sm rounded-pill font-weight-bold px-3 mr-2 mb-2 <?php echo e(!request('status') ? 'btn-dark text-white' : 'btn-outline-secondary'); ?>">
                        <i class="fa fa-th-large mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> সকল ঔষধ <?php else: ?> All Medicines <?php endif; ?>
                    </a>
                    <a href="<?php echo e(route('medicines.index', ['status' => 'safe'])); ?>" class="btn btn-sm rounded-pill font-weight-bold px-3 mr-2 mb-2 <?php echo e(request('status') == 'safe' ? 'btn-success text-white' : 'btn-outline-success'); ?>" style="border-color: #10b981;">
                        <i class="fa fa-check-circle mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> আসল ও নিরাপদ <?php else: ?> Authentic &amp; Safe <?php endif; ?>
                    </a>
                    <a href="<?php echo e(route('medicines.index', ['status' => 'unsafe'])); ?>" class="btn btn-sm rounded-pill font-weight-bold px-3 mr-2 mb-2 <?php echo e(request('status') == 'unsafe' ? 'btn-danger text-white' : 'btn-outline-danger'); ?>" style="border-color: #ef4444;">
                        <i class="fa fa-exclamation-triangle mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> নকল ঔষধ সতর্কতা <?php else: ?> Fake Drug Alerts <?php endif; ?>
                    </a>
                    <a href="<?php echo e(route('medicines.index', ['status' => 'warning'])); ?>" class="btn btn-sm rounded-pill font-weight-bold px-3 mb-2 <?php echo e(request('status') == 'warning' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-warning'); ?>" style="border-color: #f59e0b;">
                        <i class="fa fa-exclamation-circle mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> গুণমান সতর্কতা <?php else: ?> Recalls &amp; Caution <?php endif; ?>
                    </a>
                </div>
            </div>

            <!-- Quick Action: Report Suspicious Drug -->
            <div class="col-lg-4 text-lg-right">
                <a href="<?php echo e(route('unsafe.medicine.report')); ?>" class="btn btn-danger btn-sm rounded-pill px-3 font-weight-bold shadow-sm">
                    <i class="fa fa-bullhorn mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> নকল ঔষধের অভিযোগ দিন <?php else: ?> Report Fake Medicine <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Medicine Grid & Awareness Sidebar -->
<section class="py-5 bg-white">
    <div class="container">
        <!-- Search query feedback -->
        <?php if(request('search')): ?>
            <div class="alert alert-info d-flex justify-content-between align-items-center mb-4">
                <div>
                    <i class="fa fa-search mr-2"></i> Showing results for <strong>"<?php echo e(request('search')); ?>"</strong>
                </div>
                <a href="<?php echo e(route('medicines.index')); ?>" class="text-danger font-weight-bold text-decoration-none"><i class="fa fa-times"></i> Clear Search</a>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- Left: Medicine Cards Grid (8 cols) -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom">
                    <h4 class="font-weight-bold text-dark mb-0">
                        <?php if(request('status') == 'safe'): ?>
                            <span class="text-success"><i class="fa fa-check-circle mr-1"></i> Authentic &amp; Verified Medicines</span>
                        <?php elseif(request('status') == 'unsafe'): ?>
                            <span class="text-danger"><i class="fa fa-exclamation-triangle mr-1"></i> Counterfeit &amp; Fake Drug Warning List</span>
                        <?php elseif(request('status') == 'warning'): ?>
                            <span class="text-warning"><i class="fa fa-exclamation-circle mr-1"></i> Quality Recalls &amp; Batch Warnings</span>
                        <?php else: ?>
                            <i class="fa fa-capsules text-primary mr-1"></i> Medicine Directory
                        <?php endif; ?>
                    </h4>
                    <span class="text-muted font-13">Found <?php echo e($medicines->total()); ?> results</span>
                </div>

                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $medicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $badge = $medicine->status_badge;
                            $safeCount = $medicine->safeImages->count();
                            $unsafeCount = $medicine->unsafeImages->count();
                        ?>
                        <div class="col-md-6 mb-4">
                            <div class="card medicine-card h-100 shadow-sm border rounded-lg overflow-hidden transition-hover" style="border-top: 4px solid <?php echo e($badge['color']); ?> !important;">
                                <!-- Card Header Thumbnail & Status Badge -->
                                <div class="position-relative bg-light text-center p-3" style="min-height: 180px; display: flex; align-items: center; justify-content: center;">
                                    <img src="<?php echo e($medicine->cover_image_url); ?>" alt="<?php echo e($medicine->name); ?>" class="img-fluid medicine-thumb" style="max-height: 150px; object-fit: contain;">
                                    
                                    <!-- Status Badge Overlay -->
                                    <div class="position-absolute" style="top: 10px; left: 10px;">
                                        <span class="badge <?php echo e($badge['class']); ?> px-2 py-1 shadow-xs" style="font-size: 11px;">
                                            <i class="fa <?php echo e($badge['icon']); ?> mr-1"></i>
                                            <?php if(session()->get('language')=='bangla'): ?> <?php echo e($badge['label_bn']); ?> <?php else: ?> <?php echo e($badge['label']); ?> <?php endif; ?>
                                        </span>
                                    </div>

                                    <!-- Image Count Badges -->
                                    <div class="position-absolute" style="bottom: 10px; right: 10px;">
                                        <?php if($unsafeCount > 0): ?>
                                            <span class="badge badge-danger shadow-xs" title="Fake vs Real Comparison Available">
                                                <i class="fa fa-clone"></i> Visual Compare
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h5 class="font-weight-bold text-dark mb-0">
                                                <a href="<?php echo e(route('medicines.show', $medicine->id)); ?>" class="text-dark text-decoration-none hover-primary">
                                                    <?php echo e($medicine->name); ?>

                                                </a>
                                            </h5>
                                            <?php if($medicine->price): ?>
                                                <span class="badge badge-light border text-success font-weight-bold font-13">৳ <?php echo e(number_format($medicine->price, 2)); ?></span>
                                            <?php endif; ?>
                                        </div>

                                        <p class="text-primary font-weight-600 font-13 mb-1">
                                            <i class="fa fa-dna mr-1 text-info"></i> <?php echo e($medicine->generic_name); ?>

                                        </p>

                                        <div class="text-muted font-12 mb-2">
                                            <i class="fa fa-building mr-1 text-secondary"></i> <?php echo e($medicine->manufacturer); ?>

                                        </div>

                                        <div class="d-flex flex-wrap gap-1 mb-2">
                                            <span class="badge badge-light border text-muted font-11"><?php echo e($medicine->dosage_form); ?></span>
                                            <?php if($medicine->strength): ?>
                                                <span class="badge badge-light border text-dark font-11"><?php echo e($medicine->strength); ?></span>
                                            <?php endif; ?>
                                            <?php if($medicine->dar_number): ?>
                                                <span class="badge badge-light border text-info font-11">DAR: <?php echo e($medicine->dar_number); ?></span>
                                            <?php endif; ?>
                                        </div>

                                        <?php if($medicine->safety_verdict): ?>
                                            <p class="text-muted font-12 mb-3 text-truncate-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                <?php echo e($medicine->safety_verdict); ?>

                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Card Action Footer -->
                                    <div class="pt-2 border-top mt-2">
                                        <a href="<?php echo e(route('medicines.show', $medicine->id)); ?>" class="btn btn-outline-primary btn-sm btn-block font-weight-bold rounded-pill" style="color: #0284c7; border-color: #0284c7;">
                                            <i class="fa fa-search-plus mr-1"></i> <?php if(session()->get('language')=='bangla'): ?> বিস্তারিত ও আসল-নকল যাচাই <?php else: ?> Verify &amp; Inspect Images <?php endif; ?> &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 py-5 text-center">
                            <div class="p-5 bg-light rounded-lg">
                                <i class="fa fa-pills fa-3x text-muted mb-3 d-block"></i>
                                <h5 class="font-weight-bold text-dark">No medicines found matching your search.</h5>
                                <p class="text-muted font-14">Try searching with a different brand name, generic name, or clear the filters.</p>
                                <a href="<?php echo e(route('medicines.index')); ?>" class="btn btn-primary btn-sm rounded-pill px-4 font-weight-bold">View All Medicines</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    <?php echo e($medicines->links()); ?>

                </div>
            </div>

            <!-- Right: Awareness Tips & Checklist Sidebar (4 cols) -->
            <div class="col-lg-4">
                <!-- Checklist Widget -->
                <div class="card border-0 shadow-sm rounded-lg mb-4 text-white" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="p-2 rounded bg-success text-white mr-3">
                                <i class="fa fa-shield-alt fa-lg"></i>
                            </div>
                            <h5 class="font-weight-bold text-white mb-0">
                                <?php if(session()->get('language')=='bangla'): ?> ঔষধ কেনার আগে ৫টি সতর্কতা <?php else: ?> 5 Checkpoints Before Buying <?php endif; ?>
                            </h5>
                        </div>
                        <ul class="list-unstyled mb-0 font-13 text-light" style="line-height: 1.8;">
                            <li class="mb-2"><i class="fa fa-check-circle text-success mr-2"></i> <strong>1. Hologram Seal:</strong> Check for a reflective 3D hologram sticker with color shifts.</li>
                            <li class="mb-2"><i class="fa fa-check-circle text-success mr-2"></i> <strong>2. Embossed Dates:</strong> Ensure Mfg/Exp dates are mechanically embossed on blister foil, not ink stamped.</li>
                            <li class="mb-2"><i class="fa fa-check-circle text-success mr-2"></i> <strong>3. DGDA DAR Number:</strong> Look for the official Drug Administration Registration code.</li>
                            <li class="mb-2"><i class="fa fa-check-circle text-success mr-2"></i> <strong>4. Spelling &amp; Logos:</strong> Watch out for typos in manufacturer names (e.g. "Bexmco", "Squar").</li>
                            <li class="mb-0"><i class="fa fa-check-circle text-success mr-2"></i> <strong>5. Texture &amp; Foil:</strong> Reject chalky, crumbly tablets or loose thin foil seals.</li>
                        </ul>
                    </div>
                </div>

                <!-- Common Dosage Forms Chips -->
                <?php if($dosageForms->count() > 0): ?>
                    <div class="card border shadow-sm rounded-lg mb-4">
                        <div class="card-header bg-light py-3">
                            <h6 class="font-weight-bold text-dark mb-0"><i class="fa fa-filter text-info mr-2"></i> Filter by Dosage Form</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex flex-wrap gap-2">
                                <?php $__currentLoopData = $dosageForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('medicines.index', array_merge(request()->query(), ['dosage_form' => $form]))); ?>" class="badge badge-light border p-2 text-dark text-decoration-none <?php echo e(request('dosage_form') == $form ? 'bg-primary text-white' : ''); ?>">
                                        <?php echo e($form); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Report Fake Drug Card -->
                <div class="card border-danger shadow-sm rounded-lg mb-4 text-center p-4 bg-light">
                    <div class="mb-3">
                        <i class="fa fa-exclamation-triangle fa-3x text-danger"></i>
                    </div>
                    <h5 class="font-weight-bold text-danger mb-2">Found Suspicious Medicine?</h5>
                    <p class="text-muted font-13 mb-3">
                        Help protect others. Report suspect counterfeit medicine, unapproved batches, or altered packaging directly to our verification team.
                    </p>
                    <a href="<?php echo e(route('unsafe.medicine.report')); ?>" class="btn btn-danger btn-block font-weight-bold rounded-pill shadow-sm">
                        <i class="fa fa-paper-plane mr-1"></i> Submit Unsafe Medicine Report
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.font-11 { font-size: 11px; }
.font-12 { font-size: 12px; }
.font-13 { font-size: 13px; }
.font-16 { font-size: 16px; }
.gap-1 { gap: 4px; }
.gap-2 { gap: 8px; }
.medicine-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.medicine-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
.hover-primary:hover {
    color: #0284c7 !important;
}
.shadow-xs {
    box-shadow: 0 1px 3px rgba(0,0,0,0.08);
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/medicines/index.blade.php ENDPATH**/ ?>