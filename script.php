<?php
session_start();

STATIC $servername = "localhost";
STATIC $username = "root";
STATIC $password = "";
STATIC $dbname = "catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function connection()
{
    return $GLOBALS['conn'];
}

function calcPrice()
{
    $sql = "SELECT total FROM cart";
    $result = connection()->query($sql);
    $total = 0;

    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            $total += $row["total"];

    return $total;
}

function getProdsNumber()
{
    $sql = "SELECT name, quantity, price, total FROM cart";
    $result = connection()->query($sql);
    $total = 0;

    if ($result->num_rows > 0) {
        while ($result->fetch_assoc())
            $total++;

        return $total;
    } else return 0;
}

function displayCart()
{
    $sql = "SELECT id, name, quantity, price, total FROM cart";
    $result = connection()->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='text-align:left'>" . $row["name"] . "</td>";
            echo "<td style='text-align:left'>" . $row["quantity"] . "</td>";
            echo "<td style='text-align:right'>$ " . number_format($row["price"], 2) . "</td>";
            echo "<td style='text-align:right'>$ " . number_format($row["total"], 2) . "</td>";
            echo "<td style='text-align:center'><a href='index.php?id=" . $row["id"] . "' class='remove-btn'>Remove</a>";
            echo "</tr>";
        }

        echo "<tr>";
        echo "<td colspan='3' style='text-align:right'>Total</td>";
        echo "<td>$ " . number_format(calcPrice(), 2) . "</td>";
        echo "</tr>";
    }
}

function deleteFromCart($id)
{
    $sql = "DELETE FROM cart WHERE id = '$id'";
    connection()->query($sql);

    header("Location: index.php");
    exit();
}

function insertIntoCart($product, $price, $quantity)
{
    $price = intval(explode("$ ", strval($price))[1]);
    $total = intval($price) * intval($quantity);

    $currID = connection()->query("SELECT MAX(id) FROM cart");
    $currID = $currID->fetch_assoc();

    if ($currID["MAX(id)"] == null) $currID["MAX(id)"] = 0;
    else $id = $currID["MAX(id)"] + 1;

    $sql = "INSERT INTO cart (id, name, quantity, price, total) VALUES ('$id', '$product', '$quantity', '$price', '$total')";
    connection()->query($sql);
}

if (isset($_POST["submit"])) {
    $product = $_POST["product"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    insertIntoCart($product, $price, $quantity);
}

if (isset($_GET["id"])) {
    deleteFromCart($_GET["id"]);
}
?>
