<?php
    $title = "Register | Personal Profile Generator";
    require './assets/includes/header.php';
    $fn->nonAuthPage();
?>
<div class="d-flex align-items-center" style="height:100vh">
    <div class="w-100">
        <main class="form-signin w-100 m-auto bg-white shadow rounded">
            <form method="post" action="actions/register.action.php"> 
                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="./assets/images/logo.png" alt="" height="70">
                    <div>
                        <h1 class="h3 fw-normal my-1">eProfile <b>Personal Profile Generator</b></h1>
                        <p class="m-0">Create your new account</p>

                    </div>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" name="full_name" id="floatingName" placeholder="" required>
                    <label for="floatingInput"><i class="bi bi-person"></i> Full Name*</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="example123" required>
                    <label for="floatingInput"><i class="bi bi-person"></i> Username*</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email_id" id="floatingEmail" placeholder="name@example.com" required>
                    <label for="floatingInput"><i class="bi bi-envelope"></i> Email Address*</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword"><i class="bi bi-key"></i> Password*</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="confirmpw" id="floatingConfirmPW" placeholder="Confirm Password" required>
                    <label for="floatingPassword"><i class="bi bi-key"></i> Confirm Password*</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit"><i class="bi bi-person-plus-fill"></i> Register
                </button>
                <div class="d-flex justify-content-between my-3">
                    <a href="login.php" class="text-decoration-none">Login</a>
                </div>

            </form>
        </main>
    </div>
</div>
<?php
    require './assets/includes/footer.php';
?>
