function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}



function CloseWin(){

	window.close();

}





function writeflash( arg )

{

  

  /**

   * �������瑮���𒊏o����

   */

   

  var parm = []

  

  //���ׂĂ̈��������Ԃ�

  for( i = 0 ; i < arguments.length ; i++ )

  {

    //�������Ƒ����l������킷�������z��parm�փZ�b�g����(���p�󔒂͏���)

    parm[i] = arguments[i].split(' ').join('').split('=')

    

    //�L���ȑ�����������Α����l�ŕϐ���( �����Ȗ��O�͖��� )

    switch (parm[i][0])

    {

      case '_swf'     : var _swf     = parm[i][1] ; break ; // �t���b�V����URL

      case '_quality' : var _quality = parm[i][1] ; break ; // �掿

      case '_loop'    : var _loop    = parm[i][1] ; break ; // �J��Ԃ�

      case '_bgcolor' : var _bgcolor = parm[i][1] ; break ; // �w�i�F

      case '_wmode'   : var _wmode   = parm[i][1] ; break ; // �w�i����(WinIE�̂�)

      case '_play'    : var _play    = parm[i][1] ; break ; // �����Đ�

      case '_menu'    : var _menu    = parm[i][1] ; break ; // �E�N���b�N���j���[

      case '_scale'   : var _scale   = parm[i][1] ; break ; // ��������%�̎��̏c���䓙

      case '_salign'  : var _salign  = parm[i][1] ; break ; // �\���̈���\���ʒu

      case '_height'  : var _height  = parm[i][1] ; break ; // ���[�r�[�̍���

      case '_width'   : var _width   = parm[i][1] ; break ; // ���[�r�[�̕�

      case '_hspace'  : var _hspace  = parm[i][1] ; break ; // �܂��̗]��(��������)

      case '_vspace'  : var _vspace  = parm[i][1] ; break ; // �܂��̗]��(��������)

      case '_align'   : var _align   = parm[i][1] ; break ; // �\���ʒu

      case '_class'   : var _class   = parm[i][1] ; break ; // �N���X

      case '_id'      : var _id      = parm[i][1] ; break ; // ID��

      case '_name'    : var _name    = parm[i][1] ; break ; // ���[�r�[��

      case '_style'   : var _style   = parm[i][1] ; break ; // �X�^�C��

      case '_declare' : var _declare = parm[i][1] ; break ; // �ǂݍ��܂�邾���Ŏ��s���Ȃ�

      default        :;

    }

  }

  



  // �^�O�p�����񐶐�

  var htm = ""

  

  htm+="<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'"

  htm+="        codebase='http://download.macromedia.com/pub/shockwave/"

                    htm+="cabs/flash/swflash.cab'"

  if(!!_width)   htm+="        width    = '" + _width   + "'"

  if(!!_height)  htm+="        height   = '" + _height  + "'"

  if(!!_hspace)  htm+="        hspace   = '" + _hspace  + "'"

  if(!!_vspace)  htm+="        vspace   = '" + _vspace  + "'"

  if(!!_align)   htm+="        align    = '" + _align   + "'"

  if(!!_class)   htm+="        class    = '" + _class   + "'"

  if(!!_id)      htm+="        id       = '" + _id      + "'"

  if(!!_name)    htm+="        name     = '" + _name    + "'"

  if(!!_style)   htm+="        style    = '" + _style   + "'"

  if(!!_declare) htm+="                    " + _declare  

  htm+=">"

  if(!!_swf)     htm+="<param  name     = 'movie'   value ='" + _swf     + "'>"

  if(!!_quality) htm+="<param  name     = 'quality' value ='" + _quality + "'>"

  if(!!_loop)    htm+="<param  name     = 'loop'    value ='" + _loop    + "'>"

  if(!!_bgcolor) htm+="<param  name     = 'bgcolor' value ='" + _bgcolor + "'>"

  if(!!_play)    htm+="<param  name     = 'play'    value ='" + _play    + "'>"

  if(!!_menu)    htm+="<param  name     = 'menu'    value ='" + _menu    + "'>"

  if(!!_scale)   htm+="<param  name     = 'scale'   value ='" + _scale   + "'>"

  if(!!_salign)  htm+="<param  name     = 'salign'  value ='" + _salign  + "'>"

  if(!!_wmode)   htm+="<param  name     = 'wmode'   value ='" + _wmode   + "'>"

  htm+=""

  htm+="<embed                          "

  htm+="        pluginspage='http://www.macromedia.com/go/getflashplayer'"

  if(!!_width)   htm+="        width    = '" + _width   + "'"

  if(!!_height)  htm+="        height   = '" + _height  + "'"

  if(!!_hspace)  htm+="        hspace   = '" + _hspace  + "'"

  if(!!_vspace)  htm+="        vspace   = '" + _vspace  + "'"

  if(!!_align)   htm+="        align    = '" + _align   + "'"

  if(!!_class)   htm+="        class    = '" + _class   + "'"

  if(!!_id)      htm+="        id       = '" + _id      + "'"

  if(!!_name)    htm+="        name     = '" + _name    + "'"

  if(!!_style)   htm+="        style    = '" + _style   + "'"

  htm+="        type     = 'application/x-shockwave-flash' "

  if(!!_declare) htm+="                    " + _declare  

  if(!!_swf)     htm+="        src      = '" + _swf     + "'"

  if(!!_quality) htm+="        quality  = '" + _quality + "'"

  if(!!_loop)    htm+="        loop     = '" + _loop    + "'"

  if(!!_bgcolor) htm+="        bgcolor  = '" + _bgcolor + "'"

  if(!!_play)    htm+="        play     = '" + _play    + "'"

  if(!!_menu)    htm+="        menu     = '" + _menu    + "'"

  if(!!_scale)   htm+="        scale    = '" + _scale   + "'"

  if(!!_salign)  htm+="        salign   = '" + _salign  + "'"

  htm+="></embed>"

  htm+="</object>"



  //�����o������

  document.write(htm)

  

}

<!--

// �摜���N���b�N���ꂽ��摜�����ւ���

// img0.jpg,img1.jpg�Ȃǂ̐������������t�@�C���𕡐��p�ӂ��܂��B

num = 3; // ����ւ���摜�̖���(�ŏ��̉摜���܂߂�)

nme = "img02/img" // �摜�̃f�B���N�g���ƃt�@�C�����̐����Ɗg���q���O�̕���

exp = "gif" // �g���q

cnt = 0;

function changeImage() {

  cnt++;

  cnt %= num;

  document.img.src = nme + cnt + "." + exp;

}

//-->