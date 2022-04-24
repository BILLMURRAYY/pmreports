<!-- <body class="sidebar-mani layout-fixed sidebar-closed sidebar-collapse " style="height: auto;"> -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
      <a href="#" class="brand-link">
        <!-- <img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">OPRS</span>
      </a>
   


    <!-- Sidebar -->
    <div class="sidebar">
    <!-- <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">

      <div class="os-padding">
        <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
          <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;"> -->
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display:block;">
              <div class="image">
                <?php
                  // $sql = "SELECT img FROM member WHERE member_id = '".$_SESSION["member_id"]."'";
                  // $query0 = mysqli_query($condb, $sql);
                  // $rows0 = mysqli_fetch_array($query0, MYSQLI_ASSOC);
                ?>
                <!-- <img src="../../assets/images/<?php //echo $rows0['img'] ?>" class="img-circle elevation-2" alt="User Image"> -->
              </div>
              <div class="info" style="text-align: center;">
                <a href="#" class="d-block"><?php echo $_SESSION["member_name"] ?>
                </a>
                <span style="color: white;"><?php //echo  $_SESSION["department_name"] ;?></span>
              </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
            </div>
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 
                  <li class="nav-item">
                    <a href="index.php" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        จัดการข้อมูลสมาชิก
                        <!-- <i class="fas fa-angle-left right"></i> -->
                        <!-- <span class="badge badge-info right">6</span> -->
                      </p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
                    <a href="form_add_estimate.php" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>
                        สร้างแบบประเมิน
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li> -->

                  <li class="nav-item">
                    <a href="send_report.php" class="nav-link">
                      <i class="nav-icon fas fa-list"></i>
                      <p>
                        จัดการรายงานผล
                        <!-- <i class="fas fa-angle-left right"></i> -->
                      </p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
                    <a href="contact.php" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>
                        ติดต่อบุคลากร
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li> -->
                  <!-- <li class="nav-header">ฟังก์ชันเพิ่มเติม</li>
                  <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                        ปฎิทิน
                        <span class="badge badge-info right">2</span>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon far fa-envelope"></i>
                      <p>
                        Mailbox
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li> -->

                  <li class="nav-item">
                    <a href="../../logout.php" class="nav-link">
                      <i class="nav-icon far fa-circle text-info"></i>
                      <p>ออกจากระบบ</p>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            
          </div>
        <!-- </div> -->
        <!-- <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
          </div>
        </div> -->
        <!-- <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
          <div class="os-scrollbar-track">
            <div class="os-scrollbar-handle" style="height: 48.933%; transform: translate(0px, 0px);"></div>
          </div>
        </div> -->
        <!-- <div class="os-scrollbar-corner"></div> -->

      <!-- </div>
      </div> -->
      <!-- /.sidebar -->
  </aside>

<!-- </body> -->