					<?php
					foreach ($newsAllCategory as $newsKey => $newsValue)
					{
						$num = $newsKey + 1;
						if($newsAllCategory[$newsKey]["categoryId"] == $currentCategoryId)
						{
							echo'<li class="news' . $num . '_ov"><a title="'. $newsAllCategory[$newsKey]["jp"] .'">' . $newsAllCategory[$newsKey]["jp"] . '</a></li>';
						}
						else
						{
							echo'<li class="news' . $num . '"><a href="/news/year.php?CATEGORY='. $newsAllCategory[$newsKey]["categoryId"] .'" title="'. $newsAllCategory[$newsKey]["jp"] .'">'. $newsAllCategory[$newsKey]["jp"] .'</a></li>';
						}
					}
					?>