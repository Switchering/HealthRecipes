<?php
namespace app\mail\layouts;

use yii;
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Bella - Free PSD/HTML Email Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,600,500' rel='stylesheet' type='text/css'>
  <style type="text/css">

	html{
		width: 100%;
	}

	body{
		width: 100%;
		margin:0;
		padding:0;
		-webkit-font-smoothing: antialiased;
		mso-margin-top-alt:0px;
		mso-margin-bottom-alt:0px;
		mso-padding-alt: 0px 0px 0px 0px;
		background: #ffffff;
	}

	p,h1,h2,h3,h4{
		margin-top:0;
		margin-bottom:0;
		padding-top:0;
		padding-bottom:0;
	}

	table{
		font-size: 14px;
		border: 0;
	}

	img{
		border: none!important;
	}

  </style>
</head>
<body style="margin: 0; padding: 0;">
  <?= var_dump($articles[0]->title)?>
  <?= var_dump($categories[0]->title)?>
  <div style="width:600px">
  <!--  header  -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" style="background-color:#ffffff;">
    <tr>
      <td>
        <table width="600" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
          <tr>
            <td width="100%" height="40"></td>
          </tr>
          <tr>
            <td>
              <!--  Logo  -->
              <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                <tbody>
                  <tr>
                    <td>
                      <a href="#"><img src="http://b963690g.beget.tech/images/logo.png" alt="Bella" border="0" style="display: block;"/> </a>
                    </td>
                  </tr>
                </tbody>
              </table>

              <!--  navigation menu  -->
              <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                <tbody>
                  <tr>
                    <td height="3"></td>
                  </tr>

                  <tr>
                    <td style="color: #6c6b6b; font-family: 'Raleway', arial; font-weight: 400; font-size: 14px; letter-spacing:0.5px;">
                      <a href="#" style="color: #6c6b6b; text-decoration:none;">О нас</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="#" style="color: #6c6b6b; text-decoration:none;">Статьи</a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a href="#" style="color: #6c6b6b; text-decoration:none;">Контакты</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td width="100%" height="40"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--  end header  -->
  <!--  billboard stlye 1  -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#dfe7f2" background="http://www.fubiz.net/wp-content/uploads/2014/10/Mountains-Photography-by-Max-Rive_5.jpg" style="background-image: url('http://b963690g.beget.tech/uploads/527ad67f389cab912efd2a8b18156621.jpg'); background-size: cover; -webkit-background-size: cover; -moz-background-size: cover -o-background-size: cover; background-position: 0 0; background-repeat: no-repeat; text-align:center;">
    <tr>
      <td>
        <table width="600" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
          <tr>
          <td width="100%" height="150"></td>
        </tr>
        <!--  caption  -->
        <tr>
          <td style="color: #646262; font-family: 'Raleway', arial; font-size: 40px; text-align:center; font-weight:200;" align="center">
            <span style="font-weight: 500; letter-spacing:1px;">HealthRecipes</span>
          </td>
        </tr>
        <tr>
          <td width="100%" height="60"></td>
        </tr>
        <tr>
          <td align="center">
            <!--  get it now btn  -->
            <table width="250" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; -moz-border-radius: 100px; -webkit-border-radius: 100px; border-radius: 100px; background: #ec5482;">
                <tr>
                  <td width="100%" height="15"></td>
                </tr>
                <tr>
                  <td>

                    <table width="100%" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; text-align:center;">
                      <tr>
                        <td align="center" style="text-align:center;">
                          <a href="http://b963690g.beget.tech/" style="color: #fff; font-family: 'Raleway', arial; font-size: 18px; text-decoration:none; font-weight:500; letter-spacing:.5px;">
                            ПЕРЕЙТИ
                          </a>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
                <tr>
                  <td width="100%" height="15"></td>
                </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td width="100%" height="160"></td>
        </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--  end billboard  -->
  <?= $this->render('/mail/views/example-html.php',[
    'articles'=>$articles,
    'categories'=>$categories
    ]) ?>
  <!--  call to action  -->
  <table width="600" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    <tr>
      <td width="100%" height="20"></td>
    </tr>
    <tr>
      <td style="color: #676767; font-family: 'Raleway', arial; font-size: 20px; letter-spacing:.5px; line-height:30px; text-transform:uppercase; text-align:center; font-weight:300;">
        Начни жить с <span style="font-weight:600; color:#7FFF00">зелёного</span> листа.
      </td>
    </tr>
    <tr>
      <td width="100%" height="50"></td>
    </tr>
    <tr>
      <td align="center">
        <!--  call to action btn  -->
          <table width="230" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background: #eb5383; text-align:center;">
            <tr>
              <td width="100%" height="15"></td>
            </tr>
            <tr>
              <td align="center">
                <a href="http://b963690g.beget.tech/auth/signup" style="text-decoration:none; text-transform:uppercase; color: #fff; font-family: 'Raleway', arial; font-size: 18px; font-weight: 600; letter-spacing:1px;">Присоединяйся!</a>
              </td>
            </tr>
            <tr>
              <td width="100%" height="15"></td>
            </tr>
          </table>
      </td>
    </tr>
    <tr>
            <td width="100%" height="20"></td>
          </tr>
  </table><!--  end call to action  -->
  <!--  footer  -->
  <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#38404b" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color:#38404b;">
    <tr>
      <td width="100%" height="80"></td>
    </tr>
    <tr>
      <td style="text-align:center;">
        <a href="#" style="text-decoration:none; border:0;">
          <img src="http://b963690g.beget.tech/images/logo.png" border="0" alt="Bella" title="Bella" style="display: inline-block;"/>
        </a>
      </td>
    </tr>
    <tr>
      <td width="100%" height="60"></td>
    </tr>
    <tr>
      <td style="text-align:center; color: #bcc9dd; font-family: 'Raleway', arial; font-weight: 400; font-size: 14px; letter-spacing:.5px;">
        <a href="#" style="color: #bcc9dd; text-decoration:none;">О нас</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="color: #bcc9dd; text-decoration:none;">Статьи</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" style="color: #bcc9dd; text-decoration:none;">Контакты</a>
      </td>
    </tr>
    <tr>
      <td width="100%" height="40"></td>
    </tr>
    <tr>
      <td style="text-align:center; color:#bcc9dd; font-family: 'Raleway', arial; font-weight: 400; font-size: 12px; letter-spacing:.5px;">
        © 2018 <a href="http://pixelhint.com" target="_blank" style="text-decoration:none; color:#e9edf4;">HealthRecipes.com</a>.
      </td>
    </tr>
    <tr>
      <td width="100%" height="80"></td>
    </tr>
  </table>
  <!--  end footer  -->
</div>
</body>
</html>
