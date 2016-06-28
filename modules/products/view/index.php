<!-- < View all -->
<table class="table-all">
    <tr>
        <td>Image</td>
        <td>Title</td>
        <td>Description</td>
        <td>Link cart</td>
        <td>Link Compare</td>
        <td>Posts</td>
        <td class="action">Action</td>
    </tr>

    <?php for($n = 0; $n < count($products); $n++) : ?>
    <tr>
        <td> <img width="100px" src="<?php echo get_template_directory_uri(); ?>/images/products/<?php echo $products[$n]['image']; ?>" alt=""></td>
        <td><?php echo $products[$n]['title']; ?></td>
        <td><?php echo $products[$n]['description']; ?></td>
        <td><?php echo $products[$n]['link_cart']; ?></td>
        <td><?php echo $products[$n]['link_compare']; ?></td>
        <td><?php echo $products[$n]['posts_title']; ?></td>
        <td class="action">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $products[$n]['id']; ?>" />
                <input type="submit" name="edit" value="Edit" />
                <input type="submit" name="del" value="Delete" />
            </form>
        </td>
    </tr>
    <?php endfor; ?>

</table>
<!-- > -->
