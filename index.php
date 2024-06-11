<?php
    $title = "Home | eProfile Personal Profile Generator";
    require './assets/includes/header.php';
    require './assets/includes/navbar.php';

    $fn->authPage();
    $resumes = $db->query("SELECT * FROM resumes WHERE user_id=".$fn->Auth()['id']." ORDER BY id DESC");
    $resumes = $resumes->fetch_all(1);
?>

<div class="container">
    <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
        <div class="d-flex justify-content-between border-bottom">
            <h5>Home</h5>
            <div>
                <a href="createresume.php" class="text-decoration-none"><i class="bi bi-file-earmark-plus"></i> Add New</a>
            </div>
        </div>

        <?php
            if ($resumes) {
                ?>
                <div class="d-flex flex-wrap" style="gap: 2.5rem;">
                    <?php
                        foreach ($resumes as $resume) {
                            ?>
                            <!-- <div class="col-12 col-md-6 p-2">
                                <div class="p-2 border rounded">
                                    <h5><?=$resume['resume_title']?></h5>   
                                    <p class="small text-secondary m-0" style="font-size:12px">
                                        <i class="bi bi-clock-history"></i>
                                        Last Updated <?=date('d F, Y h:i A', $resume['updated_at'])?>
                                    </p>
                                    <div class="d-flex gap-2 mt-1">
                                        <a href="updateresume.php?resume=<?=$resume['slug']?>" class="text-decoration-none small">
                                            <i class="bi bi-file-text"></i> Proceed
                                        </a>
                                        <a href="#" onclick="confirmDelete(<?=$resume['id']?>)" class="text-decoration-none small">
                                            <i class="bi bi-trash2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5><?=$resume['resume_title']?></h5>
                                    <h6 class="small text-secondary m-0" style="font-size:16px">
                                        <i class="bi bi-clock-history"></i> Last Updated <?=date('d F, Y h:i A', $resume['updated_at'])?>
                                    </h6>
                                    <div class="card" style="width: 14rem;">
                                        <img src="https://media.istockphoto.com/vectors/cv-for-job-vector-id515161220?k=6&m=515161220&s=612x612&w=0&h=NTns7T4DQMFekIVQYni2n8XfZU7fdzJ8BXok1eq5jTU=" class="card-img-top" alt="...">
                                    </div>
                                    <a href="updateresume.php?resume=<?=$resume['slug']?>" class="text-decoration-none small">
                                        <i class="bi bi-file-text"></i> Proceed
                                    </a>
                                    <a href="#" onclick="confirmDelete(<?=$resume['id']?>)" class="text-decoration-none small">
                                        <i class="bi bi-trash2"></i> Delete
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="text-center py-3 border rounded mt-3" style="background-color: rgba(236, 236, 236, 0.56);">
                    <i class="bi bi-file-text"></i> No Resumes Available
                </div>
                <?php
            }
        ?>
    </div>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure you want to delete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'actions/deleteresume.action.php?id=' + id;
        }
    });
}
</script>

<?php
    require './assets/includes/footer.php';
?>
