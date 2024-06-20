<style>
        .topbar {
            background-color: #17a2b8 !important; /* bg-info */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-item .nav-link {
            font-weight: bold;
            color: #fff !important; /* Ensure text is visible on bg-info */
        }
    </style>
</head>
<body>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
            <!-- Brand Logo and Text -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3 font-weight-bold text-lg">BLOGSPOT</div>
            </a>

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('home/about'); ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('blog'); ?>">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('signup'); ?>">Sign Up</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of Topbar -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->