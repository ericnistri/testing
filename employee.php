<?php
    include 'header.php';
    include 'functions.php';
    $sql = "SELECT * FROM place";
    $all_categorys = mysqli_query($db, $sql);
?>

    <section>
        <div class="header">
            <h2>Employee registration</h2>
        </div>

        <form action="employee.php" method="post">
            <div>
                <input type="text" name="name" required placeholder="name">
                <input type="text" name="lastname" required placeholder="lastname">
                <input type="text" name="email" required placeholder="email">
                <input type="text" name="adress" required placeholder="adress">
                <select name="place_id">
                    <?php
                        while ($category = mysqli_fetch_array($all_categorys, MYSQLI_ASSOC)):;
                    ?>
                    <option value="<?php echo $category["place_id"]; ?>">
                        <?php echo $category["zip"] . " " . $category["place"] ?>
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