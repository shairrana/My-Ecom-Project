<?php
include("./com/connection.php");
$showUser = $conn->prepare("SELECT * FROM userdata");
$showUser->execute();
$result = $showUser->fetchAll();
?>
<section class="table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone Number</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result) {
                            foreach ($result as $res) {
                                $userId = $res['id'];
                                $userName = $res['name'];
                                $userEmail = $res['email'];
                                $userPhone = $res['phone'];
                                echo "<tr>
                                   <td>$userId</td>
                                   <td>$userName</td>
                                   <td>$userEmail</td>
                                   <td>$userPhone</td>
                                   <td>
                                   <form action='./server/request.php' method='post'>
                                   <input type='hidden' name='userId' value='$userId'>
                                   <button class='btn btn-danger' name='userDelete'>Delete</button>
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