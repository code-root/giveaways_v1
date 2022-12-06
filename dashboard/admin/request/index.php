<?php include '../layout/head.php';
      include '../layout/nav.php' ;
      if (isset($_GET['FunctionSuccess'])) {
        $functionID = filter_var($_GET['FunctionSuccess'], FILTER_SANITIZE_STRING);
             $sql = "UPDATE `request` SET status=2 where id = '$functionID' ";
             $conn->query($sql);
         }
         if (isset($_GET['FunctionWarning'])) {
            $functionID = filter_var($_GET['FunctionWarning'], FILTER_SANITIZE_STRING);
                 $sql = "UPDATE `request` SET status=1 where id = '$functionID' ";
                 $conn->query($sql);
             }
  
      ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.js"></script>
 
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6> طلبات سحب النقاط</h6>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table id="table_id" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Nmae </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">points</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">تم  </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> رفض</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
               <?php
               $sql = "SELECT * FROM `request` ";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          $functionID =$row['id']; ?>
                    <tr>
                    <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?=$row['id']?></span></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=GeUsernameUsers($row['UserId'])?></h6>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$row['points']?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$row['date']?></h6>
                          </div>
                        </div>
                      </td>
                      <td><form action="" method="GET"><button type="submit" class="btn btn-success "  name="FunctionSuccess" value="<?=$functionID?>" >تم  </button> </form> </td>
                       <td><form action="" method="GET"><button type="submit" class="btn btn-warning "  name="FunctionWarning" value="<?=$functionID?>" >رفض </button> </form> </td>
                       <td>
                       <?php if ($row['status'] == 1 ) {
                          echo '<span class="badge badge-pill bg-gradient-warning" alt="s"> - </span></td>';
                         }else {
                          echo '<span class="badge badge-pill bg-gradient-success"> - </span></td>';
                        } ?>    

                    </tr>
                    <?php  } }  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    

        <!-- App js -->

        <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
                buttons: [
        'copy', 'excel', 'pdf'
    ]
            });
        </script>

      <?php include '../layout/footer.php'; ?>