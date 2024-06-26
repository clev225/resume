<?php
    $title = "Admin | Personal Profile Generator";
    require './assets/includes/header.php';
    // require './assets/includes/navbar.php';

    $fn->authPage();
    // Check if the user is an admin
    $isAdmin = $fn->Auth()['role'] === 'admin';
    
    $user = $fn->Auth();

    if ($user['role'] !== 'admin') {
        // If not an admin, redirect to the homepage or show an error message
        header("Location: login.php"); // Replace with your homepage URL
        exit();
    }
    
    if ($isAdmin) {
        // Fetch all resumes for admin
        $resumes = $db->query("SELECT * FROM resumes ORDER BY id DESC");
    } else {
        // Fetch resumes only for the logged-in user
        $resumes = $db->query("SELECT * FROM resumes WHERE user_id=" . $fn->Auth()['id'] . " ORDER BY id DESC");
    }
    
    $resumes = $resumes->fetch_all(MYSQLI_ASSOC);
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
                        <a href="admincopy.php" class="sidebar-link">
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
                                <a href="actions/logout.action.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2" style="background-color: white;">
                    <!-- Table Element -->
                        <div class="card-header">
                            <h5 class="card-title" style="color: black; font-weight: bold; margin-bottom: 24px;">
                                User Lists
                            </h5>
                        </div>
                        <div class="container mt-5" style="max-height: 580px; overflow-y: auto;">
                            <?php if ($resumes): ?>
                                <div class="d-flex flex-wrap" style="gap: 2.5rem;">
                                    <?php foreach ($resumes as $resume): ?>
                                        <div class="card" style="width: 15rem;">
                                            <div class="card-body">
                                                <h5><?php echo htmlspecialchars($resume['resume_title']); ?></h5>
                                                <div class="card" style="width: 11rem;">
                                                    <img src="https://media.istockphoto.com/vectors/cv-for-job-vector-id515161220?k=6&m=515161220&s=612x612&w=0&h=NTns7T4DQMFekIVQYni2n8XfZU7fdzJ8BXok1eq5jTU=" class="card-img-top" alt="...">
                                                </div>
                                                <a href="admin_viewresume.php?resume=<?php echo htmlspecialchars($resume['slug']); ?>" class="text-decoration-none small">
                                                    <i class="bi bi-file-text"></i> View
                                                </a>
                                                <a href="admin_deleteresume.action.php" onclick="return confirm('Are you sure you want to delete this resume?');" class="text-decoration-none small">
                                                    <i class="bi bi-trash2"></i> Delete
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-3 border rounded mt-3" style="background-color: rgba(236, 236, 236, 0.56);">
                                    <i class="bi bi-file-text"></i> No Resumes Available
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

.card border-0{
    flex-wrap: wrap;
}

.card {
    flex-wrap: wrap;
    box-shadow: 0 0 .875rem 0 rgba(40, 57, 77, 0.325);
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