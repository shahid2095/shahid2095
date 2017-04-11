
					<h2 class="bold padding-bottom-7" style="color: #0066cc;">
					<?php

					echo $total_rating;


					?>
					<small >/ 5</small>
					</h2>
					
					<a href='description.php?id=<?php echo $_GET['id'];?>&rating=1&place=one'  id='id1' caria-label="Left Align">
            <span class="glyphicon glyphicon-star" style="color: gray;" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=2&place=two'   id='id2' aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=3&place=three'   id='id3' aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=4&place=four'   id='id4' btn-sm" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>
          <a href='description.php?id=<?php echo $_GET['id'];?>&rating=5&place=five'   id='id5'btn-sm" aria-label="Left Align">
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
          </a>

