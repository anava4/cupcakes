<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcake Fundraiser</title>

</head>
<body>
    <h1>Cupcake Fundraiser</h1>
    <form action="index.php" method="post">
        Your Name: <input type="text" name="name" placeholder="Please enter your name"  value="<?php if(isset($_POST['name'])) echo $_POST['name'];?> "size="35">

    <label><p>Cupcake Flavors</p>

        <?php

        $flavors = array("grasshopper" => "The Grasshopper",
            "maple" => "Whiskey Maple Bacon",
            "carrot" => "Carrot Walnut",
            "caramel" => "Salted Caramel Cupcake",
            "velvet" => "Red Velvet",
            "lemon" => "Lemon Drop",
            "tiramisu" => "Tiramisu");

        foreach ($flavors as $key => $value)
        {

            echo '<br>';
            echo "<input type='checkbox' name='flavors[]' value='".$value."'";
            //echo '<label>'.$value.'<label>';
            if(isset($_POST['flavors']) && in_array($value, $_POST['flavors']))
            {
                echo 'checked ="checked"';
            }

            echo ">$value";
        }


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $errors = []; // Initialize an error array.
            // Check for a first name:
            if (empty($_POST['name']))
            {
                $errors[] = 'You forgot to enter your name.';
            }
            //counting how many flavors are selected
            $num = count($_POST['flavors']);
            //echo $num;
            if(!isset($_POST['flavors']))
            {
                if($num<1)
                {
                    $errors[] = 'You must choose at least one flavor.';
                }
            }

            if(isset($_POST['flavors']))
            {
                $flavors = $_POST['flavors'];

            }


            if(empty($errors))
            {

                echo'<h2>Thank you ' .($_POST['name']). ' for your order.</h2>';
                echo '<h3>Order Summary: </h3>';
                echo '<ul>';

                foreach($_POST['flavors'] as $selected)
                {
                    echo "<li>".$selected ."</li>";
                }
                echo '</ul>';

                $howMany = count($flavors);
                $total = $howMany * 3.5;

                echo 'Order Total: $'.number_format($total,2);


            }

            else
            {
                echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br>';
                foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br>\n";
                }

            }
        }


        ?>
    </label>
    <br>
    <br>
    <button type="submit">Order</button>
    </form>
</body>
</html>
