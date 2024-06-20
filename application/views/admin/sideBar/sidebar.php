<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">BlogSpot</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('BlogAdmin/index')?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('BlogAdmin/addNewBlog'); ?>">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Blog</span>
            </a>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('BlogAdmin/viewBlogs'); ?>">
                <i class="fas fa-fw fa-eye"></i>
                <span>View All Blogs</span>
            </a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

    

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('index.php/BlogAdmin/viewBlogs'); ?>">
                <i class="fas fa-fw fa-eye"></i>
                <span>Appearance</span>
            </a>
        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('signin/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
        

        </ul>
        <!-- End of Sidebar -->