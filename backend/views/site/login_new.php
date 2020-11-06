<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = '登录';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<HEAD>
<META content="IE=11.0000" http-equiv="X-UA-Compatible">
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<TITLE><?= Html::encode($this->title) ?></TITLE> 
<SCRIPT src="/admin/js/jquery.min.js" type="text/javascript"></SCRIPT>
 
<STYLE>
body{
	background: #ebebeb;
	font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
	color: #222;
	font-size: 12px;
}
*{padding: 0px;margin: 0px;}
.top_div{
	background: #008ead;
	width: 100%;
	height: 350px;
	color:#fff; 
	text-align:center;
	font-size:36px;
	 line-height:170px;
}
.ipt{
	border: 1px solid #d3d3d3;
	padding: 10px 10px;
	width: 290px;
	border-radius: 4px;
	padding-left: 35px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	z-index:1000; position:relative;
}
.ipt:focus{
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.u_logo{
	background: url("/admin/images/username.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 53px;
	left: 40px;
	z-index:2000
}
.p_logo{
	background: url("/admin/images/password.png") no-repeat;
	padding: 10px 10px;
	position: absolute;
	top: 12px;
	left: 40px;
	z-index:2000;
}
a{
	text-decoration: none;
}
.tou{
	background: url("/admin/images/tou.png") no-repeat;
	width: 97px;
	height: 92px;
	position: absolute;
	top: -87px;
	left: 140px;
}
.left_hand{
	background: url("/admin/images/left_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	left: 150px;
}
.right_hand{
	background: url("/admin/images/right_hand.png") no-repeat;
	width: 32px;
	height: 37px;
	position: absolute;
	top: -38px;
	right: -64px;
}
.initial_left_hand{
	background: url("/admin/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	left: 100px;
}
.initial_right_hand{
	background: url("/admin/images/hand.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -12px;
	right: -112px;
}
.left_handing{
	background: url("/admin/images/left-handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -24px;
	left: 139px;
}
.right_handinging{
	background: url("/admin/images/right_handing.png") no-repeat;
	width: 30px;
	height: 20px;
	position: absolute;
	top: -21px;
	left: 210px;
}
.field-loginform-username{ margin-bottom:10px;}
.field-loginform-rememberme{ padding-top:20px; overflow:hidden;}
a#loginGo{background:#008EAD;}
a#loginGo:hover{ background:#278296;}
.loginGo{background:#008EAD; border:none; display:block;padding: 7px 10px; border-radius: 4px; border: 1px solid rgb(26, 117, 152); border-image: none; color: rgb(255, 255, 255); font-weight: bold; display:block; font-size:16px; width:350px; height:70px; cursor:pointer;}
.loginGo:hover{ background:#278296;}
.MyVerifyCode{overflow:hidden; float:left; padding-right:10px;}
.MyVerifyCode img{float:left; display:inline-block; margin-left:32px; margin-top:3px; width:115px; height:40px; cursor:pointer;}
.MyVerifyCode input{width:100px; display:inline-block; margin-right:10px; margin-top:5px; float:left; padding:10px 20px;}
.field-loginform-rememberme{text-align:left;}
</STYLE>
     
<SCRIPT type="text/javascript">
$(function(){
	//得到焦点
	$("#loginform-password").focus(function(){
		$("#left_hand").animate({
			left: "150",
			top: " -38"
		},{step: function(){
			if(parseInt($("#left_hand").css("left"))>140){
				$("#left_hand").attr("class","left_hand");
			}
		}}, 2000);
		$("#right_hand").animate({
			right: "-64",
			top: "-38px"
		},{step: function(){
			if(parseInt($("#right_hand").css("right"))> -70){
				$("#right_hand").attr("class","right_hand");
			}
		}}, 2000);
	});
	//失去焦点
	$("#loginform-password").blur(function(){
		$("#left_hand").attr("class","initial_left_hand");
		$("#left_hand").attr("style","left:100px;top:-12px;");
		$("#right_hand").attr("class","initial_right_hand");
		$("#right_hand").attr("style","right:-112px;top:-12px");
	});
	
	
	
	$("#captcha").keydown(function(e){
		var curKey=e.which;
		if(curKey==13){
			$("#loginGo").click();
			return false;
			}
		})
	
});

function deleteAll(){
	document.loginForm.submit();
	}
</SCRIPT>
 
<META name="GENERATOR" content="MSHTML 11.00.9600.17496"></HEAD> 

<BODY>
<?php $this->beginBody() ?>
<DIV class="top_div"><?=Yii::$app->name?></DIV>
<?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
<DIV style="background: rgb(255, 255, 255); margin: -100px auto auto; border: 1px solid rgb(231, 231, 231); border-image: none; width: 400px; height: auto; text-align: center;">
<DIV style="width: 165px; height: 96px; position: absolute; z-index:1">
<DIV class="tou"></DIV>
<DIV class="initial_left_hand" id="left_hand"></DIV>
<DIV class="initial_right_hand" id="right_hand"></DIV></DIV>
<P style="padding: 30px 0px 10px; position: relative;">
<SPAN class="u_logo"></SPAN>
	<!--<INPUT class="ipt" type="text" placeholder="请输入用户名" name="username" value="">-->
    <?= $form
            ->field($model, 'username')
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username'),'class' => 'ipt']) ?>
</P>
    <P style="position: relative;">
    <SPAN class="p_logo"></SPAN>
        <!--<INPUT class="ipt" id="password" type="password" name="password" placeholder="请输入密码" value="">-->   
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password'),'class' => 'ipt']) ?>
    </P><br />
	 <P style="position: relative;">    
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="MyVerifyCode">{image}{input}</div>',
					'options' => ['class' => 'ipt','placeholder'=>"验证码"]
                ])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </P>
                
    <DIV style="height: 50px; line-height: 50px; margin-top: 20px; border-top-color: rgb(231, 231, 231); border-top-width: 1px; border-top-style: solid;">
        <P style="margin: 10px 25px;">
            <SPAN>
                    <!--<A class="loginGo" href="javascript:void(0);" id="loginGo"  onclick="deleteAll()">登录</A> -->
                    <?= Html::submitButton('登录', ['class' => 'loginGo', 'name' => 'login-button']) ?>
            </SPAN>
        </P>
    </DIV>
</DIV>
<?php ActiveForm::end(); ?>
<div style="text-align:center;width:100%; margin-top:60px;">
<p><a href="index.php?p=admin&c=index&a=index" style=" color:gray;">小文网络</a></p>
</div>
<?php $this->endBody() ?>
</BODY>
</HTML>
<?php $this->endPage() ?>
