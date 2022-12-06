<?php include 'layout/head.php';
      include 'layout/nav.php' ;


     if (isset($_GET['FunctionWarning'])) {
        $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
             $sql = "DELETE from  `slider`  where id = '$functionID' ";
             $conn->query($sql);
         }
  ?> 
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>السلايدرات المتوفرة</h6>
              <a  href="slider-add.php" class="btn btn-info">إضافة سلايدر </a>

            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> # </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">عرض الصور </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">delete</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
               <?php  $sql = "SELECT * FROM `slider` order by id desc ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID = $row['id'];
                          $image = $row['img'];
                          ?>
                    <tr>
                      <td>
                    <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="<?=url_assets()?>upload/slider/<?=get_img($image)?>" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?=$row['name']?>  </h6>
                                    
                                            </div>
                                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <a href="<?=url_assets()?>upload/slider/<?=get_img($image)?>" class="mb-0 text-sm">عرض الصور  </a>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=arabicDate($row['date'])?></span>
                      </td>
                       <td><form action="" method="GET"><button type="submit" class="btn btn-warning "  name="FunctionWarning" value="<?=$functionID?>" >حذف </button> </form> </td> 
                    </tr>
                    <?php  } }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'layout/footer.php'; ?>
      