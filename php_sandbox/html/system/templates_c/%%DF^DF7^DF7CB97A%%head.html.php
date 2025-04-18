<?php /* Smarty version 2.6.19, created on 2018-09-28 16:19:17
         compiled from ./common/head.html */ ?>
	 <div id="l_h"><?php echo @TITLE; ?>
 </div>
     <div id="r_h" style="text-align:right;">
       <?php echo @TODAY; ?>
(<?php echo @DAY_OF_WEEK; ?>
)&nbsp;&nbsp;<?php echo @USER_NAME; ?>
さんがログインしています&nbsp;
       <span style="display:block;float:right;margin-right:12px;">
           <input type="button" class="submits minisubmit" value="ログアウト" onClick="location.href='/system/logout.php'" style="margin-left:12px;" />
       </span>
     </div>
     <div class="clear"></div>
    </div>