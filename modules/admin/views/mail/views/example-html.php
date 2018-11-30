<?php
namespace app\mail\views;

use yii\helpers\Url;
/** @var $this \yii\web\View */
/** @var $link string */
/** @var $paramExample string */

?>
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
	<!--  blog  -->
	<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#fcfcfc" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	  <tr>
	    <td width="100%" height="20"></td>
	  </tr>
	  <tr>
	    <td>
	        <table width="600" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	          <tr>
	            <td>
	            	<!--  blog post 1  -->
	                <table width="280" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                  <tr>
	                    <td>
	                      <a href="<?=Url::toRoute(['site/category', 'id'=>$categories[0]->id]);?>" style="text-decoration:none;"><img src="<?= $categories[0]->getImage()?>" alt="<?= $categories[0]->title?>" title="" border="0" style="display: block;"/></a>
	                    </td>
	                  </tr>
	                  <tr>
	                    <td width="100%" height="40"></td>
	                  </tr>
	                  <tr>
	                    <td>
	                      <a href="<?=Url::toRoute(['site/category', 'id'=>$categories[0]->id]);?>" style="color: #676767; font-family: 'Raleway', arial; font-size: 14px; font-weight: 600; text-decoration:none; text-transform:uppercase; line-height:24px; letter-spacing:.5px;"><?= $categories[0]->title?></a>
	                    </td>
	                  </tr>
	                </table>

	                <!--  blog post 2  -->
	                <table width="280" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                  <tr>
	                    <td>
	                      <a href="<?=Url::toRoute(['site/category', 'id'=>$categories[1]->id]);?>" style="text-decoration:none;"><img src="<?= $categories[1]->getImage()?>" alt="<?= $categories[1]->title?>" title="" border="0" style="display: block;"/></a>
	                    </td>
	                  </tr>
	                  <tr>
	                    <td width="100%" height="40"></td>
	                  </tr>
	                  <tr>
	                    <td>
	                      <a href="<?=Url::toRoute(['site/category', 'id'=>$categories[1]->id]);?>" style="color: #676767; font-family: 'Raleway', arial; font-size: 14px; font-weight: 600; text-decoration:none; text-transform:uppercase; line-height:24px; letter-spacing:.5px;"><?= $categories[1]->title?></a>
	                    </td>
	                  </tr>
	                </table>
	            </td>
	          </tr>
	        </table>
	    </td>
	  </tr>
	</table><!--  end blog  -->

  <!--  content  -->
	<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#fcfcfc" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	  <tr>
	    <td>
	      <table width="600" align="center" cellpadding="0" cellspacing="0" bgcolor="#fcfcfc" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	        <tr>
	          <td width="100%" height="20"></td>
	        </tr>
	        <tr>
	          <td>
	          	<!--  content 1  -->
	            <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	              <tr>
	                <td width="187" style="vertical-align:top;">
	                  <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                    <tr>
	                      <td width="100%" height="6"></td>
	                    </tr>
	                    <tr>
	                      <td>
	                        <a href="<?=Url::toRoute(['site/article', 'id'=>$articles[0]->id]);?>">
	                          <img src="<?= $articles[0]->getImage()?>" border="0" alt="<?= $articles[0]->title?>" title="" width="187" height="155" style="display: block;"/>
	                        </a>
	                      </td>
	                    </tr>
	                  </table>
	                </td>
	                <td width="40" style="width:40px;"></td>
	                <td>
	                  <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                    <tr>
	                      <td>
	                        <a href="<?=Url::toRoute(['site/article', 'id'=>$articles[0]->id]);?>" style="color: #676767; font-family: 'Raleway', arial; font-size: 16px; font-weight: 600; text-transform:uppercase; letter-spacing:.5px; line-height:26px; text-decoration:none;">
	                          <?= $articles[0]->title?>
	                        </a>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="100%" height="15"></td>
	                    </tr>
	                    <tr>
	                      <td style="color: #8b8b8b; font-family: 'Raleway', arial; font-weight: 400; font-size: 14px; letter-spacing:.5px; line-height:26px;">
	                        <?= $articles[0]->description?>
	                      </td>
	                    </tr>
	                  </table>
	                </td>
	              </tr>
	            </table>
	          </td>
	        </tr>
	        <tr>
	          <td width="100%" height="60"></td>
	        </tr>
	        <tr>
	          <td>
	          	<!--  content 2  -->
	            <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	              <tr>
	                <td width="187" style="vertical-align:top;">
	                  <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                    <tr>
	                      <td width="100%" height="6"></td>
	                    </tr>
	                    <tr>
	                      <td>
	                        <a href="<?=Url::toRoute(['site/article', 'id'=>$articles[1]->id]);?>">
	                          <img src="<?= $articles[1]->getImage()?>" border="0" alt="<?= $articles[1]->title?>" title="" width="187" height="155" style="display: block;"/>
	                        </a>
	                      </td>
	                    </tr>
	                  </table>
	                </td>
	                <td width="40" style="width:40px;"></td>
	                <td>
	                  <table cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
	                    <tr>
	                      <td>
	                        <a href="<?=Url::toRoute(['site/article', 'id'=>$articles[1]->id]);?>" style="color: #676767; font-family: 'Raleway', arial; font-size: 16px; font-weight: 600; text-transform:uppercase; letter-spacing:.5px; line-height:26px; text-decoration:none;">
	                          <?= $articles[1]->title?>
	                        </a>
	                      </td>
	                    </tr>
	                    <tr>
	                      <td width="100%" height="15"></td>
	                    </tr>
	                    <tr>
	                      <td style="color: #8b8b8b; font-family: 'Raleway', arial; font-weight: 400; font-size: 14px; letter-spacing:.5px; line-height:26px;">
	                        <?= $articles[1]->description?>
	                      </td>
	                    </tr>
	                  </table>
	                </td>
	              </tr>
	            </table>
	          </td>
	        </tr>
	      </table>
	    </td>
	  </tr>
	</table>
  <!--  end content  -->
