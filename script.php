<?php
session_start();

function getTotal()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, quantity, price, total FROM cart";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error executing query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $total = 0;
            while ($row = $result->fetch_assoc()) {
                $total++;
            }
            return $total;
        } else {
            return 0;
        }
    }
    $conn->close();
}

function displayCart()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, quantity, price, total FROM cart";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error executing query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='text-align:left'>" . $row["name"] . "</td>";
                echo "<td style='text-align:left'>" .
                    $row["quantity"] .
                    "</td>";
                echo "<td style='text-align:right'>$ " .
                    number_format($row["price"], 2) .
                    "</td>";
                echo "<td style='text-align:right'>$ " .
                    number_format($row["total"], 2) .
                    "</td>";
                echo "<td style='text-align:center'><a href='index.php?id=" .
                    $row["id"] .
                    "' class='remove-btn'>Remove</a>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='3' style='text-align:right'>Total</td>";
            echo "<td>$ " . number_format(getTotalPrice(), 2) . "</td>";
            echo "</tr>";
        }
    }
    $conn->close();
}

if (isset($_GET["id"])) {
    removeData($_GET["id"]);
}

function removeData($id)
{
    //make a function to remove data from table
    $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "catalog";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM cart WHERE id = '$id'";

    $conn->query($sql);

    $conn->close();
}

function insertData($product, $price, $quantity)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $price = explode("$ ", strval($price))[1];
    $total = intval($price) * intval($quantity);

    $maxId = "SELECT MAX(id) FROM cart";
    $maxId = $conn->query($maxId);
    $maxId = $maxId->fetch_assoc();

    if ($maxId["MAX(id)"] == null) {
        $maxId["MAX(id)"] = 0;
    }
    $id = $maxId["MAX(id)"] + 1;
    $sql = "INSERT INTO cart (id, name, quantity, price, total) VALUES ('$id', '$product', '$quantity', '$price', '$total')";

    $conn->query($sql);
    $conn->close();
}

if (isset($_POST["submit"])) {
    $product = $_POST["product"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    insertData($product, $price, $quantity);
}

function getTotalPrice()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catalog";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT total FROM cart";

    $result = $conn->query($sql);

    $total = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total += $row["total"];
        }
    }

    $conn->close();

    return $total;
}
?>     ?>