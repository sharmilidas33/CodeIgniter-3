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
                <div class="sidebar-brand-text mx-3 font-weight-bold text-lg"><?= htmlspecialchars($content['logo_name']); ?></div>
            </a>

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

           <!-- Navbar Links -->
           <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php 
                    if (!empty($content['nav_items'])) {
                        $navItems = is_string($content['nav_items']) ? json_decode($content['nav_items'], true) : $content['nav_items'];
                        if (json_last_error() === JSON_ERROR_NONE && !empty($navItems)) {
                            foreach ($navItems as $item) {
                                if (isset($item['name']) && isset($item['link'])) {
                    ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= htmlspecialchars($item['link']); ?>"><?= htmlspecialchars($item['name']); ?></a>
                                </li>
                    <?php 
                                }
                            }
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="#">Invalid Navigation Items</a></li>';
                        }
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="#">No Navigation Items</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <!-- End of Topbar -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

<style>
    .topbar {
            background-color: #17a2b8 !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-item .nav-link {
            font-weight: bold;
            color: #fff !important;
        }
</style>