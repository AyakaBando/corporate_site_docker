<?php /* Smarty version 2.6.19, created on 2018-10-04 21:27:05
         compiled from ./common/downloadMenu.html */ ?>
     <div id="navi" style="margin-bottom:10px;">
      <div id="naviBt">
       <ul>
        <?php if (@PAGE_NUM == 1): ?><li<?php if (@PAGE_NUM == 1): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 1): ?><font><?php else: ?><a href="./memberDownLoadList.php"><?php endif; ?>製品ダウンロード一覧<?php if (@PAGE_NUM == 1): ?></font><?php else: ?></a><?php endif; ?></li><?php endif; ?>
        <?php if (@PAGE_NUM == 2): ?>
        <li<?php if (@PAGE_NUM == 2): ?> class="active"<?php endif; ?>><?php if (@PAGE_NUM == 2): ?><font><?php else: ?><a href="./memberDownLoad2List.php"><?php endif; ?>会員ダウンロード<?php if (@PAGE_NUM == 2): ?></font><?php else: ?></a><?php endif; ?></li>
        <li><a href="./memberList.php">会員一覧</a></li>
        <?php endif; ?>
       </ul>
      </div>
      <div class="clear"></div>
     </div>