
<body>

<style>
   
   * {
        direction: rtl;
    }

      #topnav {
      position: sticky; }
   </style>

<div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
      <!-- Navbar STart -->
      <header id="topnav" class="defaultscroll sticky">
         <div class="container">
            <!-- Logo container-->
            <a class="logo" href="<?=URL?>">
            <img src="<?=url_assets()?>pngegg.png" height="50" class="logo-light-mode" alt="">
            <span><?=NameSite?></span>
            </a>
            <!-- Logo End -->
            <!-- End Logo container-->
            <div class="menu-extras">
               <div class="menu-item">
                  <!-- Mobile menu toggle-->
                  <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                     <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                     </div>
                  </a>
                  <!-- End mobile menu toggle-->
               </div>
            </div>
            <!--Login button Start-->
            <?php if ( isLoginUser() !== true) { ?> 
            <ul class="buy-button list-inline mb-0">
               <li class="list-inline-item ps-1 mb-0">
                  <a href="<?=url_acc()?>login.php" target="_blank">
                     <div class="btn btn-icon btn-pills btn-primary"> <i class="fas fa-sign-in-alt"></i></div>
                  </a>
               </li>
            </ul>
            <?php } ?>

            <!--Login button End-->
            <div id="navigation">
               <!-- Navigation Menu-->   
               <ul class="navigation-menu">
                  <li><a href="<?=URL?>" class="sub-menu-item">الصفحه الرئيسية</a></li>
                  <?php if ( isLoginUser() === true) { ?> 
               <li class="has-submenu parent-menu-item">
                     <a href="javascript:void(0)"> حسابي</a><span class="menu-arrow"></span>
                     <ul class="submenu">
                        <li><a href="<?=url_acc()?>user/index.php" class="sub-menu-item">حسابي  </a></li>
                        <li><a href="<?=url_acc()?>user/setting.php" class="sub-menu-item">الإعدادات  </a></li>
                        <li><a href="<?=url_acc()?>user/referrals.php" class="sub-menu-item">الإحالات   </a></li>
                        <li><a href="<?=url_acc()?>user/archives.php" class="sub-menu-item">أرشيف أسئلتي   </a></li>
                     </ul>
                  </li>
               <?php } ?>
                  <li class="has-submenu parent-parent-menu-item"><a href="<?=URL?>que.php">الدخول للمسابقه </a></li>
                  <li class="has-submenu parent-parent-menu-item"><a href="<?=URL?>explain.php">شرح مسابقه</a></li>
                  <li class="has-submenu parent-menu-item">
                     <a href="<?=URL?>poins.php"> لوحه النقاط</a>
                  </li>

                  <li class="has-submenu parent-menu-item">
                     <a href="javascript:void(0)"> عن المسابقه</a><span class="menu-arrow"></span>
                     <ul class="submenu">
                        <li><a href="<?=URL?>privacy.php" class="sub-menu-item">سياسه الخصوصيه </a></li>
                        <li><a href="<?=URL?>rules.php" class="sub-menu-item">مباديء مسابقه</a></li>
                     </ul>
                  </li>
                  <?php if ( isLoginUser() !== true) { ?> 
                  <li class="has-submenu parent-parent-menu-item"><a href="<?=url_acc()?>signup.php">تسجيل جديد</a></li>
                  <?php } ?>
               </ul>
               <!--end navigation menu-->
            </div>
            <!--end navigation-->
         </div>
         <!--end container-->
      </header>
      <!--end header-->
      <!-- Navbar End -->
      <style>
         .bg-half-170 {
         padding: 71px 0; }
         #owl-demo .item img{
         display: block;
         width: 100%;
         height: auto;
         }
         .blackLogin {
         color: black;
         } 
      </style>