<?php
    
    $name = '';
    $meldung = '';

    require_once('db_inc.php');
    require_once('connect.php');
    

    $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    if(isset($_POST['senden']))
    {
        $name = htmlspecialchars($_POST['name']);

        if(!empty($name))
        {
            $prepStatTest = $db -> prepare("INSERT INTO $tableTest (name) VALUES (:name)");
            $prepStatTest -> bindParam(':name', $name);
        

            $prepStatTest -> execute();
            $prepStatTest -> closeCursor();

            $meldung = '<p class="okmeldung>Datensätze wurden gespeichert</p>';

            $name = '';
        }
        else
        {
            $meldung = '<p class="fehlermeldung"> Fehler </p>';
        }
    }
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
            <h2>Test registration</h2>
        </div>

        <form action="test.php" method="post">
            <div>
                <input type="text" name="name" required placeholder="name">
            
                <div>
                    <button type="submit" class="btn" name="senden">Create</button>
                </div>
            </div>
        </form>
    </section>
</body>
</html>