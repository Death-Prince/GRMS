<!-- student  -->

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper">
        <a class="brand-logo" href="index.html">
            <img src="../images/logo.png" class="img-xlg" alt="logo" />
        </a>
        <span class=" custom-title">PHNHS</span>
    </div>
    <div class="navbar-menu-wrapper">
        <div class="d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text d-flex align-items-bottom justify-content-center gap-1">
                        <i class="mdi <?= $pageIcon ?> text-black"></i>
                        <span class="text-black fw-bold"><?php echo $pageTitle; ?></span>
                    </h1>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="../images/faces/<?php echo $_SESSION['profile']; ?>"
                            alt="Profile image">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
        <div class="border border-1 border-gray"></div>
    </div>
</nav>