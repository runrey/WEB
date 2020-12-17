<?php
//starting of sessions
session_start();

//including necessary files
include "connect.php";
include "models/ColoredSlates.php";

//if user not logged in, this page will not be showed
if(!isset($_SESSION['username'])) header("Location: login.php");

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $slate = "";

    //Switch for action with cart
    switch ($action){
        //case when user want to add to a cart
        case "add":
            $sql = mysqli_query($link, "SELECT * FROM products WHERE prod_id = ".$_GET['id']);
            if ($sql->num_rows > 0) $row = $sql->fetch_assoc();
            $toti = 0;
            $cDel = 1.0;
            $cCol = $_GET['color'] != "Classic" ? 1.2 : 1.0;
            if(isset($_GET['delivery'])) {
                $cDel = $_GET['delivery'] == 1 ? 1.2 : 1.0;
            }
            $cPrice = $row['prod_price'];
            $toti = $cPrice * $cCol * $cDel * $_GET['amount'];

            if(isset($_GET['delivery'])){
                $slate = new ColoredSlates($row['prod_name'], $cPrice, $_GET['color'], $_GET['amount'], $_GET['delivery']);
            }
            if(!isset($_GET['delivery'])){
                $slate = new ColoredSlates($row['prod_name'], $cPrice, $_GET['color'], $_GET['amount'], 0);
            }
            $add = mysqli_query($link, "INSERT INTO orders(prod_id, user_id, quantity, color, total_price, delivery) VALUES (" .$_GET['id']. ", " .$_SESSION['id'].", " .$slate->getAmount(). ", '" .$slate->getColor(). "', " .$toti. ", " .$slate->getDelivery(). ")" );
            break;

        //case when user want to delete all items from his cart
        case "clear":
            $clear = mysqli_query($link, "DELETE FROM orders WHERE user_id = ". $_SESSION['id']);
            break;

        //case when user want to delete particular item from his cart
        case "delete":
            $delete = mysqli_query($link, "DELETE FROM orders WHERE order_id = ". $_GET['id']);
            break;

        //case when user is ready to order it
        case "order":
            $order = mysqli_query($link, "UPDATE orders SET isOrdered=1");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping cart</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
</head>
<body>
<!-- Top navigation -->
<header>
    <div class="top_line">
        <div><a href="index.php" target="blanck" class="logo"><img src="img/logo.png" alt="logo" title="go home"></a></div>
    </div>
    <p id="day"></p>
    <div class="reg_auth">
        <div>
            <a href="myprofile.php" class="logged"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo $_SESSION['username']; ?></a>
            <a href="index.php?logout" class="logged"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            <a href="cart.php" class="logged"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping cart</a>
        </div>
    </div>

    <nav>
        <div class="topnav">
            <a href="index.php">HOME</a>
            <a href="about.php">About Us</a>
            <a href="products.php">Products</a>
            <a href="contacts.php">Contacts</a>
            <a href="news.php">News</a>
        </div>
    </nav>
</header>

    <!-- Main content -->
    <div class="container">
        <h1>Your cart</h1>
        <table>
            <tr>
                <th>Ordered</th>
                <th>Product</th>
                <th>Color</th>
                <th>Price</th>
                <th>Delivery</th>
                <th><a href="cart.php?action=clear" class="cl">Clear <i class="fa fa-times" aria-hidden="true"></i></a></th>
            </tr>
            <?php
            $result = mysqli_query($link, "SELECT * FROM orders, products WHERE orders.user_id = " .$_SESSION['id']. " AND products.prod_id = orders.prod_id");
            if ($result->num_rows > 0) {
                //Show data about items in cart of current user
                $total = 0;
                while ($items = $result->fetch_assoc()) {
                    $isOrdered = $items['isOrdered'] == 1 ? "Yes" : "No";
                    $delivery = $items['delivery'] == 1 ? "Yes" : "No";
                    $cfColor = $items['color'] != "Classic" ? 1.2 : 1.0;
                    $cfDelivery = $items['delivery'] == 1 ? 1.2 : 1.0;
                    $price = $items['prod_price'];
                    $small_total = $price * $cfColor * $cfDelivery * $items['quantity'];
                    $total += $small_total;
                    print '
                        <tr>
                            <td rowspan="2">' . $isOrdered . '</td>
                            <td rowspan="2">' . $items["prod_name"] . '</td>
                            <td rowspan="2">' . $items["color"] . '</td>
                            <td>' . $items["quantity"] . ' x ' . $items["prod_price"] . ' &#8376;</td>
                            <td rowspan="2">' . $delivery . '</td>
                            <th rowspan="2"><a href="cart.php?action=delete&id=' . $items["order_id"] . '" class="cl">Delete <i class="fa fa-trash" aria-hidden="true"></i></a></th>
                        </tr>
                        <tr>
                            <td>= ' . $small_total . ' &#8376;</td>
                        </tr>
                        ';
                }

                echo '<tr><th id="total" colspan="6">Total: ' . $total . ' &#8376;</th></tr>';
                echo "</table>";
                echo "<a href=\"cart.php?action=order\" class=\"buy\">Order all</a>";
            }
            else
            {
                echo '<tr><td class="empty" colspan="6"><b>No items on your cart</b></td></tr>';
            }
            ?>
    </div>

    <!-- Footer -->
    <footer>
        <pre>Made by Bolatkanov Yernur IT-1902</pre>
    </footer>

    <!-- Hidden navbar -->
    <div id="navbar">
        <a href="index.php">HOME</a>
        <a href="about.php">About Us</a>
        <a href="products.php">Products</a>
        <a href="contacts.php">Contacts</a>
        <a href="news.php">News</a>
    </div>

    <!-- Including custom js file and bootstrap js files -->
    <script type="text/javascript" src="js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script src="https://use.fontawesome.com/99e1cb3fcf.js"></script>
</body>
</html>