<?php
    $title = "Login | Personal Profile Generator";
    require './assets/includes/header.php';
    $fn->nonAuthPage();
?>
<div class="d-flex align-items-center" style="height:100vh">
    <div class="w-100">
        <main class="form-signin w-100 m-auto bg-white shadow rounded">
            <form method="post" action="actions/login.action.php">
                <div class="d-flex gap-2 justify-content-center">
                    <img class="mb-4" src="./assets/images/logo.png" alt="" height="70">

                    <div>
                        <h1 class="h3 fw-normal my-1">eProfile <b>Personal Profile Generator</b></h1>
                        <p class="m-0">Welcome</p>

                    </div>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="floatingEmail" placeholder="example123" required>
                    <label for="floatingInput"><i class="bi bi-envelope"></i> Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword"><i class="bi bi-key"></i> Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Login
                    <i class="bi bi-box-arrow-in-right"></i>
                </button>
                <div class="d-flex justify-content-between my-3">
                    <a href="forgot-password.php" class="text-decoration-none">Forgot Password ?</a>
                    <a href="register.php" class="text-decoration-none">Register</a>
                </div>
            </form>
        </main>
    </div>
</div>
<?php
    require './assets/includes/footer.php';
?>
