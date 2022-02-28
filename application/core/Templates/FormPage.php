<!DOCTYPE html>
<html>
    <head>
        <title> <?php if (isset($title)) echo $title?></title>
    </head>
    <body>
    <h1 class='PageName'>Product Add</h1>

     // use form !=butt //разбить div-ами

            <form method="post">

                    <button class='rm'>ADD</button>
                    <input type="submit" value=""> //cansel - переход на список товарров корень



            <p class="SKUInput">SKU <input type="text" name="sku" placeholder="Write sku"></p>
            <p>Name <input type="text" name="name" placeholder="Write name"></p>
            <p>Price ($) <input type="text" name="price" placeholder="Write price ($)"></p>
            <p>Type Switcher
                <select>
                    <option selected disabled>Type Switcher</option>
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
            </p>
            <p><b>Please, provide disc space in MB</b></p>
            <p>Size (MB) <input type="text" name="size" placeholder="Write size"></p>
            <p><b>Please, provide furniture height, width, length in CM</b></p>
            <p>Height (CM) <input type="text" name="height" placeholder="Write height"></p>
            <p>Width (CM) <input type="text" name="width" placeholder="Write width"></p>
            <p>Length (CM) <input type="text" name="length" placeholder="Write length"></p>
            <p><b>Please, provide book weight in KG</b></p>
            <p>Weight (KG) <input type="text" name="weight" placeholder="Write size"></p>

    </body>
</html>

