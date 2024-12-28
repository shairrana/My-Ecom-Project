<section class="from">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-black rounded">
                <form class="p-3" method="post" action="./server/request.php" enctype="multipart/form-data">
                    <h1 class="text-center">Sing Up</h1>
                    <div class="mb-3">
                        <label for="SName" class="form-label fw-bold">Enter Name</label>
                        <input type="text" class="form-control" name="SName" placeholder="Enter Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="Semail" class="form-label fw-bold">Enter Email</label>
                        <input type="email" class="form-control" name="Semail" placeholder="Enter Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="Sphone" class="form-label fw-bold">Enter Phone Number</label>
                        <input type="text" class="form-control" name="Sphone" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="Spassword" class="form-label fw-bold">Enter Password</label>
                        <input type="password" class="form-control" name="Spassword" placeholder="Enter Your Password">
                    </div>
                    <button class="btn btn-primary fs-4 fw-bold my-3 form-control" name="signUp">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</section>