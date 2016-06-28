<!-- < Edit -->
<table class="table-all padding-2">
    <tr>
        <td>Image</td>
        <td>Title</td>
        <td>Description</td>
        <td>Link cart</td>
        <td>Link Compare</td>
        <td>Posts</td>
        <td>Action</td>
    </tr>
	<tr>
	</tr>
	<?php for($n = 0; $n < count($edit); $n++) : ?>
    <tr>
        <form method="post" enctype="multipart/form-data">
		<td>
			<div class="input_button_style">
				<div class="input_font_style">Select file</div>
				<input type="file" name="images" class="input_input_style" />
			</div>
		</td>
    <td><input type="text" name="title" value="<?php echo $edit[$n]['title']; ?>" /></td>
    <td><textarea name="description"><?php echo $edit[$n]['description']; ?></textarea></td>
    <td><input type="text" name="link_cart" value="<?php echo $edit[$n]['link_cart']; ?>" /></td>
    <td><input type="text" name="link_compare" value="<?php echo $edit[$n]['link_compare']; ?>" /></td>

    <td>
        <select name="id_posts">
            <option value="<?php echo $edit[$n]['id_posts']; ?>">
                <?php echo $edit[$n]['name_posts']; ?>
            </option>
            <?php foreach($items_for_select as $items) : ?>

                <option value="<?php echo $items['id']; ?>">
                    <?php echo $items['post_title']; ?>
                </option>

            <?php endforeach; ?>
        </select>
    </td>

    <td class="action">
  			<input type="hidden" name="id" value="<?php echo $edit[$n]['id']; ?>" />
  			<input type="submit" name="edit_go" value="Edit" />
  			<input type="button" value="Back" class="back-btn" onClick="history.back()">
		</td>
        </form>
    </tr>
	<?php endfor; ?>
</table>
<!-- > -->
