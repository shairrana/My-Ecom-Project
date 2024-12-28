<section class="from">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-black rounded">
                <form class="p-3" method="post" action="./server/request.php" enctype="multipart/form-data">
                    <h1 class="text-center">Login</h1>
                    <div class="mb-3">
                        <label for="Lemail" class="form-label fw-bold">Enter Email</label>
                        <input type="email" class="form-control" name="Lemail" placeholder="Enter Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="Lpassword" class="form-label fw-bold">Enter Password</label>
                        <input type="password" class="form-control" name="Lpassword" placeholder="Enter Your Password">
                    </div>
                    <button class="btn btn-primary fs-4 fw-bold my-3 form-control" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>