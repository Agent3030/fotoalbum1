<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\components\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Pjax;




AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<?php $this->registerMetaTag(['name' => 'description','content' => Yii::t('app', 'META_DESCRIPTION')]) ?>
<?php $this->registerMetaTag(['name'=>'keywords', 'content' => Yii::t('app', 'META_KEYWORDS')]);?>
<?php $this->registerMetaTag(['name'=>'author', 'content' => Yii::t('app', 'META_AUTHOR')]);?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?= Html::csrfMetaTags() ?>

<!-- SITE TITLE -->
<title><?=Yii::$app->name ?></title>

<!-- =========================
      FAV AND TOUCH ICONS  
============================== -->
<link rel="icon" href="\images\favicon.ico">
<link rel="apple-touch-icon" href="\images\apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="\images\apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="\images\apple-touch-icon-114x114.png">



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62774174-1', 'auto');
  ga('send', 'pageview');

</script>

<?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER   
============================== -->
<header id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay">
	
	<div class="navigation-header">
		
		<!-- STICKY NAVIGATION -->
		
				
				<!-- NAVIGATION LINKS -->
				<?php
                                    NavBar::begin([
                                        'brandLabel' =>Html::img('@web/images/logo-dark.png', ['alt'=>Yii::$app->name]),
                                        'brandUrl' => Yii::$app->homeUrl,
                                        'brandOptions' => ['class' => 'navbar-brand'],
                                        'options' => [
                                            'class' => 'navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation',
                                            'id' => 'landx-navigation',
                                            
                                        ],
                                    ]);
                                    echo Nav::widget([
                                        'options' => ['class' => 'nav navbar-nav navbar-right main-navigation',
                                             ],
                                        'items' => array_filter([
                                                ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/main/default/index']],
                                                ['label' => Yii::t('app', 'NAV_NEWS'), 'url' => ['/main/news/index']],
                                                ['label' => Yii::t('app', 'NAV_PARTNERSHIP'), 'items' => [
                                                    ['label' => Yii::t('app', 'NAV_PARTNERS'), 'url' => ['#section1']],
                                                    ['label' => Yii::t('app', 'NAV_PHOTGRAPHERS'), 'url' => ['#']]]],
                                                ['label' => Yii::t('app', 'NAV_PRODUCTS'), 'url' => ['#section3'] ],
                                                ['label' => Yii::t('app', 'NAV_ABOUT'), 'url' => ['#section4'] ],
                                                ['label' => Yii::t('app', 'NAV_CONTACT'), 'url' => ['/main/contact/index'] ],
                                                ['label' => Html::img('@web/images/cert-2.png', ['alt'=>Yii::$app->name]), 'url' => '#'],
                                                
                                                                ]),
                                        'encodeLabels' => false,
                                    ]);
                                    NavBar::end();
                                    ?>
                                
			
			<!-- /END CONTAINER -->
			
		
		
		<!-- /END STICKY NAVIGATION -->
		
		<!-- ONLY LOGO ON HEADER -->
		<div class="navbar non-sticky">
			
			<div class="container">
				
				<div class="navbar-header">
					<?= Html::img('@web/images/logo.png');?>
				</div>
			 <div class="nav navbar-nav navbar-left auth-form">	
      
      <?php if(Yii::$app->user->isGuest):?>
       <?= app\components\widgets\Login::widget(['model' => app\modules\user\models\LoginForm::className()]) ?>                    
      
       
       <?php else:?>
           <?php echo Nav::widget([
                                        'options' => ['class' => 'nav navbar-nav navbar-left',
                                             ],
                                        'items' => array_filter([
                                                ['label' => Yii::t('app', 'NAV_USER_CABINET'), 'url' => ['/user/cabinet/index']],
                                                ['label' => Yii::t('app', 'NAV_USER_lOGOUT'), 'url' => ['/user/default/logout'],'linkOptions' => ['data-method' => 'post']],
                                                
                                                
                                                                ]),
                                        'encodeLabels' => false,
                                    ]);
           ?>
                             
       <?php endif;?>                             
                </div>
                            
				<ul class="nav navbar-nav navbar-right social-navigation hidden-xs">
				    <li><a href="https://instagram.com/ebru_photobook_"><i class="social_instagram_circle"></i></a></li>
					<li><a href="https://www.facebook.com/ebruphotobook"><i class="social_facebook_circle"></i></a></li>
					<li><a href="https://plus.google.com/b/103030910887343706273/103030910887343706273/posts?cfem=1"><i class="social_googleplus_circle"></i></a></li>
					<li><a href="https://vk.com/ebruphotobook"><i class="fa fa-vk"></i></a></li>
				</ul>
			</div>
			<!-- /END CONTAINER -->
			
		</div>
		<!-- /END ONLY LOGO ON HEADER -->
		
	</div>
	
	<!-- HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
	<div class="container">
		
		<div class="row">
			
			<!-- LEFT - HEADING AND TEXTS -->
			<div class="col-md-7 col-sm-7 intro-section">
				
				<h1 class="intro text-left">
				<strong>Фотокниги EBRU</strong><br> для профессионалов
				</h1>
				
				<ul class="feature-list-1">
					
					<!-- FEATURE ROW -->
					<li>
					<div class="icon-container pull-left">
						<img src="/images/tulpan.png">
					</div>
					<p class="text-left">
                        <b>Фотокниги</b> - для профессиональных фотографов и фотосалонов!<!-- понимаем их потребности, помогаем впечатлять клиентов.-->
					</p>
					</li>
					
					<!-- FEATURE ROW -->
					<li>
					<div class="icon-container pull-left">
						<img src="\images\tulpan.png">
					</div>
					<p class="text-left">
						<b>Фотоальбом</b> – это целая эпоха для каждой семьи!
					</p>
					</li>
					
					<!-- FEATURE ROW -->
					<li>
					<div class="icon-container pull-left">
						<img src="\images\tulpan.png">
					</div>
					<p class="text-left">
                        <b>Большой ассортимент</b> фотоальбомов на все случаи жизни!
					</p>
					</li>
				</ul>
		<?= Html::a('Рассчитать стоимость', ['/calculator/default/index'], ['class'=>'large-button pull-left']) ?>		
                
               
			</div>
			
			<!-- RIGHT - REGISTRATION FORM -->
			
			<div class="col-md-5 col-sm-5">
				<div class = "news-wrapper pull-right">
                    <div class="news">
                       <div class="news news-header">
                           <h5>новости</h5>
                        </div>
                       <div class="news news-table">
                           <div id ="news-container">
                           </div>    
                               
                       <?php $script = <<< JS
    $(document).ready(function(){
         function getAjaxRequest() {         
      $.ajax({
         type: "POST",
         url: "/main/default/ajax-news",      
         success: function(data){
            $('#news-container').html(data);
         }
   });
       }
     getAjaxRequest();                          
     setInterval(getAjaxRequest,5000);     

    
    });
JS;
$this->registerJs($script);   
?>
                       
                            
                       </div>    
                        
                    </div>       
                
				    
				</div>
				<!--<div class="vertical-registration-form">
					<div class="colored-line">
					</div>
					<img src="\images\certificate.png">
					<h3>Try Premium Account</h3>
					<form class="registration-form" id="register" role="form">
						<input class="form-control input-box" id="name" type="text" name="name" placeholder="Your Name">
						<input class="form-control input-box" id="email" type="email" name="email" placeholder="Your Email">
						<input class="form-control input-box" id="phone-number" type="text" name="phone-number" placeholder="Phone Number">
						<button class="btn standard-button" type="button" id="submit" name="submit">Get Started</button>
					</form>
					-->
				</div>
			</div>
			<!-- /END - REGISTRATION FORM -->
		</div>
		
	</div>
	<!-- /END HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
	
</div>

</header>


<!-- =========================
     SECTION 1   
============================== -->
 <?= Alert::widget() ?>
        <?= $content ?>
<!-- =========================
     SECTION 4   
============================== -->
<section class="section4 bgcolor-2" id="section4">
<div class="container">
	
	<!-- SECTION HEADING -->
	<h2>О компании</h2>
	<div class="colored-line">
	</div>
	
	<div class="sub-heading" style="text-align:left !important;">
Рекламное агентство «MEDIA-STAR» сертифицированный партнер ведущего турецкого производителя фотоальбомов EBRU в Украине.<br><br>
Самый крупный завод по производству классических и панорамных фотоальбомов EBRU работает с 2006 года и  находится в Турции,  площадь  производства 3000м2, возможность  фотопечати шириной до 127 см, цифровая печать 30*45 см. Производитель EBRU имеет сертификат качества, соответствующий стандартам ISO 9001.<br><br>
Мы рады пригласить к сотрудничеству профессиональных и начинающих фотографов, фотостудии и компании  в сфере фото-индустрии.<br><br>
С нами работает более 2000 профессиональных фотографов.<br><br>
«MEDIA-STAR»  не занимается прямыми продажами, а работает только с партнерами по поставкам, оптовой и розничной продаже оригинальных и эксклюзивных фотоальбомов.<br><br>
Мы ориентированы на долгосрочную совместную работу!<br><br>
Рады будем сотрудничать с Вами!
	</div>
	
	
</div> <!-- /END CONTAINER -->

</section>

<!-- =========================
     SECTION 8 - CTA  
============================== -->
<section class="cta-section" id="section8">
<div class="color-overlay">
	
	<div class="container">
		
		<!--<h4>We Are Ready to Help You</h4>-->
		<h2>Будем рады видеть Вас среди наших партнеров</h2>
		<div id="cta-4">
		<!--	<a href="#home" class="btn standard-button"> Get Started</a>-->
		</div>
		
		<!-- MAILCHIMP SUBSCRIBE FORM / REMOVE 'hidden' CLASS TO MAKE FORM VISIBLE -->
		
		<div class="subscribe-section hidden">
			
			<h3>Or, Mailchimp Subscription Form</h3>
			
			<form class="subscription-form mailchimp form-inline" role="form">
				
				<!-- SUBSCRIPTION SUCCESSFUL OR ERROR MESSAGES -->
				<h6 class="subscription-success"></h6>
				<h6 class="subscription-error"></h6>
				
				<!-- EMAIL INPUT BOX -->
				<input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">
				
				<!-- SUBSCRIBE BUTTON -->
				<button type="submit" id="subscribe-button" class="btn standard-button">Subscribe</button>
				
			</form>
		</div>
		<!-- /END SUBSCRIPTION FORM -->
		
	</div>  <!-- /END CONTAINER -->
</div>  <!-- /END COLOR OVERLAY -->

</section>

<!-- =========================
     SECTION 9 - CONTACT US  
============================== -->
<section class="contact-us" id="section9">
<div class="container">
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
            <h3 class="heading">Возникли вопросы? Связывайтесь с нами!</h3>
            <h3>+38 (044) 207-01-30<br>
                        г. Киев, ул. Казимира Малевича 86г, офис 204</h3>
			<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d898.8453415339486!2d30.51932320964336!3d50.416536398475905!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2s!4v1444495106525" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			
                 
			
			
			<a href="#home" class="contact-link expand-form"><span class="icon_mail_alt"></span>Контактная форма</a>
			
			<!-- EXPANDED CONTACT FORM -->
			<div class="expanded-contact-form">
				
				<!-- FORM -->
				<form class="contact-form" id="contact" role="form">
					
					<!-- IF MAIL SENT SUCCESSFULLY -->
					<h6 class="success">
					<span class="olored-text icon_check"></span> Ваше сообщение успешно отправлено. </h6>
					
					<!-- IF MAIL SENDING UNSUCCESSFULL -->
					<h6 class="error">
					<span class="colored-text icon_error-circle_alt"></span> E-mail должен быть правильным и сообщение должно быть больше 1-го символа. </h6>
					
					<div class="field-wrapper col-md-6">
						<input class="form-control input-box" id="cf-name" type="text" name="cf-name" placeholder="Ваше имя">
					</div>
					
					<div class="field-wrapper col-md-6">
						<input class="form-control input-box" id="cf-email" type="email" name="cf-email" placeholder="Email">
					</div>
					
					<div class="field-wrapper col-md-12">
						<input class="form-control input-box" id="cf-subject" type="text" name="cf-subject" placeholder="Тема">
					</div>
					
					<div class="field-wrapper col-md-12">
						<textarea class="form-control textarea-box" id="cf-message" rows="7" name="cf-message" placeholder="Ваше сообщение"></textarea>
					</div>
					
					<button class="btn standard-button" type="submit" id="cf-submit" name="submit" data-style="expand-left">Отправить</button>
				</form>
				<!-- /END FORM -->
			</div>
			
		</div>
	</div>
	
</div>

</section>
<!-- =========================
     SECTION 10 - FOOTER 
============================== -->
<footer class="bgcolor-2">
<div class="container">
	
	<div class="footer-logo">
		<img src="\images\logo-dark.png" alt="">
	</div>
	
	<div class="copyright">
		 ©2015 MEDIA-STAR. All Rights Reserved.  <br><br>
		Разработка сайта: <a href="http://www.linecore.com" target="_blank">веб-студия Linecore</a>
	</div>
	
	<ul class="social-icons">
<!--		<li><a href="#"><span class="social_facebook_square"></span></a></li>
		<li><a href="#"><span class="social_twitter_square"></span></a></li>
		<li><a href="#"><span class="social_googleplus_square"></span></a></li>
		<li><a href="#"><span class="social_linkedin_square"></span></a></li>
-->
	</ul>
	
</div>
</footer>


<!-- =========================
     SCRIPTS   
============================== -->





<?php $this->endBody() ?>
<script>
/* =================================
   LOADER                     
=================================== */
// makes sure the whole site is loaded
jQuery(window).load(function() {
	"use strict";
        // will first fade out the loading animation
	jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery(".preloader").delay(1000).fadeOut("slow");
})

</script>

</body>
</html>
<?php $this->endPage() ?>