<!-- сохраняет данные из $_POST в массиве $_SESSION['cart'] -->
<?php
    $counter = 0;
    session_start();
    foreach($_POST as $key => $value) {
        $_SESSION['cart'][$counter]['quantity'] = $value;
        $counter++;
    }

    header('Location: ../ready_order.php'); 
?>