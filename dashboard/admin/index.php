<?php include 'layout/head.php';
      include 'layout/nav.php' ;

      $sql = "SELECT count(id) FROM question ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $question = $row['count(id)'];
      }else {
       $question = '0';
      }

      $sql = "SELECT count(id) FROM `section` where name != '' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $section = $row['count(id)'];
      }else {
       $section = '0';
      }

      $sql = "SELECT count(id) FROM users ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $users = $row['count(id)'];
      }else {
       $users = '0';
      }



      $sql = "SELECT count(id) FROM `record_answers` ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
       $record_answers = $row['count(id)'];
      }else {
       $record_answers = '0';
      } 


?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">عدد الأسئلة </p>
                    <h5 class="font-weight-bolder mb-0">
                   <?=$question?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-start">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">الأقسام المسلجة</p>
                    <h5 class="font-weight-bolder mb-0">
                    <?=$section?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-start">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">عدد المستخدمين </p>
                    <h5 class="font-weight-bolder mb-0">
                    <?=$users?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-start">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">محاولات المستخدمين </p>
                    <h5 class="font-weight-bolder mb-0">
                    <?=$record_answers?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-start">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row mb-3">
                <div class="col-6">
                  <h6>ألأقسام </h6>
                </div>
                <div class="col-6 my-auto text-start">
                  <div class="dropdown float-start ps-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 me-n4" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="add-section.php">إضافة قسم</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إسم القسم </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">عدد الأسئلة </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">إضافة سؤال</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">عرض الأسئبة</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">إكمال</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  $sql = "SELECT * FROM `section`  ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID =$row['id'];
                       //   GetRandSection($code);
                          ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$row['name']?></h6>
                          </div>
                        </div>
                      </td>
                      <td><div class="avatar-group mt-2">10 / <?=GetCorrect($row['rand'])?> </div></td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="question-add.php?code=<?=$functionID?>"><span class="badge badge-pill bg-gradient-dark"> إضافة </span></a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <a href="question.php?code=<?=$functionID?>">عرض </span></a>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold"><?=GetCorrect($row['rand'])?>0%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-<?=GetCorrect($row['rand'])?>0" role="progressbar" aria-valuenow="<?=GetCorrect($row['rand'])?>0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include 'layout/footer.php'; ?>