<?php

use app\Services\sessionManager;
?>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark user-select-none">
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="post" action="/wiki_tm/logout">
                            <button class="dropdown-item" type="submit" name="submit" value="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link py-0 gap-1" href="/wiki_tm/dashboard/home"><i
                                class="fas fa-tachometer-alt"></i><span>Overview</span></a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="/wiki_tm/dashboard/wiki">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Manage Articles
                        </a>
                        <a class="nav-link" href="/wiki_tm/dashboard/categorie">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Manage Categories
                        </a>
                        <a class="nav-link" href="/wiki_tm/dashboard/tags">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Manage Tags
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= sessionManager::get('fname') . " " . sessionManager::get('lname') ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>