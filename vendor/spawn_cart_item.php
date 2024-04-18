<!-- формирует таблицу с продуктами из корзины пользователя, извлекая информацию о каждом продукте из базы данных и обновляя итоговую стоимость заказа -->
<?php 
    //Подключение к базе данных и инициализация переменных
    require_once 'connect.php';
    $numberOfPositions = 0;
    
    //Проверка наличия данных в сессии и обработка корзины
    if(isset($_SESSION['cart'])):
        $cost = 0;
        //Обработка каждого элемента корзины
        foreach($_SESSION['cart'] as $item):  
            $numberOfPositions++;  
            //Запрос к базе данных для получения информации о продукте
            $id = $item['id'];
            $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$id'");
            //Вывод информации о продукте в таблице
            while ($row = mysqli_fetch_assoc($product)):
                //Обновление итоговой стоимости заказ
                $cost = $cost + $row['price']?>
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="(el = document.getElementById('qwerty')).checked = !el.checked">
                            <label class="form-check-label" for="same-address"></label>
                        </div>
                    </th>
                    <td>
                        <img width="100" height="100" alt="logo" src="/resources/image/<?php echo $row['image']?>">
                    </td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['about']?></td>
                    <td><input type="number" min="1" name="quantity_input_<?php echo $numberOfPositions?>" value="<?php echo $item['quantity']?>"></td>
                    <td><?php echo $row['price']?></td>
                </tr>
        <?php endwhile; endforeach; endif;?>
    <thead>
        <tr class="fw-bold" style="font-size: 20px;">
            <th scope="row"></th>
            <td colspan="2"></td>
            <td></td>
            <td>Итоговая цена:</td>
            <td><?php echo $cost?></td>
        </tr>
    </thead>