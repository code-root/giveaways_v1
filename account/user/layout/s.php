<section class="bg-profile d-table w-100 bg-primary" style="background: url('<?=url_assets()?>images/account/bg.png') center center;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <?=$ads['ads_2']?>
                        <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 col-md-3 text-md-start text-center xxxTwo">
                                        <img src="<?=$img?>" class="img_oldTwo avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                                    </div><!--end col-->
    
                                    <div class="col-lg-10 col-md-9">
                                        <div class="row align-items-end">

                                            <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                                <h3 class="title mb-0"><?=$users['NameOne']?></h3>
                                                <small class="text-muted h6 me-2"><?=$users['email']?></small>
                                                <!-- <ul class="list-inline mb-0 mt-3">
                                                    <li class="list-inline-item me-2"><a href="<?=$info['instagram']?>" class="text-muted" title="Instagram"><i data-feather="instagram" class="fea icon-sm me-2"></i></a></li>
                                                    <li class="list-inline-item"><a href="<?=$info['facebook']?>" class="text-muted" title="facebook"><i data-feather="facebook" class="fea icon-sm me-2"></i></a></li>
                                                </ul> -->
                                            </div><!--end col-->
    
                                        </div><!--end row-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--ed container-->
        </section><!--end section-->
        <!-- Hero End -->
        <!-- Profile Start -->
        <section class="section mt-60">
            <div class="container mt-lg-3">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 d-lg-block d-none">
                        <div class="sidebar sticky-bar p-4 rounded shadow">
                            <div class="widget">
                                <!-- <h5 class="widget-title">نقاطي : </h5> -->
                                <div class="row mt-4">
                                    <div class="col-6 text-center">
                                        <!-- <i data-feather="user-plus" class="fea icon-ex-md text-primary mb-1"></i> -->
                                        <h5 class="mb-0"><?=PointCorrect($users['id'])?></h5>
                                        <p class="text-muted mb-0">إجابات صحيحة</p>
                                    </div><!--end col-->

                                    <div class="col-6 text-center">
                                        <!-- <i data-feather="users" class="fea icon-ex-md text-primary mb-1"></i> -->
                                        <h5 class="mb-0"><?=PointWrong($users['id'])?></h5>
                                        <p class="text-muted mb-0">إجابات خاطئة </p>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <?=$send_points?>

                            <div class="widget mt-4 pt-2">
                                <!-- <h5 class="widget-title"> نقاطي : </h5> -->
                                <div class="progress-box mt-4">
                                    <h6 class="title text-muted">عدد النقاط  : </h6>
                                    <div class="progress">
                                    <div class="progress-bar position-relative bg-primary" style="width:<?=$PointsUser?>%;">
                                            <div class="progress-value d-block text-muted h6">10000 / <?=PointsUser($users['id'])?></div>
                                        </div>
                                    </div>
                                </div><!--end process box-->
                            </div>
                            
                            <div class="widget mt-4">
                                        <div class="back"><?=$ads['ads_3']?></div>
                        <div class="back2"> <?=$ads['ads_3']?></div>
                            </div>
                        </div>
                    </div><!--end col-->
