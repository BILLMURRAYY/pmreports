<script>
        function logout() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
        title: 'Are you sure Logout?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Logout!',
            // 'Your file has been deleted.',
            'success'
            ).then((result) => {
                window.location="../../logout.php";
            })
        }
        })
        }

       
    </script>
<!-- <body class="sidebar-mani layout-fixed sidebar-closed sidebar-collapse " style="height: auto;"> -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <!-- <img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> รูปภาพ -->
            <img src="../../assets/images/favicons/logo.png" alt="AdminLTE Logo" class="brand-image " style="">
            <span class="brand-text font-weight-light">OPRS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden"> -->
            <!-- <div class="os-resize-observer-host observed">
                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
            </div>
            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                <div class="os-resize-observer"></div>
            </div> -->
            <!-- <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 664px;"></div> -->
            <!-- <div class="os-padding"> -->
                <!-- <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"> -->
                    <!-- <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;"> -->
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <!-- <div class="image"> -->
                                 <?php
                                //  require_once("../service/condb.php");
                                // $sql = "SELECT img FROM member WHERE member_id = '".$_SESSION["member_id"]."'";
                                // $query0 = mysqli_query($condb, $sql);
                                // $rows0 = mysqli_fetch_array($query0, MYSQLI_ASSOC);
                                ?>
                                <!-- <img src="../../assets/images/<?php echo $rows0['img'] ?>" class="img-circle elevation-2" alt="User Image"> -->
                            <!-- </div> -->
                            <div class="info">
                                <a href="#" class="d-block"><?php echo  $_SESSION["member_name"] ?></a>
                                <span style="color: white;">(<?php echo  $_SESSION["department_name"] ;?>)</span>

                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <!-- <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>            
                        </div> -->

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                               
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            รายงานผลการปฎิบัติงาน
                                            <!-- <i class="fas fa-angle-left right"></i> -->
                                            <!-- <span class="badge badge-info right">6</span> -->
                                        </p>
                                    </a>

                               
                                <li class="nav-item">
                                    <a href="feedback.php" class="nav-link">
                                    <i class="nav-icon fas  fa-comment"></i>
                                        <p>
                                            feedback
                                            <!-- <i class="fas fa-angle-left right"></i> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view_summary.php" class="nav-link">
                                        <i class="nav-icon fas fal fa-table"></i>
                                       
                                        <p>
                                        สรุปผลการรายงาน
                                            <!-- <i class="right fas fa-angle-left"></i> -->
                                        </p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="estimate_value.php" class="nav-link">                                     
                                    <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>
                                        ผลประเมิน                                         
                                        </p>
                                    </a>
                                </li> -->

                                <!-- <li class="nav-item">
                                    form action="edi_profile.php"> -->
                                    <!-- <a href="edit_profile.php?id_member=<?php //echo $_SESSION['member_id'] ?>" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                       
                                        <p>
                                            แก้ไขข้อมูลส่วนตัว           
                                        </p>
                                    </a> -->
                                    <!-- </form> -->
                                <!-- </li> -->
                                <li class="nav-item">
                                <a  class="nav-link" onclick="logout()">
                                        <i class="nav-icon far fa-circle text-info"></i>
                                        <p>ออกจากระบบ</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                <div class="os-scrollbar-track">
                    <div class="os-scrollbar-handle" style="height: 48.933%; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <!-- <div class="os-scrollbar-corner"></div> -->
        </div>
        <!-- /.sidebar -->
    </aside>

<!-- </body> -->