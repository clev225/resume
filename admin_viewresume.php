<?php
    // $title = "Resume | Resume Formulator Job Application";
    
    require 'assets/class/database.class.php';
    require 'assets/class/function.class.php';
        
    $slug=$_GET['resume']??'';
    $resumes = $db->query("SELECT * FROM resumes WHERE ( slug='$slug') ");
    $resume = $resumes->fetch_assoc();

    $user = $fn->Auth();

    if ($user['role'] !== 'admin') {
        // If not an admin, redirect to the homepage or show an error message
        header("Location: login.php"); // Replace with your homepage URL
        exit();
    }

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" href="logo.png">
    <title><?=$resume['firstname'].' | '.$resume['resume_title']?></title>
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Poppins', sans-serif;
            font-size: 12pt;
            background: linear-gradient(to right, rgb(127, 127, 213), rgb(134, 168, 231), rgb(145, 234, 228));
            background-attachment: fixed;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 0.5cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .personal-info.zsection {
            flex: 1;
            padding-right: 20px;
        }

        .image-container {
            flex: 0 0 auto;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .img-thumbnail {
            width: 2in;
            height: 2in;
            object-fit: cover;
            border-radius: 50%;
        }

        .custom-file-upload {
            margin-top: 20px;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .custom-file-upload label {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            line-height: 1.5;
            color: #495057;
            transition: background-color 0.15s ease-in-out;
        }

        .custom-file-upload label:hover {
            background-color: #e2e6ea;
        }

        .title {
            vertical-align: top;
            width: 20%;
            padding-top: 10px;
        }

        .content {
            width: 80%;
            padding-left: 10px;
        }

        .content > div {
            margin-bottom: 15px;
        }

        @media screen and (max-width: 768px) {
            .title,
            .content {
                width: 100%;
            }
        }    

        .label {
            font-weight: bold;
        }

        .section-title {
            font-size: 1.2em;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #d3d3d3;
            padding-bottom: 5px;
        }

        .fw-bold {
            font-weight: 600;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .pb-3 {
            padding-bottom: 20px;
        }

        .zsection {
            margin-bottom: 20px;
        }
    </style>
    
    <div class="extra">
        <div class="extra w-100 py-2 bg-dark d-flex justify-content-center gap-3">
            <button class="btn btn-light btn-sm" id="print"><i class="bi bi-printer"></i> Print</button>
            <button class="btn btn-light btn-sm" id="download_pdf"><i class="bi bi-filetype-pdf"></i> Download PDF</button>
            <a href="admin_userprofile.php" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left-circle"></i> Back</a>
        </div>
    </div>

    <div class="page">
        <div class="subpage">
            <table class="w-100">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="flex-container">
                                <div class="personal-info zsection">
                                    <div class="fw-bold name"><?=$resume['firstname'].' '.$resume['middlename'].' '.$resume['surname']?></div>
                                    <div><span class="label">Address:</span> <span class="address"><?=$resume['house_no'].' '.$resume['street'].' '.$resume['barangay'].' '.$resume['municipality'].' '.$resume['province']?></span></div>
                                    <div><span class="label">Contact No.:</span> <span class="mobile"><?=$resume['contact_no']?></span></div>
                                    <div><span class="label">Email:</span> <span class="email"><?=$resume['email_id']?></span></div>
                                    <br/>
                                    <div><span class="label">Birthdate:</span> <span class="birthdate"><?=$resume['birthdate']?></span></div>
                                    <div><span class="label">Age:</span> <span class="age"><?=$resume['age']?></span></div>
                                    <div><span class="label">Gender:</span> <span class="gender"><?=$resume['gender']?></span></div>
                                    <div><span class="label">Nationality:</span> <span class="nationality"><?=$resume['nationality']?></span></div>
                                </div>
                                <div class="image-container">
                                    <div class="custom-file-upload">
                                        <img src="..." class="img-thumbnail" alt="...">
                                        <input type="file" id="uploadImage" accept="image/*" onchange="previewImage();" />
                                        <label for="uploadImage">Upload Image</label>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="education-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Education</td>
                        <td class="pb-3 educations">
                        <?php
                            if($educs) {
                                foreach($educs as $educ) {
                                    ?>
                                        <div class="education mb-2">
                                            <div class="fw-bold">
                                                <span class="course"><?=$educ['educ_level']?></span>
                                            </div>
                                            <div class="institute">School Name: <?=$educ['school_name']?></div>
                                            <div class="date">
                                                <span class="working-from">Date: <?=$educ['started']?></span> – <span class="working-to"><?=$educ['ended']?></span>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                    <div class="education mb-2">
                                        <div class="fw-bold">
                                            <span class="course">None</span>
                                        </div>
                                        <div class="institute">School Name: None</div>
                                        <div class="date">
                                            <span class="working-from">Date: None</span>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                        </td>
                    </tr>
                    
                    <tr class="experience-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Experience</td>
                        <td class="pb-3 experiences">
                        <?php
                            if($exps) {
                                foreach($exps as $exp) {
                                    ?>
                                        <div class="experience mb-2">
                                            <div class="fw-bold">
                                                <span class="job-role"><?=$exp['position']?></span>
                                            </div>
                                            <div class="company">Company: <?=$exp['company']?></div>
                                            <div>
                                                <span class="working-from">Date: <?=$exp['started']?></span> – <span class="working-to"><?=$exp['ended']?></span>
                                            </div>
                                            <div class="work-description">- <?=$exp['job_desc']?></div>
                                        </div>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                    <div class="experience mb-2">
                                        <div class="fw-bold">
                                            <span class="job-role">None</span>
                                        </div>
                                        <div class="company">Company: None</div>
                                        <div>
                                            <span class="working-from">Date: None</span>
                                        </div>
                                        <div class="work-description">- None</div>
                                    </div>
                                <?php
                            }
                        ?>
                        </td>
                    </tr>

                    <br/>
                    
                    <tr class="skills-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Skills</td>
                        <td class="pb-3 skills">
                            <?php
                                if($skills) {
                                    foreach($skills as $skill) {
                                        ?>
                                            <div class="skill">* <?=$skill['skill']?></div>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                        <div class="skill">* None</div>
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        function showPrintWindow() {
            const userAgent = window.navigator.userAgent.toLowerCase();
            if (userAgent.includes("edge") || userAgent.includes("chrome")) {
                document.getElementById("print").style.display = "none";
                document.querySelector(".btn-primary").style.display = "none";
                document.getElementById("download_pdf").style.display = "none";
                document.querySelector(".btn-primary").style.display = "none";
                window.print();
                document.getElementById("print").style.display = "block";
                document.querySelector(".btn-primary").style.display = "block";
                document.getElementById("download_pdf").style.display = "block";
                document.querySelector(".btn-primary").style.display = "block";
            } 
            else {
                alert("This feature is supported only in Microsoft Edge and Google Chrome.");
            }
        }
        document.getElementById("print").addEventListener("click", showPrintWindow);

        document.getElementById("download_pdf").addEventListener("click", () => {
            html2canvas(document.querySelector('.page')).then(canvas => {
                const pdf = new jsPDF();
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 210, 297); // A4 size
                pdf.save("<?=$resume['firstname']?> - <?=$resume['resume_title']?>.pdf");
            });
        });

        function previewImage() {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.querySelector('.img-thumbnail');
                img.src = e.target.result;
                img.classList.remove('img-thumbnail');
                img.style.width = '2in';
                img.style.height = '2in';
                img.style.objectFit = 'cover';
                img.classList.add('float-start');
                document.querySelector('label[for="uploadImage"]').style.display = 'none';
            };
            reader.readAsDataURL(document.getElementById('uploadImage').files[0]);
        }
    </script>

</body>

</html>