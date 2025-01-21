<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Section: Design Block -->
<section class=" text-center text-lg-start col-8 mx-auto mt-5">
    <style>
        .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
            .rounded-tr-lg-0 {
                border-top-right-radius: 0;
            }

            .rounded-bl-lg-5 {
                border-bottom-left-radius: 0.5rem;
            }
        }
    </style>
    <div class="card mb-3">
        <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                    class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="height: 67vh;" />
            </div>
            <div class="col-lg-8">
                <div class="card-body py-5 px-md-5">
                    <h3 class="text-center mb-5">
                        Administrative Login
                    </h3>
                    <form action="Backend/UserLoginApi.php" method="post">
                    <?php
                    if (isset($_GET['status'])) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid Username or Password
                        </div>

                    <?php
                    }

                    ?>
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example1">Username</label>
                            <input type="text" id="form2Example1" class="form-control" name="username" />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example2">Password</label>
                            <input type="password" id="form2Example2" class="form-control"  name="password" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 col-12">Sign in</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->