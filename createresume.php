<?php
    $title = "Create Resume | Personal Profile Generator";
    require './assets/includes/header.php';
    require './assets/includes/navbar.php';
    $fn->authPage();
?>

<div class="container">
    <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
        <div class="d-flex justify-content-between border-bottom">
            <h5>Create Resume</h5>
            <div>
                <a href="index.php" class="text-decoration-none"><i class="bi bi-arrow-left-circle"></i> Back</a>
            </div>
        </div>

        <div>
            <form action="actions/createresume.action.php" method="post" class="row g-3 p-3">
                <div class="col-md-6">
                    <label class="form-label">Resume Title</label>
                    <input type="text" name="resume_title" placeholder="Actor" value="resume<?=time()?>" class="form-control" required>
                </div>
                <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                <div class="col-md-6">
                    <label class="form-label">Surname*</label>
                    <input type="text" name="surname" placeholder="Dalisay" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">First Name*</label>
                    <input type="text" name="firstname" placeholder="Cardo" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Middle Name (optional)*</label>
                    <input type="text" name="middlename" placeholder="Batumbakal" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Age*</label>
                    <input type="text" name="age" placeholder="19/19 yrs old" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Birthdate*</label>
                    <input type="text" name="birthdate" placeholder="January 4, 2003/Jan 4, 2003/01 04 2003" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender (optional)*</label>
                    <input type="text" name="gender" placeholder="Male/Female/Others/They/Them" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nationality*</label>
                    <input type="text" name="nationality" placeholder="Filipino/Japanese" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact/Phone Number*</label>
                    <input type="number" min="1111111111" name="contact_no" placeholder="+63123 456 7890 or 091234567890" max="9999999999"
                        class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email*</label>
                    <input type="email" name="email_id" placeholder="cardodalisay@batumbakal.com" class="form-control" required>
                </div>

                <h5 class="mt-3 text-secondary"><i class="bi bi-geo-alt"></i> Address</h5>
                <div class="col-md-6">
                    <label for="inputProvince" class="form-label"> City/Province*</label>
                    <input type="text" class="form-control" id="inputProvince" name="province" placeholder="Quezon/Quezon, Province" required>
                </div>
                <div class="col-md-6">
                    <label for="inputMunicipality" class="form-label"> Municipality*</label>
                    <input type="text" class="form-control" id="inputMunicipality" name="municipality" placeholder="Lucena/Candelaria/Lucena, City/Candelaria, Quezon" required>
                </div>
                <div class="col-md-6">
                    <label for="inputBarangay" class="form-label"> Barangay*</label>
                    <input type="text" class="form-control" id="inputBarangay" name="barangay" placeholder="Malabanban Sur/Malabanban Sur, Candelaria" required>
                </div>
                <div class="col-md-6">
                    <label for="inputStreet" class="form-label"> Street*</label>
                    <input type="text" class="form-control" id="inputStreet" name="street" placeholder="Nadres/Nadres Street" required>
                </div>
                <div class="col-md-6">
                    <label for="inputHouse No." class="form-label"> House No.*</label>
                    <input type="text" class="form-control" id="inputHouse No." name="house_no" placeholder="123/123 Nadres" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Add
                        Resume</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<?php
    require './assets/includes/footer.php';
?>