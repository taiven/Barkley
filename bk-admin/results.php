<?php

				$search=$_POST['search'];
				require("functions/connect.php");
				$query = mysql_query("SHOW TABLES FROM `taiven_Makovate`");
				$tables = array($query);
				while($row = mysql_fetch_array($query, MYSQL_NUM)) {
				$tables['search'] = "$row[0]";
				}
				?>