<?php
    //include 'header.php';
    include 'functions.php';
    $sql = "SELECT * FROM company";
    $all_categorys = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <section>
        <div class="header">
            <h2>Company registration</h2>
        </div>

        <form action="company.php" method="post">
            <div >
                <select name="company_id">
                    <?php
                        while ($category = mysqli_fetch_array($all_categorys, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["company_id"]; ?>">
                        <?php echo $category["company"] ?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>