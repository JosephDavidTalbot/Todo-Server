<html>
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap-reboot.css" rel="stylesheet">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/bootstrap-grid.css" rel="stylesheet">
        <?= $css; ?>
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-expand-sm navbar-light bg-light">
                    <a class="navbar-brand" href=".">To-Do Server</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href=".">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Logout</a>
                        </li>
                    </ul>
                </nav>
            </header>
