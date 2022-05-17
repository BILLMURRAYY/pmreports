<?php
require_once("../service/condb.php");

// $count = 1;
// $result = "SELECT * FROM member 
//            inner join department
//            on department.department_id = member.department_id";
// $query = mysqli_query($condb, $result);
// $rows = mysqli_fetch_array($query, MYSQLI_ASSOC);

// $count = 1;

?>
<script>
    // function confirm_logout(){
    //     if(confirm("Logout")){
    //         window.location="../../index.php";
    //     }
    // }
</script>
<script>
        function logout() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
        title: 'ออกจากระบบ?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title:'ออกจากระบบ สำเร็จ!',
            icon: 'success'
            // 'Your file has been deleted.',
            
            }).then((result) => {
                window.location="../../logout.php";
            })
        }
        })
        }

       
    </script>
<body class="sidebar-mani layout-fixed sidebar-closed sidebar-collapse " style="height: auto;">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
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
                            <?php
                            // $sql = "SELECT img FROM member WHERE member_id = '".$_SESSION["member_id"]."'";
                            // $query0 = mysqli_query($condb, $sql);
                            // $rows0 = mysqli_fetch_array($query0, MYSQLI_ASSOC);
                            ?>
                            <!-- <div class="image">
                                <img src="../../assets/images/<?php //echo $rows0['img'] ?>" class="img-circle elevation-2" alt="User Image">
                            </div> -->
                            <div class="info">
                                <a href="#" class="d-block"><?php echo  $_SESSION["member_name"] ;?></a>
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
                                <!-- <li class="nav-item">
                                    <a href="dashboad.php" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Dashboad
                                        </p>
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            ข้อมูลปฎิบัติงานพนักงาน
                                            <!-- <span class="right badge badge-danger">New</span> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="report.php" class="nav-link">
                                        <!-- <i class="nav-icon fas fa-chart-pie"></i>
                                     -->
                                     <!-- <i class="nav-icon fas fa-file"></i> -->
                                     <i class="nav-icon fas fa-paper-plane"></i>
                                        <p>
                                            รายงานผลการปฎิบัติงาน
                                            <!-- <i class="fas fa-angle-left right"></i> -->
                                            <!-- <span class="badge badge-info right">6</span> -->
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="feedback.php" class="nav-link clicks">
                                        <i class="nav-icon fas  fa-comment"></i>
                                       
                                        <p>
                                            ข้อเสนอแนะ
                                             
                                            <!-- <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span> -->
                                            <!-- <i class="fas fa-angle-left right"></i> -->
                                        </p>
                                        <span class="badge bg-danger count" style="border-radius:10px;"></span>
                                        <!-- <span class="label label-pill label-danger count" style="border-radius:10px;"></span> -->
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="history_feedback.php" class="nav-link">
                                        <i class="nav-icon fas fad fa-history"></i>
                                        <p>
                                            ประวัติส่งข้อเสนอแนะ            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="summary.php" class="nav-link">
                                        <!-- <i class="nav-icon fas fal fa-table"></i> -->
                                        <!-- <i class="nav-icon fas fa-chart-bar"></i> -->
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                        สรุปผลการรายงานของพนักงาน
                                            <!-- <i class="right fas fa-angle-left"></i> -->
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view_summary.php" class="nav-link">
                                        <!-- <i class="nav-icon fas fal fa-table"></i> -->
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>
                                        สรุปผลการรายงาน
                                            <!-- <i class="right fas fa-angle-left"></i> -->
                                        </p>
                                    </a>
                                </li>
                           
                                <!-- <li class="nav-item">
                                    <a href="history_estimate.php" class="nav-link">
                                        <i class="nav-icon fas fad fa-history"></i>
                                        <p>
                                            ประวัติการประเมิน            
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=" estimate_value.php" class="nav-link">                                     
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>
                                            ผลประเมิน                                          
                                        </p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <form action="edit_profile.php">
                                    <a href="edit_profile.php?id_member=<?php //echo $_SESSION["member_id"] ?>" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>แก้ไขข้อมูลส่วนตัว</p>
                                    </a>
                                    </form>
                                </li> -->
                                <li class="nav-item">
                                <a href=""  class="nav-link" onclick="logout()">
                                        <!-- <i class="nav-icon far fa-circle text-info"></i> -->
                                        <i class="nav-icon fas fa-sign-out-alt"></i>
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



</body>