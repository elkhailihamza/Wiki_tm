<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/css/styles.css">
</head>
<nav class="navbar border-bottom">
    <div class="container-fluid py-1 px-3 col-11">
        <a class="navbar-brand d-flex align-items-center" style="color: #000000; font-size: 1.8em; user-select: none;"
            href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 24 24" fill="#D62828"
                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
            </svg>
            Dash<span style="color: #F77F00; font-family: 'Allerta Stencil';">Board</span>
        </a>
        <div class="d-flex gap-3">
            <div class="d-flex">
                <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-3">
                    <li class="nav-item navbar__link d-flex  justify-content-center align-items-center">
                        <a class="nav-link active" href="#">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9" />
                                    <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item navbar__link d-flex justify-content-center align-items-center">
                        <a class="nav-link active" href="#">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item navbar__link d-flex justify-content-center align-items-center">
                        <a class="nav-link active" href="#">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-globe">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="dropdown d-flex align-items-center dropdown__menu">
                <button class="bg-white d-flex align-items-center gap-2 rounded-pill px-4 py-2" type="button"
                    data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="h   ttp://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>n
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                    <a href="#" class="d-flex align-items-center text-decoration-none">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle">
                    </a>
                </button>
                <ul class="dropdown-menu dropdown-menu-end text-small shadow dropdown__list"
                    aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../page/sign-out.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<main class="d-flex w-100" style="height: 89vh;">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 ms-5 me-md-auto link-dark text-decoration-none">
            <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
            <span class="fs-4 ms-2">
                <span>Menu</span>
            </span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="../page/dash_home.php"
                    class="nav-link <?php echo ($identifier == 'is_home') ? "active" : "link-dark"; ?>"
                    aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="<?php echo ($identifier == 'is_home') ? "#FFFFFF" : "#000000"; ?>" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Home
                </a>
            </li>
            <?php
            