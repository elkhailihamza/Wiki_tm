<?php
use app\Services\sessionManager;

?>
<div class="container-fluid bg-primary">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0 d-flex justify-content-between align-items-between">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-white fw-bold d-flex align-items-center justify-content-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-globe">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                    </svg><span class="text-white ms-1">Wiki™</span> </h1>
            </a>
            <div>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav p-0">
                        <?php
                        $uri = $_GET['uri'] ?? 'Home';
                        if (sessionManager::get('id_user') !== NULL) {
                            $arr = ['Home', 'Articles', 'Create', 'Categories', 'Statistics'];
                        } else {
                            $arr = ['Home', 'Articles', 'Categories', 'Statistics'];
                        }
                        foreach ($arr as $v):
                            ?>
                            <a href="/wiki_tm/<?= lcfirst($v) ?>"
                                class="nav-item nav-link <?= ucfirst($uri) === $v ? 'active text-white' : '' ?>">
                                <?= $v ?>
                            </a>
                            <?php
                        endforeach;
                        ?>
                        <div class="nav-item">
                            <?php
                            if (sessionManager::get('id_user') !== NULL) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-arrow-down-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="8 12 12 16 16 12"></polyline>
                                            <line x1="12" y1="8" x2="12" y2="16"></line>
                                        </svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <form method="post" action="/wiki_tm/logout">
                                                <button class="dropdown-item" type="submit" name="logout">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <a class="nav-link" href="/wiki_tm/login"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h6v18h-6M10 17l5-5-5-5M13.8 12H3" />
                                    </svg></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>