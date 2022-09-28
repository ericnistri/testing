<?php
    include 'header.php';
    include 'functions.php';

?>

    <section>
        <div class="header">
            <h2>Hardware registration</h2>
        </div>

        <form action="hardware.php" method="post">
            <div>


                <select name="hardware_id">
                    <?php
                    $options = set_and_enum_values($db, 'products', 'type');
                    foreach($options as $option):
                        $selected = (isset($row['type']) && $row['type'] == $option) ? ' selected="selected"' : '';
                    ?>
                    <option <?php echo $selected; ?>><?php echo $option ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="text" name="consumption" required placeholder="Consumption">
               
                <input type="text" name="ram" required placeholder="RAM">
                
                <input type="text" name="harddisk" required placeholder="Harddisk">
                
                <input type="text" name="screensize" required placeholder="Screensize">
                
                <input type="text" name="year" required placeholder="Year">
                
                
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>