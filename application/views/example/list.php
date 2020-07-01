<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shin - Dynamic Join Tables</title>
</head>
<?= $title ?>

<body>
    <table style="border:1px solid;">
        <thead>
            <th>No</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($product as $r) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r->product_name ?></td>
                    <td><?= $r->category_name ?></td>
                    <td><?= $r->price ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>