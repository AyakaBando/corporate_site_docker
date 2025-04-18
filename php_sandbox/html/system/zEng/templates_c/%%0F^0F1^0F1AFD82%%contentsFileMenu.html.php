<?php /* Smarty version 2.6.19, created on 2015-08-18 10:24:11
         compiled from ../../templates/common/contentsFileMenu.html */ ?>
     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <li<?php if (@PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 1): ?><font><?php else: ?><a href="./product_imgAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>設置事例<?php if (@PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li>
        <li<?php if (@PAGE_NUM == 2): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 2): ?><font><?php else: ?><a href="./product_catalogAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>カタログ<?php if (@PAGE_NUM == 2): ?></font><?php else: ?></a><?php endif; ?></li>
        <li<?php if (@PAGE_NUM == 3): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 3): ?><font><?php else: ?><a href="./product_drawingAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>図面<?php if (@PAGE_NUM == 3): ?></font><?php else: ?></a><?php endif; ?></li>

        <li class="own<?php if (@PAGE_NUM == 4): ?> active<?php endif; ?>"><?php if (@PAGE_NUM == 4): ?><font><?php else: ?><a href="javascript:void(0)"><?php endif; ?>FAQ<?php if (@PAGE_NUM == 4): ?></font><?php else: ?></a><?php endif; ?>
            <ul class="child">
                <li><a href="./product_faqCategoryAddChange.php?id=<?php echo $_REQUEST['id']; ?>
">カテゴリ登録</a></li>
                <li><a href="./product_faqList.php?id=<?php echo $_REQUEST['id']; ?>
">一覧</a></li>
                <li><a href="./product_faqAddChange.php?id=<?php echo $_REQUEST['id']; ?>
">登録</a></li>
            </ul>
        </li>

        <li class="own<?php if (@PAGE_NUM == 5): ?> active<?php endif; ?>"><?php if (@PAGE_NUM == 5): ?><font><?php else: ?><a href="javascript:void(0)"><?php endif; ?>お知らせ<?php if (@PAGE_NUM == 5): ?></font><?php else: ?></a><?php endif; ?>
            <ul class="child">
                <li><a href="./product_newsList.php?id=<?php echo $_REQUEST['id']; ?>
">一覧</a></li>
                <li><a href="./product_newsAddChange.php?id=<?php echo $_REQUEST['id']; ?>
">登録</a></li>
            </ul>
        </li>        <li<?php if (@PAGE_NUM == 6): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 6): ?><font><?php else: ?><a href="./product_reviewAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>レビュー<?php if (@PAGE_NUM == 6): ?></font><?php else: ?></a><?php endif; ?></li>
        <li><a href="./productList.php">製品一覧</a></li>
        
       </ul>
      </div>
      <div class="clear"></div>
     </div>