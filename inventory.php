<?php
    include 'header.php';
    include 'functions.php';
    $sqlsqlproduct_id = "SELECT * FROM inventory";
    $all_products = mysqli_query($db, $sqlproduct_id);
    $sqlcompany = "SELECT * FROM company";
    $all_company= mysqli_query($db, $sqlcompany);
    $sqlemployee = "SELECT * FROM employee";
    $all_employee= mysqli_query($db, $sqlemployee);

?>

    <section>
        <div class="header">
            <h2>Inventory</h2>
        </div>

        <form action="hardware.php" method="post">
            <div>

                <select name="inventory">
                    <?php
                        while ($category = mysqli_fetch_array($all_products, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["inventory"]; ?>">
                        <?php echo $category["product_id"] ?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <select name="type">
                    <?php
                    $options = set_and_enum_values($db, 'products', 'type');
                    foreach($options as $option):
                        $selected = (isset($row['type']) && $row['type'] == $option) ? ' selected="selected"' : '';
                    ?>
                    <option <?php echo $selected; ?>><?php echo $option ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="inventory">
                    <?php
                        while ($category = mysqli_fetch_array($all_company, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["company"]; ?>">
                        <?php echo $category["company"]  ?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>

                <select name="inventory">
                    <?php
                        while ($category = mysqli_fetch_array($all_employee, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["employee"]; ?>">
                        <?php echo $category["name"] ?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>
                
                <input type="text" name="serial" placeholder="Serial">
                
                <input type="text" name="bought" required placeholder="Bought">
               
                <input type="text" name="warranty" required placeholder="Warranty">
                
                
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>