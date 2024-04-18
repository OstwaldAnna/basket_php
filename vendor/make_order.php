<!-- обрабатывает данные из формы, сохраняет информацию о заказе в базе данных и очищает корзину пользователя. -->
<?php
    session_start();
    require_once 'connect.php';

    //Получение данных из POST-запроса
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    //Обработка корзины товаров
    $counter = 0;
    foreach($_POST as $key => $value) {

        if (strpos($key, "quantity_input_") !== false){
            $_SESSION['cart'][$counter]['quantity'] = $value;
            $counter++;
        } 
    }

    //Формирование строки с информацией о товарах
    $str = "";
    $count = 0;
    foreach($_SESSION['cart'] as $item){
        if($count == 0){
            $str = $str . $item['id'] . "," . $item['quantity'];   
        }
        else {
            $str = $str . ";" . $item['id'] . "," . $item['quantity'];
        }
        $count++;
    }

    //Вставка заказа в базу данных
    $id_user = $_SESSION['user']['id'];
    $date_now = date("Y-m-d H:i:s");
    $status = "Ожидает подтверждения";
    mysqli_query($connect, "INSERT INTO `orders` (`id`, `id_user`, `name`, `email`, `phone`, `date`, `status`, `products_info`)
    VALUES (NULL, '$id_user', '$name', '$email', '$phone', '$date_now', '$status', '$str')");

    //Очистка корзины в сессии
    unset($_SESSION['cart']);

    header('Location: ../myorders.php')
?>