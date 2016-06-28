<!-- < Edit -->
<table class="table-all padding-2">
    <tr>
        <td>Image</td>
        <td>Name</td>
        <td>Date</td>
        <td>Review</td>
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
    <td><input type="text" name="name" value="<?php echo $edit[$n]['name']; ?>" /></td>
    <td><input type="text" name="date_review" value="<?php echo $edit[$n]['date_review']; ?>" /></td>
    <td><textarea name="review"><?php echo $edit[$n]['review']; ?></textarea></td>

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
