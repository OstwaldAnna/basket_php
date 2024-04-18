<!--  извлекает и выводит информацию о заказах пользователя из базы данных, а также информацию о товарах в каждом заказе -->
<?php
    //Начало сессии и подключение к базе данных
    session_start();     
    require_once 'connect.php';

    //Получение заказов пользователя из базы данных
    $user_id = $_SESSION['user']['id'];
    $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `id_user` = '$user_id'");

    //Обработка каждого заказа и его товаров
    while($row = mysqli_fetch_assoc($orders)):?>
        <?php
            //Информация о товарах в заказе
            $position = explode(';', $row['products_info']);
            
            foreach($position as $item){
                $arr = explode(',', $item);
                array_push($test, $arr);
            }
        ?> 
        <!-- Вывод информации о заказе в таблице -->
        <tr>
            <th scope="row"></th>
            <td><?php echo $row['date']?></td>
            <td><?php echo count($position)?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['status']?></td>
            <td><?php echo $row['name']?></td>
            <td><button type="button" class="btn btn-sm btn-warning">Удалить заказ</button></td>
        </tr>
    <?php endwhile;?>    