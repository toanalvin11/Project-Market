<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORY</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <?php
    include './add.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="./index.php" method="POST" autocomplete="off">
                    <div class="form-outline">
                        <label class="form-label" >Name:</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-outline">
                        <label class="form-label">Description</label>
                        <input type="text" name="des" class="form-control" />
                    </div>
                    <br>
                    <input type="submit" name="add" value="Add" class="btn btn-primary">
                    <?php if($thongbao != null) { ?>
                        <div style="color: red;"><?= $thongbao ?></div>
                    <?php } ?>
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3>Category</h3>
                </div>
                <div class="row">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th >Name</th>
                                <th >Description</th>
                            </tr>
                        </thead>
                        <?php
                        $liscategory = category::getAll();
                        if ($liscategory != null) {
                            $i = 1;
                            while ($category = mysqli_fetch_assoc($liscategory)) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td data-th="STT"><?= $i++ ?></td>
                                        <td data-th="Price"><?= $category['Name'] ?></td>
                                        <td data-th="Subtotal"><?= $category['Description'] ?></td>
                                    </tr>
                                </tbody>
                        <?php }
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

