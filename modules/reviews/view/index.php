<!-- < View all -->
<table class="table-all">
    <tr>
        <td>Image</td>
        <td>Name</td>
        <td>Date</td>
        <td>Review</td>
        <td class="action">Action</td>
    </tr>

    <?php for($n = 0; $n < count($reviews); $n++) : ?>
    <tr>
        <td> <img width="100px" src="<?php echo get_template_directory_uri(); ?>/images/reviews/<?php echo $reviews[$n]['image']; ?>" alt=""></td>
        <td><?php echo $reviews[$n]['name']; ?></td>
        <td><?php echo date('d F Y', $reviews[$n]['date_review']); ?></td>
        <td><?php echo $reviews[$n]['review']; ?></td>
        <td class="action">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $reviews[$n]['id']; ?>" />
                <input type="submit" name="edit" value="Edit" />
                <input type="submit" name="del" value="Delete" />
            </form>
        </td>
    </tr>
    <?php endfor; ?>

</table>
<!-- > -->
