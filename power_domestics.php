<?php
    include 'header.php';
    include 'functions.php';
    $sql = "SELECT * FROM powerdevice";
    $all_categorys1 = mysqli_query($db, $sql);



?>

    <section>
        <div class="header">
            <h2>Powered Device</h2>
        </div>

        <form action="power_domestics.php" method="post">
            <div>
                <input type="text" name="type" required placeholder="Type">
                
                <input type="text" name="consumption" required placeholder="Consumption">
                
                <input type="text" name="screensize" placeholder="Screensize">
                
                
                <div>
                    <button type="submit" class="btn" name="submit">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>