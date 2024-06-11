<?php
    $title = "Update Resume | Personal Profile Generatorn";
    require './assets/includes/header.php';
    require './assets/includes/navbar.php';

    $fn->authPage();
        
    $slug=$_GET['resume']??'';
    $resumes = $db->query("SELECT * FROM resumes WHERE ( slug='$slug' AND user_id=".$fn->Auth()['id'].") ");
    $resume = $resumes->fetch_assoc();

    if(!$resume) {
        $fn->redirect('index.php');
    }
    
    $educs = $db->query("SELECT * FROM education WHERE (resume_id=".$resume['id']." ) ");
    $educs = $educs->fetch_all(1);
    
    $exps = $db->query("SELECT * FROM experience WHERE (resume_id=".$resume['id']." ) ");
    $exps = $exps->fetch_all(1);

    $skills = $db->query("SELECT * FROM skills WHERE (resume_id=".$resume['id']." ) ");
    $skills = $skills->fetch_all(1);
?>

<div class="container">
    <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
        <div class="d-flex justify-content-between border-bottom">
            <h5>Update Resume</h5>
            <div>
                <a href="index.php" class="text-decoration-none"><i class="bi bi-arrow-left-circle"></i> Back</a>
            </div>
        </div>

        <div>
            <form action="actions/updateresume.action.php" method="post" class="row g-3 p-3">
                <input type="hidden" name="id" value="<?=$resume['id']?>" />
                <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                <div class="col-md-6">
                    <label class="form-label">Resume Title</label>
                    <input type="text" name="resume_title" placeholder="Actor" value="<?=@$resume['resume_title']?>" class="form-control" required>
                </div>
                <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Basic Information</h5>
                <div class="col-md-6">
                    <label class="form-label">Surname*</label>
                    <input type="text" value="<?=@$resume['surname']?>" name="surname" placeholder="Dalisay" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">First Name*</label>
                    <input type="text" value="<?=@$resume['firstname']?>" name="firstname" placeholder="Cardo" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Middle Name (optional)*</label>
                    <input type="text" value="<?=@$resume['middlename']?>" name="middlename" placeholder="Batumbakal" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Age*</label>
                    <input type="text" value="<?=@$resume['age']?>" name="age" placeholder="21 years old" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Birthdate*</label>
                    <input type="text" value="<?=@$resume['birthdate']?>" name="birthdate" placeholder="January 4, 2003/Jan 4, 2003/01 04 2003" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender (optional)*</label>
                    <input type="text" value="<?=@$resume['gender']?>" name="gender" placeholder="Male/Female/Others/They/Them" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nationality*</label>
                    <input type="text" value="<?=@$resume['nationality']?>" name="nationality" placeholder="21 years old" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact/Phone Number*</label>
                    <input type="number" min="1111111111" value="<?=@$resume['contact_no']?>" name="contact_no" placeholder="+63123 456 7890 or 091234567890" max="9999999999"
                        class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email*</label>
                    <input type="email" value="<?=@$resume['email_id']?>" name="email_id" placeholder="cardodalisay@batumbakal.com" class="form-control" required>
                </div>

                <h5 class="mt-3 text-secondary"><i class="bi bi-geo-alt"></i> Address</h5>
                <div class="col-md-6">
                    <label for="inputProvince" class="form-label"> Province*</label>
                    <input type="text" class="form-control" id="inputProvince" value="<?=@$resume['province']?>" name="province" placeholder="Quezon, Province" required>
                </div>
                <div class="col-md-6">
                    <label for="inputMunicipality" class="form-label"> Municipality*</label>
                    <input type="text" class="form-control" id="inputMunicipality" value="<?=@$resume['municipality']?>" name="municipality" placeholder="Candelaria/Candelaria, Quezon" required>
                </div>
                <div class="col-md-6">
                    <label for="inputBarangay" class="form-label"> Barangay*</label>
                    <input type="text" class="form-control" id="inputBarangay" value="<?=@$resume['barangay']?>" name="barangay" placeholder="Malabanban Sur, Candelaria" required>
                </div>
                <div class="col-md-6">
                    <label for="inputStreet" class="form-label"> Street*</label>
                    <input type="text" class="form-control" id="inputStreet" value="<?=@$resume['street']?>" name="street" placeholder="Nadres Street. Brgy Malabanban Sur" required>
                </div>
                <div class="col-md-6">
                    <label for="inputHouse No." class="form-label"> House No.*</label>
                    <input type="text" class="form-control" id="inputHouse No." value="<?=@$resume['house_no']?>" name="house_no" placeholder="123 Nadres Street. Brgy Malabanban Sur" required>
                </div>
            </form>
            
            <div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5 class=" text-secondary"><i class="bi bi-journal-bookmark"></i> Education</h5>
                    <div>
                        <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addeduc"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                    </div>
                </div>
                <!-- Modal Education-->
                <div class="modal fade" id="addeduc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Education</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="actions/addeduc.action.php" class="row g-3">
                                    <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
                                    <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                                    <div class="col-md-12">
                                        <label for="inputSchoolName" class="form-label">School Name</label>
                                        <input type="text" class="form-control" name="school_name" placeholder="Manuel S. Enverga University Foundation - Candelaria, Inc./Leave it default if none." id="inputSchoolName" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputEducationLvl" class="form-label">Education Level</label>
                                        <input type="text" class="form-control" name="educ_level" placeholder="2nd Yr. College/Leave it default if none." id="inputEducationLvl" required>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <label for="inputSomeDescription" class="form-label">Some Description</label>
                                        <textarea class="form-control" name="some"></textarea>
                                    </div> -->
                                    <div class="col-md-12">
                                        <label for="inputStarted" class="form-label">Started</label>
                                        <input type="text" class="form-control" placeholder="April 2023/2023/Currently Pursuing/Leave it default if none." name="started" id="inputStarted" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputEnded" class="form-label">Ended</label>
                                        <input type="text" class="form-control" placeholder="April 2024/2024/Currently Pursuing/Leave it default if none." name="ended" id="inputEnded" required>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">Add Education</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Education-->
                <div class="d-flex flex-wrap">
                    <?php
                        if($educs) {
                            foreach($educs as $exp) {
                                ?>
                                    <div class="col-12 col-md-6 p-2">
                                        <div class="p-2 border rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6><?=$exp['educ_level']?></h6>
                                                <a href="actions/deleteeduc.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                            </div>
                                            <p class="small text-secondary m-0">
                                                <i class="bi bi-books"></i> <?=$exp['school_name']?> (<?=$exp['started'].' - '.$exp['ended']?>)
                                            </p>
                                            <!-- <p class="small text-secondary m-0">
                                                <?=$exp['some_desc']?>
                                            </p> -->
                                        </div>
                                    </div>
                                <?php
                            }
                        }   
                        else {
                            ?>
                                <div class="col-12 col-md-6 p-2">
                                    <div class="p-2 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>ex. Manuel S. Enverga University Foundation - Candelaria, Inc./Leave it default if none.</h6>
                                        </div>
                                        <p class="small text-secondary m-0">
                                            ex. 2nd Yr. College/Leave it default if none.
                                        </p>
                                        <!-- <p class="small text-secondary m-0">
                                            ex. Best in Computer Programming/Leave it default if none.
                                        </p> -->
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
    
                <hr>
                <div class="d-flex justify-content-between">
                    <h5 class=" text-secondary"><i class="bi bi-briefcase"></i> Experience</h5>
                    <div>
                        <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addexp"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                    </div>
                </div>
                <!-- Modal Experience-->
                <div class="modal fade" id="addexp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Experience</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="actions/addexperience.action.php" class="row g-3">
                                    <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
                                    <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                                    <div class="col-md-12">
                                        <label for="inputCompany" class="form-label">Company</label>
                                        <input type="text" class="form-control" name="company" placeholder="Canva/Leave it default if none." id="inputCompany" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputJobPosition" class="form-label">Position/Job Role</label>
                                        <input type="text" class="form-control" name="position" placeholder="Associate Software Engineer/Leave it default if none." id="inputJobPosition" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputJobDescription" class="form-label">Position/Job Description</label>
                                        <textarea class="form-control" name="job_desc"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputStarted" class="form-label">Started</label>
                                        <input type="text" class="form-control" placeholder="April 2023/2023/Currently Pursuing/Leave it default if none." name="started" id="inputStarted" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputEnded" class="form-label">Ended</label>
                                        <input type="text" class="form-control" placeholder="April 2024/2024/Currently Pursuing/Leave it default if none." name="ended" id="inputEnded" required>
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">Add Experience</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Experience-->
                <div class="d-flex flex-wrap">
                    <?php
                        if($exps) {
                            foreach($exps as $exp) {
                                ?>
                                    <div class="col-12 col-md-6 p-2">
                                        <div class="p-2 border rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6><?=$exp['position']?></h6>
                                                <a href="actions/deleteexp.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                            </div>
                                            <p class="small text-secondary m-0">
                                                <i class="bi bi-buildings"></i> <?=$exp['company']?> (<?=$exp['started'].' - '.$exp['ended']?>)
                                            </p>
                                            <p class="small text-secondary m-0">
                                                <?=$exp['job_desc']?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                            }
                        }   
                        else {
                            ?>
                                <div class="col-12 col-md-6 p-2">
                                    <div class="p-2 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>ex. Associate Software Engineer/Leave it default if none.</h6>
                                        </div>
                                        <p class="small text-secondary m-0">
                                            ex. Canva/Leave it default if none.
                                        </p>
                                        <p class="small text-secondary m-0">
                                            ex. Helped developed Drag-and-Drop API for images/Leave it default if none.
                                        </p>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
    
                <hr>
                <div class="d-flex justify-content-between">
                    <h5 class=" text-secondary"><i class="bi bi-boxes"></i> Skills</h5>
                    <div>
                        <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addskill"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                    </div>
                </div>
                <!-- Modal Skills-->
                <div class="modal fade" id="addskill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Skill</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="actions/addskill.action.php" class="row g-3">
                                    <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
                                    <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                                    <div class="col-md-12">
                                        <label for="inputSkill" class="form-label">Skill</label>
                                        <input type="text" class="form-control" name="skill" placeholder="Basic knowledge in Microsoft Office/Leave it default if none." id="inputSkill">
                                    </div>
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">Add Skill</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Skills-->
                <div class="d-flex flex-wrap">
                    <?php
                        if($skills) {
                            foreach($skills as $skill) {
                                ?>
                                    <div class="col-12 p-2">
                                        <div class="p-2 border rounded">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6><i class="bi bi-caret-right"></i> <?=$skill['skill']?></h6>
                                                <a href="actions/deleteskill.action.php?id=<?=$skill['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="bi bi-x-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                        else {
                            ?>
                                <div class="col-12 p-2">
                                    <div class="p-2 border rounded">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6><i class="bi bi-caret-right"></i> ex. Basic knowledge in Microsoft Office/Leave it default if none.</h6>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            
        </div>

        <div class="col-12 text-end">
            <a href="resume.php?resume=<?=$resume['slug']?>" class="btn btn-primary"><i class="bi bi-floppy"></i> Proceed</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<?php
    require './assets/includes/footer.php';
?>