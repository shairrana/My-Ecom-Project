<?php include("./com/comm.php") ?>
<section class="from">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-black rounded">
                <form class="p-3" method="post" action="./server/request.php" enctype="multipart/form-data">
                    <h1 class="text-center">Add Product</h1>
                    <div class="mb-3">
                        <label for="productName" class="form-label fw-bold">Product Name</label>
                        <input type="text" class="form-control" name="productName" placeholder="Enter Product Name">
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label fw-bold">Product Price</label>
                        <input type="text" class="form-control" name="productPrice" placeholder="Enter Product Price">
                    </div>
                    <div class="mb-3">
                        <label for="productImg" class="form-label fw-bold">Product Image</label>
                        <input type="file" class="form-control" name="productImg" placeholder="Enter Product Price">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label fw-bold">Select Category</label>
                        <?php include("./client/selectcategory.php") ?>
                        <select name="categorys" class="form-control">
                            <option value="">Select</option>
                            <?php
                            if ($result) {
                                foreach ($result as $res) {
                                    $categoryId = $res['id'];
                                    $categoryName = $res['categoryName'];
                                    echo "<option value='$categoryId'>$categoryName</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <button class="btn btn-primary fs-4 fw-bold my-3 form-control" name="upload">Upload</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include("./client/getProductDetails.php");
                        if ($result) {
                            foreach ($result as $res) {
                                $pId = $res['productId'];
                                $pName = $res['Pname'];
                                $pPrice = $res['Pprice'];
                                $pImage = $res['Pimage'];
                                $categoryId = $res['CategoryId'];
                                echo "<tr>
                                   <td>$pId</td>
                                   <td>$pName</td>
                                   <td>$pPrice</td>
                                   <td><img src='$pImage' style='width:100px; height: 100px;'></td>
                                   <td>
                                   <a href='?update=$pId' class='btn btn-primary text-decoration-none text-white'>Update</a>
                                   </td>
                                   <td>
                                   <form action='./server/request.php' method='post'>
                                   <input type='hidden' name='hiddenValue' value='$pId'>
                                   <button class='btn btn-danger' name='delete-btn'>Delete</button>
                                   </form>
                                   </td>
                                   <tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>