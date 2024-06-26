<?php
    $title = "Admin | Personal Profile Generator";
    require './assets/includes/header.php';
    // require './assets/includes/navbar.php';
    $fn->authPage();
?>

<div class="wrapper">
    <aside id="sidebar" class="js-sidebar">
        <!-- Content For Sidebar -->
        <div class="h-100">
            <div class="sidebar-logo">
                <a href="#">eProfile Dashboard</a>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Admin
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-list pe-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admin_userprofile.php" class="sidebar-link" data-bs-target="#pages">
                        <i class="fa-solid fa-file-lines pe-2"></i>
                        User Profiles
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admin_newAcc.php" class="sidebar-link" data-bs-target="#auth">
                        <i class="fa-regular fa-user pe-2"></i>
                        New Accounts
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="main">
        <nav class="navbar navbar-expand px-3 border-bottom" style="background: white;">
            <div class="navbar-collapse navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <img src="./assets/images/admin.jpg" class="avatar img-fluid rounded" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4 style="color: black; font-weight: bold;">Dashboard</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Total Profiles</h4>
                                            <p class="mb-0" style="color:black;">20 Profiles</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Second Card -->
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Total Users</h4>
                                            <p class="mb-0" style="color: black;">20 Users</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Element -->
                <div class="card border-0" style="margin-top: 12px; background-color: white;">
                    <div class="card-header">
                        <h5 class="card-title" style="color: black;">
                            User List
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr style="color: black;">
                                    <th scope="col">First Name</th>
                                    <th scope="col">Middle Name</th>
                                    <th scope="col">Last Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="color: black;">
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr style="color: black;">
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr style="color: black;">
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*,
::after,
::before {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    font-size: 0.875rem;
    opacity: 1;
    overflow-y: scroll;
    margin: 0;
}

a {
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

li {
    list-style: none;
}

h4 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.275rem;
    color: black;
}

/* Layout for admin dashboard skeleton */

.wrapper {
    align-items: stretch;
    display: flex;
    width: 100%;
}

#sidebar {
    max-width: 264px;
    min-width: 264px;
    background: rgb(167,229,230);
    background: linear-gradient(184deg, rgba(167,229,230,1) 21%, rgba(247,247,247,1) 53%, rgba(20,194,195,0.9799124239539566) 100%);
    transition: all 0.35s ease-in-out;
}

.main {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    min-width: 0;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    width: 100%;
    background: var(--bs-dark-bg-subtle);
}

/* Sidebar Elements Style */


.sidebar-logo {
    padding: 1.15rem;
}

.sidebar-logo a {
    color: #000000;
    font-size: 1.15rem;
    font-weight: bolder;
}

.sidebar-nav {
    list-style: none;
    margin-bottom: 0;
    padding-left: 0;
    margin-left: 0;
}

.sidebar-header {
    color: #000000;
    font-size: .75rem;
    padding: 1.5rem 1.5rem .375rem;
}

a.sidebar-link {
    padding: .625rem 1.625rem;
    color: #000000;
    position: relative;
    display: block;
    font-size: 0.875rem;
}

.sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

.sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
}

.avatar {
    height: 40px;
    width: 40px;
}

.navbar-expand .navbar-nav {
    margin-left: auto;
    
}

.content {
    background: white;
    flex: 1;
    max-width: 100vw;
    width: 100vw;
}

@media (min-width:768px) {
    .content {
        max-width: auto;
        width: auto;
    }
}

.card {
    box-shadow: 0 0 .875rem 0 rgba(40, 57, 77, 0.721);
    margin-bottom: 24px;
    
}

.illustration {
    background: rgb(221,221,221);
    background: linear-gradient(156deg, rgba(221,221,221,1) 21%, rgba(20,194,195,0.9799124239539566) 100%);
}

.illustration-img {
    max-width: 150px;
    width: 100%;
}

/* Sidebar Toggle */

#sidebar.collapsed {
    margin-left: -264px;
}

/* Footer and Nav */

@media (max-width:767.98px) {

    .js-sidebar {
        margin-left: -264px;
    }

    #sidebar.collapsed {
        margin-left: 0;
    }

    .navbar{
        background-color: white;;
    }

    .footer {
        width: 100vw;
    }
}
</style>

<?php
    require './assets/includes/footer.php';
?>