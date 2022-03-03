<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php if (isset($title)) echo $title ?></title>
</head>
    <body>
    <h1 class="PageName"> Product List </h1>

    <div class="buttons">
                <div class="rightcol">
                    <form method="post">
                        <a href="http://mvctask/addProduct" class="btn">ADD</a>
                        <input type="submit" id="delete-product-btn" value="Mass Delete" class="up">

                </div>
            </div>
            <div class="hrLine2">
                <hr class="hrLine" style="border: 2px solid;">
            </div>
            <ul class="products">
                <?php if (isset($products)) {
                    foreach ($products as $product):?>
                        <li class="product-wrapper">
                            <div class="product">
                                <input type="checkbox" name="SKU[]" value='<?php echo $product['SKU'];?>'>
                                <p><?php echo $product['SKU'];?></p>
                                <p><?php echo $product['Name'];?></p>
                                <p><?php echo number_format($product['Price'], 2);?>$</p>
                                <?php if(isset($product['Size'])){ ?>
                                    <p>Size: <?php echo $product['Size'];?> MB</p>
                                <?php } ?>
                                <?php if(isset($product['Weight'])){ ?>
                                    <p>Weight: <?php echo $product['Weight'];?> KG</p>
                                <?php }
                                if (isset($product['Length'], $product['Width'], $product['Height'])){ ?>
                                <p>Dimension: <?php echo $product['Length']; ?>x<?php echo $product['Width']; ?>x<?php echo $product['Height']; ?> CM
                                    <?php } ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach;
                } ?>
            </ul>

            </form>

</body>
</html>