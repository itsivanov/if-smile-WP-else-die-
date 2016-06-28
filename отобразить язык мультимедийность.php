
<?php $text = $_SERVER['REQUEST_URI']; ?>
<?php if (preg_match("/ru_RU/", $text))
          {
                  $content_footer = "Нет такой страницы! Возможно, Вы ошиблись в наборе или Вам дали не верную ссылку. Проверьте адрес или воспользуйтесь поиском.";
          }
          elseif(preg_match("/en_US/", $text))
          {
                  $content_footer = "The page you are trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.";
          }
?>
<div class="error">
<?php echo $content_footer; ?>
</div>
