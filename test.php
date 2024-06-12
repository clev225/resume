<?php
$title = "Home | eProfile Personal Profile Generator";
require './assets/includes/header.php';
require './assets/includes/navbar.php';

$fn->authPage();

// Check if the user is an admin
$isAdmin = $fn->Auth()['role'] === 'admin';

if ($isAdmin) {
    // Fetch all resumes for admin
    $resumes = $db->query("SELECT * FROM resumes ORDER BY id DESC");
} else {
    // Fetch resumes only for the logged-in user
    $resumes = $db->query("SELECT * FROM resumes WHERE user_id=" . $fn->Auth()['id'] . " ORDER BY id DESC");
}

$resumes = $resumes->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5" style =>
        <?php if ($resumes): ?>
            <div class="d-flex flex-wrap" style="gap: 2.5rem;">
                <?php foreach ($resumes as $resume): ?>
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5><?php echo htmlspecialchars($resume['resume_title']); ?></h5>
                            <h6 class="small text-secondary m-0" style="font-size:16px">
                                <i class="bi bi-clock-history"></i> Last Updated <?php echo date('d F, Y h:i A', strtotime($resume['updated_at'])); ?>
                            </h6>
                            <div class="card" style="width: 14rem;">
                                <img src="https://media.istockphoto.com/vectors/cv-for-job-vector-id515161220?k=6&m=515161220&s=612x612&w=0&h=NTns7T4DQMFekIVQYni2n8XfZU7fdzJ8BXok1eq5jTU=" class="card-img-top" alt="...">
                            </div>
                            <a href="updateresume.php?resume=<?php echo htmlspecialchars($resume['slug']); ?>" class="text-decoration-none small">
                                <i class="bi bi-file-text"></i> Proceed
                            </a>
                            <a href="#" onclick="confirmDelete(<?php echo htmlspecialchars($resume['id']); ?>)" class="text-decoration-none small">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
