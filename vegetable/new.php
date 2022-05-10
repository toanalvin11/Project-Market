<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Add Vegetable</title>
</head>
<body>
    <?php
    require '../class/category.php';
    include './add.php';
    ?>
    <div class="container">
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <h4>Add Vegetable</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <?php
                            if ($thongbao != null) {
                            ?>
                                <p style="color : red;"><?= $thongbao ?></p>
                            <?php } ?>  
                            <label for="form">Vegetable Name:</label>
                            <input class="form-control" name="NameVege" type="text" placeholder="Orange">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="form">Unit:</label>
                                    <select type="text" name="Unit" class="form-control">
                                        <option>Kg</option>
                                        <option>Bó</option>
                                        <option>Củ</option>
                                        <option>Chai</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="form">Amount:</label>
                                    <input type="number" name="Amount" class="form-control" placeholder="20" min="0" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image:</label>
                                <input type="file" class="form-control-file" name="image" placeholder="Orange.jpg">
                            </div>
                            <input type="submit" name="AddVege" value="Add" class="btn btn-primary">
                        </div>
                        <div class="col-md-4">
                            <label for="form">Category Name:</label>
                            <select class="form-control" name="NameCate">
                                <?php
                                $listcate = category::getAll();
                                while ($row = mysqli_fetch_assoc($listcate)) {
                                ?>
                                    <option value="<?= $row['CategoryID'] ?>"><?= $row['Name'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="form">Price:</label>
                            <input class="form-control" type="number" name="Price" placeholder="5000" min="0">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

