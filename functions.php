<?php 
// DB connection
$db = mysqli_connect('localhost', 'root', 'root', 'inventoryy');
$table = 'product';
$field = 'type';

// Prints the array 
echo '<pre>';
var_dump( $_POST);
echo '</pre>';


//------------------------------ EMPLOYEE-------------------------------------------

function createEmployee($db, $name, $lastname, $email, $adress, $id)
{
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $adress = $_POST["adress"];
    $id = $_POST["place_id"];

    $query = " INSERT INTO employee ( `name`, lastname, email, adress, place_id) VALUES (?, ?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: employee.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $name, $lastname, $email, $adress, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createEmployee($db, $name, $lastname, $email, $adress, $id);
}

//------------------------------ HARDWARE -------------------------------------------

function createHardware($db, $type, $consumption, $ram, $harddisk, $screensize, $year)
{
    $type = $_POST["type"];
    $consumption = $_POST["consumption"];
    $ram = $_POST["ram"];
    $harddisk = $_POST["harddisk"];
    $screensize = $_POST["screensize"];
    $year = $_POST["year"];

    $query = " INSERT INTO hardware ( `type`, consumption, ram, harddisk, screensize, `year`) VALUES (?, ?, ?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: hardware.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $type, $consumption, $ram, $harddisk, $screensize, $year);
    $ok = mysqli_stmt_execute($stmt);
    if( !$ok ){
        var_dump( mysqli_error_list( $db) );
    }   
     mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createHardware($db, $type, $consumption, $ram, $harddisk, $screensize, $year);
}


//------------------------------ POWER_DOMESTICS -------------------------------------------

function createPowerDomestics($db, $type, $consumption, $screensize)
{
    $type = $_POST["type"];
    $consumption = $_POST["consumption"];
    $screensize = $_POST["screensize"];

    $query = " INSERT INTO powerdevice ( type, consumption, screensize) VALUES (?, ?, ?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: power_domestics.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $type, $consumption, $screensize);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createPowerDomestics($db, $type, $consumption, $screensize);
}



//------------------------------ FURNITURE-------------------------------------------

function createFurniture($db, $type)
{
    $type = $_POST["type"];

    $query = " INSERT INTO furniture ( type) VALUES (?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: furniture.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createFurniture($db, $type);
}


/*
//------------------------------ COMPANY-------------------------------------------


function createCompany($db, $company)
{
    $company = $_POST["company"];

    $query = " INSERT INTO company (company) VALUES (?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: company.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $company);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createCompany($db, $company);
}
*/

//------------------------------ INVENTORY -------------------------------------------


function createInventory($db, $product_id, $type, $serial, $bought, $warranty, $owner, $employee_id)
{
    $product_id = $_POST["product_id"];
    $type = $_POST["type"];
    $serial = $_POST["serial"];
    $bought = $_POST["bought"];
    $warranty = $_POST["warranty"];
    $owner = $_POST["owner"];
    $employee_id = $_POST["employee_id"];

    $query = " INSERT INTO inventory (product_id, type, serial, bought, warranty, owner, employee_id) VALUES (?, ?, ?, ?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: inventory.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $product_id, $type, $serial, $bought, $warranty, $owner, $employee_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createInventory($db, $product_id, $type, $serial, $bought, $warranty, $owner, $employee_id);
}


//------------------------------ PRODUCTS -------------------------------------------


function createProducts($db, $product_id, $type, $manufactor, $modelNbr)
{
    $product_id = $_POST["product_id"];
    $type = $_POST["type"];
    $manufactor = $_POST["manufactor"];
    $modelNbr = $_POST["modelNbr"];

    $query = " INSERT INTO products (product_id, type, manufactor, modelNbr) VALUES (?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $query))
    {
        header("location: products.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $product_id, $type, $manufactor, $modelNbr);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}

if (isset($_POST["submit"]))
{
    createProducts($db, $product_id, $type, $manufactor, $modelNbr);
}









function set_and_enum_values( $db, $table , $field )
{
    $query = "SHOW COLUMNS FROM `$table` LIKE '$field'";
    $result = mysqli_query( $db, $query ) or die( 'Error getting Enum/Set field ');
    $row = mysqli_fetch_row($result);

    if(stripos($row[1], 'enum') !== false || stripos($row[1], 'set') !== false)
    {
        $values = str_ireplace(array('enum(', 'set('), '', trim($row[1], ')'));
        $values = explode(',', $values);
        $values = array_map(function($str) { return trim($str, '\'"'); }, $values);
    }

    return $values;
}




?>