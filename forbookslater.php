
<!-- If not stored in a variable already, do this -->
<a href="catalogue.php?keyword=<?php echo $_GET["keyword"]; ?>"  name="keyword"><?php echo $_GET["keyword"]; ?></a>

<!-- If already stored in a variable, do this -->
<a href="catalogue.php?keyword=<?php echo $keyword; ?>"  name="keyword"><?php echo $keyword; ?></a>