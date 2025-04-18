<?php /* Smarty version 2.6.19, created on 2024-04-12 09:08:02
         compiled from ./common/contentsFileMenu.html */ ?>
     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <li<?php if (@PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 1): ?><font><?php else: ?><a href="./product_imgAddChange.php?id=<?php echo $_REQUEST['id']; ?>
"><?php endif; ?>英語サイト：設置事例<?php if (@PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li>



        <li class="own<?php if (@PAGE_NUM == 5): ?> active<?php endif; ?>"><?php if (@PAGE_NUM == 5): ?><font><?php else: ?><a href="javascript:void(0)"><?php endif; ?>英語サイト：お知らせ<?php if (@PAGE_NUM == 5): ?></font><?php else: ?></a><?php endif; ?>
            <ul class="child">
                <li><a href="./product_newsList.php?id=<?php echo $_REQUEST['id']; ?>
">一覧</a></li>
                <li><a href="./product_newsAddChange.php?id=<?php echo $_REQUEST['id']; ?>
">登録</a></li>
            </ul>
        </li>
        <li><a href="./productList.php">英語サイト：製品一覧</a></li>
        
       </ul>
      </div>
      <div class="clear"></div>
     </div>