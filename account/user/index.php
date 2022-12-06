<?php
include '../../layout/header.php' ; 
include 'layout/isLoginUser.php';
include '../../layout/navbar.php'; 
include 'layout/section.php'; 
?>

                    <div class="col-lg-8 col-12">
<img class="back2"  >   <?=$ads['ads_3']?> </div> 
                        <div class="border-bottom pb-4">
                            <h5><?=$users['NameTwo']?></h5>
                            <p class="text-muted mb-0"><?php if (isset($info['txt'])) { echo $info['txt']; } else { echo ' '; } ?></p>
                        </div>
                        
                        <div class="border-bottom pb-4">
                            <div class="row">
                                <div class="col-md-6 mt-4">
                                    <h5>تفاصيل شخصية :</h5>
                                    <div class="mt-4">
                                        <div class="d-flex align-items-center">
                                            <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-primary mb-0">البريد الإكتروني</h6>
                                                <a href="javascript:void(0)" class="text-muted"><?=$users['email']?></a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <i data-feather="globe" class="fea icon-ex-md text-muted me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-primary mb-0">الموقع الإكتروني</h6>
                                                <a href="javascript:void(0)" class="text-muted"><?php if (isset($info['website'])) { echo $info['website']; } else { echo ' '; } ?></a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <i data-feather="gift" class="fea icon-ex-md text-muted me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-primary mb-0">تاريخ الميلاد</h6>
                                                <p class="text-muted mb-0"><?=$users['gender']?></p>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mt-3">
                                            <i data-feather="phone" class="fea icon-ex-md text-muted me-3"></i>
                                            <div class="flex-1">
                                                <h6 class="text-primary mb-0">رقم الهاتف</h6>
                                                <a href="javascript:void(0)" class="text-muted"><?=$users['number']?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                            </div><!--end row-->
                        </div>

                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Profile End -->
            <?php include '../../layout/footer.php'; ?>
