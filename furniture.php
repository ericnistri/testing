<?php
    include 'header.php';
    include 'functions.php';
    $sql = "SELECT * FROM furniture";
    $all_categorys1 = mysqli_query($db, $sql);



?>

    <section>
        <div class="header">
            <h2>Furniture</h2>
        </div>

        <form action="furniture.php" method="post">
            <div>
            <select name="type">
                    <?php
                    $options = set_and_enum_values($db, 'products', 'type');
                    foreach($options as $option):
                        $selected = (isset($row['type']) && $row['type'] == $option) ? ' selected="selected"' : '';
                    ?>
                    <option <?php echo $selected; ?>><?php echo $option ?></option>
                    <?php endforeach; ?>
                </select>
                
                
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>