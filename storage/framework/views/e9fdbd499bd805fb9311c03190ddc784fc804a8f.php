<?php $__env->startPush('frontend_style'); ?>
<style>
    :root {
        --green:      #008E48;
        --green-dark: #006633;
        --green-pale: #e8f7ee;
        --radius:     10px;
    }

    /* ── Banner ── */
    .umr-banner {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
        padding: 60px 0 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .umr-banner::before {
        content: '';
        position: absolute; inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .umr-banner h1  { color: #fff; font-size: 1.8rem; font-weight: 700; margin-bottom: 8px; position: relative; }
    .umr-banner p   { color: rgba(255,255,255,.82); font-size: 1rem; margin: 0; position: relative; }
    .umr-breadcrumb { list-style: none; padding: 0; margin: 14px 0 0; display: flex; justify-content: center; gap: 6px; flex-wrap: wrap; position: relative; }
    .umr-breadcrumb li { color: rgba(255,255,255,.7); font-size: .9rem; }
    .umr-breadcrumb li a { color: rgba(255,255,255,.9); text-decoration: none; }
    .umr-breadcrumb li + li::before { content: '/'; margin-right: 6px; }

    /* ── Layout ── */
    .umr-wrapper { padding: 50px 0 80px; background: #f7faf8; }

    /* ── Back bar ── */
    .umr-back-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 28px;
    }
    .umr-back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #fff;
        color: var(--green-dark);
        border: 1px solid #c2e7d3;
        padding: 8px 18px;
        border-radius: 6px;
        font-size: 0.88rem;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.2s;
        box-shadow: 0 2px 6px rgba(0,142,72,0.06);
    }
    .umr-back-btn:hover {
        background: var(--green);
        color: #fff !important;
        border-color: var(--green);
    }

    /* ── Tracking header chip ── */
    .tracking-header {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--green-pale);
        border: 1px solid #c2e7d3;
        border-radius: 8px;
        padding: 8px 18px;
    }
    .tracking-header .label { font-size: 0.78rem; color: var(--green-dark); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
    .tracking-header .code  { font-family: monospace; font-size: 1.05rem; font-weight: 800; color: var(--green-dark); letter-spacing: 0.06em; }

    /* ── Section cards ── */
    .umr-card {
        background: #fff;
        border-radius: var(--radius);
        box-shadow: 0 4px 20px rgba(0,142,72,.06);
        margin-bottom: 22px;
        overflow: hidden;
    }
    .umr-card-header {
        padding: 13px 22px;
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        display: flex;
        align-items: center;
        gap: 8px;
        border-bottom: 1px solid #f0f0f0;
    }
    .umr-card-body { padding: 20px 22px; }

    /* header colour variants */
    .umr-card-header.green  { background: #e8f7ee; color: var(--green-dark); }
    .umr-card-header.orange { background: #fff3e0; color: #b45309; }
    .umr-card-header.pink   { background: #fce4ec; color: #880e4f; }
    .umr-card-header.gray   { background: #f3f4f6; color: #374151; }
    .umr-card-header.blue   { background: #e0f2fe; color: #0c5a8a; }

    /* ── Info rows ── */
    .info-table { width: 100%; border-collapse: collapse; }
    .info-table tr td { padding: 7px 0; vertical-align: top; font-size: 0.9rem; }
    .info-table tr td:first-child {
        width: 38%;
        color: #888;
        font-weight: 600;
        font-size: 0.82rem;
        padding-right: 12px;
    }
    .info-table tr + tr td { border-top: 1px solid #f2f2f2; }

    /* ── Status badge ── */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 14px;
        border-radius: 30px;
        font-size: 0.82rem;
        font-weight: 700;
    }
    .status-badge.pending       { background: #fff3cd; color: #856404; }
    .status-badge.investigating { background: #cff4fc; color: #0c5460; }
    .status-badge.resolved      { background: #d1e7dd; color: #0f5132; }
    .status-badge.rejected      { background: #f8d7da; color: #721c24; }

    .blacklist-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: #f8d7da; color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 4px 12px; border-radius: 20px;
        font-size: 0.78rem; font-weight: 700;
    }
    .safe-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: #d1e7dd; color: #0f5132;
        padding: 4px 12px; border-radius: 20px;
        font-size: 0.78rem; font-weight: 700;
    }

    /* ── Image gallery ── */
    .evidence-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }
    .evidence-grid a {
        display: block;
        width: 130px;
        height: 130px;
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid #d4ede3;
        flex-shrink: 0;
        transition: transform 0.18s, box-shadow 0.18s, border-color 0.18s;
    }
    .evidence-grid a:hover {
        transform: scale(1.04);
        box-shadow: 0 6px 20px rgba(0,0,0,.12);
        border-color: var(--green);
    }
    .evidence-grid a img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ── Responsive video embed ── */
    .video-responsive {
        position: relative;
        padding-top: 56.25%;
        border-radius: 8px;
        overflow: hidden;
    }
    .video-responsive iframe {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border: none;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <?php if(session()->get('language') == 'bangla'): ?> রিপোর্ট বিস্তারিত <?php else: ?> Report Detail <?php endif; ?> — <?php echo e($report->tracking_number); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="umr-banner">
    <div class="container">
        <h1>
            <?php if(session()->get('language') == 'bangla'): ?>
                রিপোর্টের বিস্তারিত তথ্য
            <?php else: ?>
                Report Detail
            <?php endif; ?>
        </h1>
        <p>
            <?php if(session()->get('language') == 'bangla'): ?>
                এই পাতায় নির্বাচিত অভিযোগ রিপোর্টের সম্পূর্ণ তথ্য দেখানো হচ্ছে।
            <?php else: ?>
                Full details of the selected unsafe medicine report.
            <?php endif; ?>
        </p>
        <ul class="umr-breadcrumb">
            <li><a href="<?php echo e(route('front.page')); ?>">
                <?php if(session()->get('language') == 'bangla'): ?> হোম <?php else: ?> Home <?php endif; ?>
            </a></li>
            <li><a href="<?php echo e(route('unsafe.medicine.reports.index')); ?>">
                <?php if(session()->get('language') == 'bangla'): ?> রিপোর্ট তালিকা <?php else: ?> Reports List <?php endif; ?>
            </a></li>
            <li><?php echo e($report->tracking_number); ?></li>
        </ul>
    </div>
</div>


<div class="umr-wrapper">
    <div class="container">

        
        <div class="umr-back-bar">
            <a href="<?php echo e(route('unsafe.medicine.reports.index')); ?>" class="umr-back-btn">
                <i class="fa fa-arrow-left"></i>
                <?php if(session()->get('language') == 'bangla'): ?> তালিকায় ফিরুন <?php else: ?> Back to List <?php endif; ?>
            </a>
            <div class="tracking-header">
                <span class="label">
                    <?php if(session()->get('language') == 'bangla'): ?> ট্র্যাকিং নম্বর <?php else: ?> Tracking No. <?php endif; ?>
                </span>
                <span class="code"><?php echo e($report->tracking_number); ?></span>
            </div>
        </div>

        
        <div class="row" style="align-items: flex-start;">

            
            <div class="col-lg-8" style="margin-bottom: 24px;">

                
                <div class="row">
                    
                    <div class="col-md-6" style="margin-bottom: 22px;">
                        <div class="umr-card" style="margin-bottom: 0; height: 100%;">
                            <div class="umr-card-header green">
                                <i class="fa fa-user"></i>
                                <?php if(session()->get('language') == 'bangla'): ?> প্রতিবেদকের তথ্য <?php else: ?> Reporter Info <?php endif; ?>
                            </div>
                            <div class="umr-card-body">
                                <table class="info-table">
                                    <tr>
                                        <td><?php if(session()->get('language') == 'bangla'): ?> নাম <?php else: ?> Name <?php endif; ?></td>
                                        <td>
                                            <?php if($report->reporter_name): ?>
                                                <strong><?php echo e($report->reporter_name); ?></strong>
                                            <?php else: ?>
                                                <em class="text-muted"><?php if(session()->get('language') == 'bangla'): ?> বেনামী <?php else: ?> Anonymous <?php endif; ?></em>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php if(session()->get('language') == 'bangla'): ?> ফোন <?php else: ?> Phone <?php endif; ?></td>
                                        <td><?php echo e($report->reporter_phone ?? '—'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php if(session()->get('language') == 'bangla'): ?> জমার তারিখ <?php else: ?> Submitted <?php endif; ?></td>
                                        <td><?php echo e($report->created_at->format('d M Y, h:i A')); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-6" style="margin-bottom: 22px;">
                        <div class="umr-card" style="margin-bottom: 0; height: 100%;">
                            <div class="umr-card-header orange">
                                <i class="fa fa-medkit"></i>
                                <?php if(session()->get('language') == 'bangla'): ?> ওষুধের তথ্য <?php else: ?> Medicine Info <?php endif; ?>
                            </div>
                            <div class="umr-card-body">
                                <table class="info-table">
                                    <tr>
                                        <td><?php if(session()->get('language') == 'bangla'): ?> ওষুধের নাম <?php else: ?> Name <?php endif; ?></td>
                                        <td><strong><?php echo e($report->medicine_name); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><?php if(session()->get('language') == 'bangla'): ?> ব্যাচ নম্বর <?php else: ?> Batch No. <?php endif; ?></td>
                                        <td><?php echo e($report->batch_number ?? '—'); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="umr-card">
                    <div class="umr-card-header pink">
                        <i class="fa fa-hospital-o"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> ফার্মেসির তথ্য <?php else: ?> Pharmacy Info <?php endif; ?>
                    </div>
                    <div class="umr-card-body">
                        <table class="info-table">
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ফার্মেসির নাম <?php else: ?> Pharmacy Name <?php endif; ?></td>
                                <td><strong><?php echo e($report->pharmacy_name); ?></strong></td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> জেলা <?php else: ?> District <?php endif; ?></td>
                                <td><?php echo e($report->district); ?></td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ঠিকানা <?php else: ?> Address <?php endif; ?></td>
                                <td><?php echo e($report->pharmacy_address); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                
                <div class="umr-card">
                    <div class="umr-card-header gray">
                        <i class="fa fa-file-text-o"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> অভিযোগের বিবরণ <?php else: ?> Issue Description <?php endif; ?>
                    </div>
                    <div class="umr-card-body">
                        <p style="white-space: pre-wrap; line-height: 1.9; font-size: 0.92rem; color: #444; margin: 0;"><?php echo e($report->description); ?></p>
                    </div>
                </div>

                
                <?php if(!empty($report->images) && count($report->images) > 0): ?>
                <div class="umr-card">
                    <div class="umr-card-header gray">
                        <i class="fa fa-camera"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> প্রমাণের ছবি <?php else: ?> Evidence Images <?php endif; ?>
                        <span style="background: rgba(0,0,0,0.12); color: inherit; padding: 2px 8px; border-radius: 12px; font-size: 0.72rem; margin-left: 4px;">
                            <?php echo e(count($report->images)); ?>

                        </span>
                    </div>
                    <div class="umr-card-body">
                        <div class="evidence-grid">
                            <?php $__currentLoopData = $report->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(asset($img)); ?>" target="_blank" title="Open full size">
                                    <img src="<?php echo e(asset($img)); ?>" alt="Evidence"
                                         onerror="this.src='https://placehold.co/130x130?text=Image'">
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <p style="margin: 14px 0 0; font-size: 0.8rem; color: #888;">
                            <i class="fa fa-info-circle" style="margin-right: 4px;"></i>
                            <?php if(session()->get('language') == 'bangla'): ?> পূর্ণ আকারে দেখতে ছবিতে ক্লিক করুন <?php else: ?> Click any image to open full-size in a new tab <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>

                
                <?php if($report->video): ?>
                    <?php
                        $videoId = null;
                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $report->video, $ytm)) {
                            $videoId = $ytm[1];
                        }
                    ?>
                    <?php if($videoId): ?>
                    <div class="umr-card">
                        <div class="umr-card-header gray">
                            <i class="fa fa-youtube-play" style="color: #cc0000;"></i>
                            <?php if(session()->get('language') == 'bangla'): ?> ভিডিও প্রমাণ <?php else: ?> Video Evidence <?php endif; ?>
                        </div>
                        <div class="umr-card-body" style="padding: 0;">
                            <div class="video-responsive">
                                <iframe src="https://www.youtube.com/embed/<?php echo e($videoId); ?>"
                                        allowfullscreen loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="umr-card">
                        <div class="umr-card-header gray">
                            <i class="fa fa-link"></i>
                            <?php if(session()->get('language') == 'bangla'): ?> ভিডিও লিঙ্ক <?php else: ?> Video Link <?php endif; ?>
                        </div>
                        <div class="umr-card-body">
                            <a href="<?php echo e($report->video); ?>" target="_blank"
                               style="color: var(--green); font-weight: 600; word-break: break-all;">
                                <i class="fa fa-external-link" style="margin-right: 5px;"></i><?php echo e($report->video); ?>

                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>

            </div>

            
            <div class="col-lg-4">

                
                <div class="umr-card">
                    <div class="umr-card-header blue">
                        <i class="fa fa-info-circle"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> রিপোর্টের অবস্থা <?php else: ?> Report Status <?php endif; ?>
                    </div>
                    <div class="umr-card-body">
                        <table class="info-table">
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> বর্তমান অবস্থা <?php else: ?> Current Status <?php endif; ?></td>
                                <td>
                                    <span class="status-badge <?php echo e($report->status); ?>">
                                        <?php
                                            $statusLabels = [
                                                'pending'       => ['en' => 'Pending',       'bn' => 'পেন্ডিং'],
                                                'investigating' => ['en' => 'Investigating',  'bn' => 'তদন্তাধীন'],
                                                'resolved'      => ['en' => 'Resolved',       'bn' => 'সমাধানকৃত'],
                                                'rejected'      => ['en' => 'Rejected',       'bn' => 'প্রত্যাখ্যাত'],
                                            ];
                                            $statusIcons = [
                                                'pending'       => 'fa-clock-o',
                                                'investigating' => 'fa-search',
                                                'resolved'      => 'fa-check-circle',
                                                'rejected'      => 'fa-times-circle',
                                            ];
                                            $lang = session()->get('language') == 'bangla' ? 'bn' : 'en';
                                        ?>
                                        <i class="fa <?php echo e($statusIcons[$report->status] ?? 'fa-circle'); ?>"></i>
                                        <?php echo e($statusLabels[$report->status][$lang] ?? ucfirst($report->status)); ?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> কালো তালিকাভুক্ত <?php else: ?> Blacklisted <?php endif; ?></td>
                                <td>
                                    <?php if($report->is_blacklisted): ?>
                                        <span class="blacklist-badge"><i class="fa fa-ban"></i>
                                            <?php if(session()->get('language') == 'bangla'): ?> হ্যাঁ <?php else: ?> Yes <?php endif; ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="safe-badge"><i class="fa fa-check"></i>
                                            <?php if(session()->get('language') == 'bangla'): ?> না <?php else: ?> No <?php endif; ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> জমার তারিখ <?php else: ?> Submitted <?php endif; ?></td>
                                <td style="font-size: 0.86rem; color: #555;"><?php echo e($report->created_at->format('d M Y')); ?><br>
                                    <span style="color: #999; font-size: 0.78rem;"><?php echo e($report->created_at->format('h:i A')); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> সর্বশেষ আপডেট <?php else: ?> Last Updated <?php endif; ?></td>
                                <td style="font-size: 0.86rem; color: #555;"><?php echo e($report->updated_at->format('d M Y')); ?><br>
                                    <span style="color: #999; font-size: 0.78rem;"><?php echo e($report->updated_at->format('h:i A')); ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                
                <div class="umr-card">
                    <div class="umr-card-header green">
                        <i class="fa fa-list-alt"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> সংক্ষিপ্ত তথ্য <?php else: ?> Quick Summary <?php endif; ?>
                    </div>
                    <div class="umr-card-body">
                        <table class="info-table">
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ট্র্যাকিং কোড <?php else: ?> Tracking <?php endif; ?></td>
                                <td>
                                    <span style="font-family: monospace; background: var(--green-pale); color: var(--green-dark);
                                                 padding: 3px 8px; border-radius: 5px; font-size: 0.82rem; font-weight: 700; letter-spacing: 0.04em;
                                                 border: 1px solid #c2e7d3;">
                                        <?php echo e($report->tracking_number); ?>

                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ওষুধ <?php else: ?> Medicine <?php endif; ?></td>
                                <td style="font-weight: 600; font-size: 0.88rem;"><?php echo e($report->medicine_name); ?></td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ফার্মেসি <?php else: ?> Pharmacy <?php endif; ?></td>
                                <td style="font-size: 0.88rem;"><?php echo e($report->pharmacy_name); ?></td>
                            </tr>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> জেলা <?php else: ?> District <?php endif; ?></td>
                                <td style="font-size: 0.88rem;"><?php echo e($report->district); ?></td>
                            </tr>
                            <?php if(!empty($report->images)): ?>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ছবি <?php else: ?> Photos <?php endif; ?></td>
                                <td style="font-size: 0.88rem;"><?php echo e(count($report->images)); ?>

                                    <?php if(session()->get('language') == 'bangla'): ?> টি ছবি <?php else: ?> attached <?php endif; ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php if($report->video): ?>
                            <tr>
                                <td><?php if(session()->get('language') == 'bangla'): ?> ভিডিও <?php else: ?> Video <?php endif; ?></td>
                                <td>
                                    <span style="background: #ffecec; color: #cc0000; padding: 2px 8px; border-radius: 5px; font-size: 0.75rem; font-weight: 700;">
                                        <i class="fa fa-youtube-play" style="margin-right: 3px;"></i> YouTube
                                    </span>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>

                
                <div style="background: var(--green-pale); border: 1px solid #b2dfcc; border-radius: var(--radius);
                            padding: 20px; text-align: center; margin-top: 4px;">
                    <i class="fa fa-plus-circle" style="font-size: 1.6rem; color: var(--green); display: block; margin-bottom: 8px;"></i>
                    <p style="font-size: 0.88rem; color: var(--green-dark); font-weight: 600; margin: 0 0 12px;">
                        <?php if(session()->get('language') == 'bangla'): ?>
                            আরেকটি অভিযোগ জমা দিতে চান?
                        <?php else: ?>
                            Want to report another unsafe medicine?
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo e(route('unsafe.medicine.report')); ?>"
                       style="display: inline-block; background: var(--green); color: #fff; padding: 8px 22px;
                              border-radius: 6px; font-size: 0.88rem; font-weight: 600; text-decoration: none;
                              transition: background 0.2s;"
                       onmouseover="this.style.background='#006633'" onmouseout="this.style.background='#008E48'">
                        <i class="fa fa-flag" style="margin-right: 5px;"></i>
                        <?php if(session()->get('language') == 'bangla'): ?> নতুন রিপোর্ট করুন <?php else: ?> Submit a Report <?php endif; ?>
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safe_medicine_toall\resources\views/frontend/unsafe_medicine_report/view.blade.php ENDPATH**/ ?>