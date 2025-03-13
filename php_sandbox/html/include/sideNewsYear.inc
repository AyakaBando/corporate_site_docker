						<?php

							$cnc = new CategoryNewsCollection();
							$cnc->setCategoryID( $currentCategoryId );
							$yearArray = $cnc->getYearFromRegistedNews();
							foreach( $yearArray as $currentYear ){
							    echo '<li><a href="/news/year.php?YEAR=' . $currentYear . '&CATEGORY='. $currentCategory["categoryId"] .'"><span class="rt">' . $currentYear . '年度</span></a></li>';
							}
						?>