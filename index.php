<?php 
	require 'db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/master.css">
    <title>Orders</title>
</head>

<body>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<div class="header">
    <div class="logo"><img src="logo6.png"></div>
    <div class="user"><?php echo $_SESSION['logged_user']->login; ?><a href="logout.php">logout</a></div>

</div>
<div class="main_body">


    <div class="menu">
        <div class="munu_item"><a href="#">Orders</a></div>
        <div class="munu_item"><a href="#">Complit orders</a></div>
        <div class="munu_item"><a href="#">Phone numbers</a></div>
        <div class="munu_item"><a href="#">Comps IP</a></div>
    </div>
    <div class="pole">
        Авторизован! <br/>
        Привет, ! Ты в группе <?php echo $_SESSION['logged_user']->group; ?><br/>
        <div class="order">
            <div class="order_body">
                <div class="order_menu">
                    <div class="number">number</div>
                    <div class="date">date</div>
                    <div class="owner">owner</div>
                    <div class="client">client</div>
                </div>
                <div class="order_text">
                    text
                </div>
            </div>
            <div class="order_status">
                <div class="st">Status</div>
            </div>
        </div>
        <div class="order">
            <div class="order_body">
                <div class="order_menu">
                    <div class="number">number</div>
                    <div class="date">date</div>
                    <div class="owner">owner</div>
                    <div class="client">client</div>
                </div>
                <div class="order_text">
                    text
                </div>
            </div>
            <div class="order_status">
                <div class="st">Status</div>
            </div>
        </div>
        <div class="order">
            <div class="order_body">
                <div class="order_menu">
                    <div class="number">number</div>
                    <div class="date">date</div>
                    <div class="owner">owner</div>
                    <div class="client">client</div>
                </div>
                <div class="order_text">
                    text
                </div>
            </div>
            <div class="order_status">
                <div class="st">Status</div>
            </div>
        </div>
        <div class="order">
            <div class="order_body">
                <div class="order_menu">
                    <div class="number">number</div>
                    <div class="date">date</div>
                    <div class="owner">owner</div>
                    <div class="client">client</div>
                </div>
                <div class="order_text">
                    text
                </div>
            </div>
            <div class="order_status">
                <div class="st">Status</div>
            </div>
        </div>
        <div class="order">
            <div class="order_body">
                <div class="order_menu">
                    <div class="number">number</div>
                    <div class="date">date</div>
                    <div class="owner">owner</div>
                    <div class="client">client</div>
                </div>
                <div class="order_text">
                    text
                </div>
            </div>
            <div class="order_status">
                <div class="st">Status</div>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="header">
        <div class="logo"><img src="logo6.png"></div>


    </div>
    <div class="main_body">
Вы не авторизованы<br/>
<a href="/login.php">Авторизация</a>
<a href="/signup.php">Регистрация</a>
<?php endif; ?>
</div>
<div class="footer">
    <div class="cpr">© Artem2J, 2020</div>

</div>

</body></html>
