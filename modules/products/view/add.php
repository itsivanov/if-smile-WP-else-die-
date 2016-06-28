<!-- < Add -->
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
	<tr>
	</tr>
    <tr>
        <form method="post" enctype="multipart/form-data">
          <td>
      			<div class="input_button_style">
      				<div class="input_font_style">Select file</div>
      				<input type="file" name="images" class="input_input_style" />
      			</div>
      		</td>
          <td><input type="text" name="title" /></td>
          <td><input type="text" name="description" /></td>
          <td><input type="text" name="link_cart" /></td>
          <td><input type="text" name="link_compare" /></td>
          <td>
              <select name="id_posts">
              <?php foreach($items_for_select as $items) : ?>

                  <option value="<?php echo $items['id']; ?>">
                      <?php echo $items['post_title']; ?>
                  </option>

              <?php endforeach; ?>
              </select>
          </td>
          <td><input type="submit" name="add" value="Add" /></td>
        </form>
    </tr>

</table>
<!-- > -->
