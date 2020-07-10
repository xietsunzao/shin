<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shin - Dynamic Library for CI3</title>
</head>

<body>
    <h1>Welcome</h1>
    <p>
        Simple dynamic join tables:
    </p>
    <u>
        <li>2 Join Tables (product & category)
            <p>
                <?php echo anchor('example', 'click here!') ?>
            </p>
        </li>
        <li>Join Tables & Where statement [PK = id_product] (product & category)
            <p>
                <?php echo anchor('example/where/1', 'click here!') ?>
            </p>
        </li>
        <li> Multi Join Tables (product, category & orders)
            <p>
                <?php echo anchor('multi', 'click here!') ?>
            </p>
        </li>
        <li> Complex Join Tables (sale, product, category & orders)
            <p>
                <?php echo anchor('complex', 'click here!') ?>
            </p>
        </li>

        <li> Custom Join Table
            <!-- <p>
                <?php echo anchor('complex', 'click here!') ?>
            </p> -->
        </li>
    </u>
</body>

</html>