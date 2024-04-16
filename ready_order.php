<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Подтверждение заказа</title>
</head>
<body>
    <div class="mt-5 text-start" style=" margin-left: 3rem">
        <div class="row">
          <div class="col">
            <p class="fw-bold" style="font-size: 50px;">Подтвердите заказ</p>
          </div>
        </div>
    </div>
    <form action="vendor/make_order.php" method="post">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Товар</th>
                    <th scope="col">Название товара</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Количество</th> 
                    <th scope="col">Цена</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                    include('./vendor/spawn_cart_item.php');
                ?>

            </tbody>
        </table>
    
        <div class="container">
            <div class="col">
                <p class="text-start" style="font-size: 20px;"><b>Ваше имя:</b><input type="text" class="form-control" id="name" name="name" placeholder="Имя" ></p>
                <p class="text-start" style="font-size: 20px;"><b>Почта:</b> <input type="text" class="form-control" id="email" name="email" placeholder="Почта" ></p>
                <p class="text-start" style="font-size: 20px;"><b>Телефон:</b> <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон" ></p>
                <p class="text-start" style="font-size: 20px;"><b>Конечная цена:</b><?php echo $cost?></p>
                    <div class="container text-end">
                        <button class="btn btn-success" href="ready_order.php">Подтвердите ваш заказ</button>
                    </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>