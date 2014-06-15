FLYING SEA MONEKYS!

Setting up:
UBC's apache2 servers seems to have their own settings disallowing sessions to save paths so ini_set will manually set the session path. Most likely the path after home is different so cd out to found the correct path and update it in config.php. Also, you can edit sql_query to use your own Oracle account information.