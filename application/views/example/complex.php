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
            <th>Total Order</th>
            <th>Order Date</th>
            <th>Date Sale</th>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($order as $r) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r->product_name ?></td>
                    <td><?= $r->category_name ?></td>
                    <td><?= $r->price ?></td>
                    <td><?= $r->total_order ?></td>
                    <td><?= $r->order_date ?></td>
                    <td><?= $r->date_sale ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>