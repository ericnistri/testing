<?php
    include 'header.php';
    include 'functions.php';
    //$sqlhardware = "SELECT * FROM products";
    //$all_hardware = mysqli_query($db, $sqlhardware);
    $sql = "SELECT * FROM inventory_type";
    $all_categorys = mysqli_query($db, $sql);
    //set_and_enum_values( $db, $table , $field );

/*
                <select name="type">
                    <?php
                    $options = set_and_enum_values($db, 'products', 'type');
                    foreach($options as $option):
                        $selected = (isset($row['type']) && $row['type'] == $option) ? ' selected="selected"' : '';
                    ?>
                    <option <?php echo $selected; ?>><?php echo $option ?></option>
                    <?php endforeach; ?>
                </select>

*/

?>

    <section>
        <div class="header">
            <h2>Products</h2>
        </div>

        <form action="products.php" method="post">
            <div>



            <select name="type">
                    <?php
                        while ($category = mysqli_fetch_array($all_categorys, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["key"]; ?>">
                        <?php echo $category["key"]?>
                    </option>
                    <?php
                        endwhile;
                    ?>
                </select>


       
                
                <input type="text" name="manufactor" placeholder="Manufactor">
                
                <input type="text" name="modelNbr" placeholder="Model Number">
                
                
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html> 