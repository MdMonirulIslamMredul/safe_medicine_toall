<?php $__env->startSection('title'); ?> | Medicine Reports <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>


<div class="row mt-3 mb-1 g-3">

    
    <div class="col-6 col-sm-4 col-lg">
        <a href="<?php echo e(route('admin.medicine.reports')); ?>" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100"
                 style="<?php echo e(!request('status') ? 'border-left:4px solid #343a40;' : ''); ?>">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:#343a40;
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa fa-list" style="color:#fff;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:1.6rem;font-weight:800;line-height:1;color:#343a40;"><?php echo e($counts['all']); ?></div>
                        <div style="font-size:.72rem;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">All Reports</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-6 col-sm-4 col-lg">
        <a href="<?php echo e(route('admin.medicine.reports', ['status'=>'pending'])); ?>" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100"
                 style="<?php echo e(request('status')=='pending' ? 'border-left:4px solid #f59f00;' : ''); ?>">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:#fff3cd;
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa fa-clock-o" style="color:#f59f00;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:1.6rem;font-weight:800;line-height:1;color:#f59f00;"><?php echo e($counts['pending']); ?></div>
                        <div style="font-size:.72rem;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">Pending</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-6 col-sm-4 col-lg">
        <a href="<?php echo e(route('admin.medicine.reports', ['status'=>'investigating'])); ?>" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100"
                 style="<?php echo e(request('status')=='investigating' ? 'border-left:4px solid #0dcaf0;' : ''); ?>">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:#cff4fc;
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa fa-search" style="color:#0a9ab5;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:1.6rem;font-weight:800;line-height:1;color:#0a9ab5;"><?php echo e($counts['investigating']); ?></div>
                        <div style="font-size:.72rem;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">Investigating</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-6 col-sm-4 col-lg">
        <a href="<?php echo e(route('admin.medicine.reports', ['status'=>'resolved'])); ?>" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100"
                 style="<?php echo e(request('status')=='resolved' ? 'border-left:4px solid #198754;' : ''); ?>">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:#d1e7dd;
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa fa-check-circle" style="color:#198754;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:1.6rem;font-weight:800;line-height:1;color:#198754;"><?php echo e($counts['resolved']); ?></div>
                        <div style="font-size:.72rem;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">Resolved</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    
    <div class="col-6 col-sm-4 col-lg">
        <a href="<?php echo e(route('admin.medicine.reports', ['status'=>'rejected'])); ?>" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100"
                 style="<?php echo e(request('status')=='rejected' ? 'border-left:4px solid #dc3545;' : ''); ?>">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div style="width:46px;height:46px;border-radius:12px;background:#f8d7da;
                                display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa fa-times-circle" style="color:#dc3545;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div style="font-size:1.6rem;font-weight:800;line-height:1;color:#dc3545;"><?php echo e($counts['rejected']); ?></div>
                        <div style="font-size:.72rem;color:#888;font-weight:600;text-transform:uppercase;letter-spacing:.04em;">Rejected</div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


<div class="d-flex align-items-center justify-content-between mt-3 mb-2 flex-wrap" style="gap:8px;">
    <div>
        <h5 class="mb-0 fw-bold">
            <i class="fa fa-medkit text-danger me-2"></i>
            <?php echo e(request('status') ? ucfirst(request('status')).' Reports' : 'All Reports'); ?>

        </h5>
        <small class="text-muted">
            Showing <?php echo e($reports->firstItem()); ?>–<?php echo e($reports->lastItem()); ?> of <?php echo e($reports->total()); ?> reports
        </small>
    </div>
    <?php if(request('status')): ?>
        <a href="<?php echo e(route('admin.medicine.reports')); ?>" class="btn btn-sm btn-outline-secondary">
            <i class="fa fa-times me-1"></i> Clear Filter
        </a>
    <?php endif; ?>
</div>


<?php if(session('message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle me-2"></i> <?php echo e(session('message')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>


<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="min-width:820px;">
                <thead style="background:#1a1a2e; color:#fff;">
                    <tr>
                        <th style="padding:12px 16px; width:42px;">#</th>
                        <th style="padding:12px 16px;">Tracking No.</th>
                        <th style="padding:12px 16px;">Medicine / Batch</th>
                        <th style="padding:12px 16px;">Pharmacy</th>
                        <th style="padding:12px 16px;">District</th>
                        <th style="padding:12px 16px;">Reporter</th>
                        <th style="padding:12px 16px; text-align:center;">Status</th>
                        <th style="padding:12px 16px; text-align:center;">Blacklisted</th>
                        <th style="padding:12px 16px;">Submitted</th>
                        <th style="padding:12px 16px; text-align:center; width:80px;">View</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <?php
                        $badgeMap = [
                            'pending'       => ['bg'=>'#fff3cd', 'color'=>'#856404'],
                            'investigating' => ['bg'=>'#cff4fc', 'color'=>'#0a9ab5'],
                            'resolved'      => ['bg'=>'#d1e7dd', 'color'=>'#0f5132'],
                            'rejected'      => ['bg'=>'#f8d7da', 'color'=>'#842029'],
                        ];
                        $b = $badgeMap[$report->status] ?? ['bg'=>'#eee','color'=>'#555'];
                    ?>

                    <tr>
                        <td style="padding:12px 16px; color:#999; font-size:.85rem;">
                            <?php echo e($reports->firstItem() + $i); ?>

                        </td>

                        <td style="padding:12px 16px;">
                            <code style="background:#1a1a2e; color:#7effc0; padding:3px 8px;
                                         border-radius:5px; font-size:.78rem; letter-spacing:.05em;">
                                <?php echo e($report->tracking_number); ?>

                            </code>
                        </td>

                        <td style="padding:12px 16px;">
                            <span style="font-weight:600;"><?php echo e($report->medicine_name); ?></span>
                            <?php if($report->batch_number): ?>
                                <br><small class="text-muted">Batch: <?php echo e($report->batch_number); ?></small>
                            <?php endif; ?>
                        </td>

                        <td style="padding:12px 16px;"><?php echo e($report->pharmacy_name); ?></td>
                        <td style="padding:12px 16px;"><?php echo e($report->district); ?></td>

                        <td style="padding:12px 16px;">
                            <?php if($report->reporter_name): ?>
                                <span style="font-weight:500;"><?php echo e($report->reporter_name); ?></span>
                                <?php if($report->reporter_phone): ?>
                                    <br><small class="text-muted"><?php echo e($report->reporter_phone); ?></small>
                                <?php endif; ?>
                            <?php else: ?>
                                <em class="text-muted" style="font-size:.85rem;">Anonymous</em>
                            <?php endif; ?>
                        </td>

                        <td style="padding:12px 16px; text-align:center;">
                            <span style="display:inline-block; padding:4px 12px; border-radius:20px;
                                         font-size:.78rem; font-weight:700;
                                         background:<?php echo e($b['bg']); ?>; color:<?php echo e($b['color']); ?>;">
                                <?php echo e(ucfirst($report->status)); ?>

                            </span>
                        </td>

                        <td style="padding:12px 16px; text-align:center;">
                            <?php if($report->is_blacklisted): ?>
                                <span style="display:inline-flex; align-items:center; gap:4px;
                                             background:#f8d7da; color:#842029; padding:3px 10px;
                                             border-radius:20px; font-size:.78rem; font-weight:700;">
                                    <i class="fa fa-ban"></i> Yes
                                </span>
                            <?php else: ?>
                                <span style="color:#bbb; font-size:.82rem;">—</span>
                            <?php endif; ?>
                        </td>

                        <td style="padding:12px 16px;">
                            <span style="font-size:.85rem;"><?php echo e($report->created_at->format('d M Y')); ?></span>
                            <br><small class="text-muted"><?php echo e($report->created_at->format('h:i A')); ?></small>
                        </td>

                        
                        <td style="padding:12px 16px; text-align:center;">
                            <a href="<?php echo e(route('admin.medicine.reports.view', $report->id)); ?>"
                               class="btn btn-sm"
                               style="background:#1a1a2e; color:#fff; border:none;
                                      padding:5px 13px; border-radius:6px;"
                               title="View full report">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="10" class="text-center py-5 text-muted">
                            <i class="fa fa-inbox fa-2x mb-2 d-block"></i>
                            <strong>No reports found.</strong>
                            <?php if(request('status')): ?>
                                <br>
                                <a href="<?php echo e(route('admin.medicine.reports')); ?>"
                                   class="btn btn-sm btn-outline-secondary mt-2">
                                    <i class="fa fa-times me-1"></i> Clear filter
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if($reports->hasPages()): ?>
            <div class="d-flex justify-content-center py-3">
                <?php echo e($reports->appends(request()->query())->links()); ?>

            </div>
        <?php endif; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views\admin\unsafe_medicine_report\index.blade.php ENDPATH**/ ?>