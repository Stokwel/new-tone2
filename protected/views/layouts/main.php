<?php
	/* @var $this Controller */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?= $this->pageTitle ?></title>
		<meta name="keywords" content="<?= $this->keywords ?>" />
		<meta name="description" content="<?= $this->description ?>" />

        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?= CHtml::linkTag('stylesheet', 'text/css', Yii::app()->request->baseUrl.'/css/style.css', 'screen, projection') ?>
        <?= CHtml::linkTag('icon', 'image/x-icon', Yii::app()->request->baseUrl.'/favicon.ico', 'screen, projection') ?>
    </head>
	<body>
		<header class="up">
			<a href="/" title="Автозабота - забота о Вашем автомобиле!" class="logo"></a>
			<div class="auto"></div>
			<div class="bucket">
				<div class="head">Ваша корзина</div>
				<a href="#" title="Оформить ваш заказ">
					<div class="info">Товаров в корзине: <span>0</span><br>На сумму: <span>0.00 руб.</span></div>
					<?= CHtml::link('Оформить заказ', '/order', array('class' => 'but')); ?>
				</a>
			</div>
		</header>

		<div class="menu">
			<nav class="menu_block">
				<?php $this->widget('application.components.LeftMenu', array(
					'linkLabelWrapper' => 'nav',
					'linkLabelWrapperHtmlOptions' => array('class' => 'but'),
					'items' => $this->buildMenu(),
				)); ?>
<!--				<a href="#" title="О магазине Автозабота"><div class="but active">О магазине</div></a>-->
<!--				<a href="#" title="Наш шиномонтаж и запись на прием"><div class="but">Наш шиномонтаж</div></a>-->
<!--				<a href="#" title="Доставка дисков и шин по городу и области"><div class="but">Доставка заказа</div></a>-->
<!--				<a href="#" title="Заправка и ремонт автокондиционеров"><div class="but">Заправка и ремонт автокондиционеров</div></a>-->
<!--				<a href="#" title="Оценка б/у автомобиля с выездом"><div class="but">Оценка б/у автомобиля</div></a>-->
<!--				<a href="#" title="Сезонное хранение шин"><div class="but">Хранение шин</div></a>-->
<!--				<a href="#" title="Контактная информация"><div class="but">Контакты</div></a>-->
			</nav>
		</div>

		<?php
			$vendors = Vendor::getVendors();
			$vendorsData = CHtml::listData($vendors, 'vendor_id', 'vendor_name');

			$bus = new Tyre();
			if (isset($_GET['Tyre'])) {
				$bus->attributes = $_GET['Tyre'];
			}

			$modelSize = new TyreSize();
			if (isset($_GET['TyreSize'])) {
				$modelSize->attributes = $_GET['TyreSize'];
			}

			$wheel = new WheelModel();
		?>

		<script>
			$(function() {
				$('#tyresSelect').on('click', function() {
					document.tyres.submit();
				});
			});
		</script>
		<div class="select">
			<div class="sel_tire">
				<div class="head">Подбор шин</div>
				<form name="tyres" action="<?= $this->createAbsoluteUrl('/tyres/selection')?>" method="get">
					<div class="sel_selects">
						<?= CHtml::activeDropDownList($bus, 'vendor_id', $vendorsData, array(
							'empty' => 'Бренд',
							'class' => 's1',
						)); ?><br />
						<?= CHtml::activeDropDownList($modelSize, 'size_width', TyreSize::getAllWidth(), array(
							'empty' => 'Ширина',
							'class' => 's2',
						)); ?><br />
						<?= CHtml::activeDropDownList($modelSize, 'size_profile', TyreSize::getAllProfile(), array(
							'empty' => 'Профиль',
							'class' => 's3',
						)); ?><br />
						<?= CHtml::activeDropDownList($modelSize, 'size_radius', TyreSize::getAllRadius(), array(
							'empty' => 'Диаметр',
							'class' => 's4',
						)); ?><br />
						<?= CHtml::activeDropDownList($bus, 'season_id', Tyre::getSeason(), array(
							'empty' => 'Сезон',
							'class' => 's5',
						)); ?><br />
					</div>
					<a id="tyresSelect" href="#"><div class="but">Подобрать</div></a>
				</form>
			</div>

			<script>
				$(function() {
					$('#wheelSelect').on('click', function() {
						document.tyres.submit();
					});
				});
			</script>
			<div class="sel_wheel">
				<div class="head">Подбор дисков</div>
				<div class="sel_selects">
					<form name="wheels" action="<?= $this->createAbsoluteUrl('/wheels/selection')?>" method="get">
						<?= CHtml::activeDropDownList($wheel, 'vendor_id', $vendorsData, array(
							'empty' => 'Бренд',
							'class' => 's1',
						)); ?><br />
						<select name="name" class="s2"><option>Ширина обода</option></select><br>
						<select name="name" class="s3"><option>Диаметр</option></select><br>
						<select name="name" class="s4"><option>PCD</option></select><br>
						<select name="name" class="s5"><option>Вылет (ET)</option></select><br>
						<select name="name" class="s6"><option>DIA</option></select>
					</form>
				</div>
				<a id="wheelSelect" href="#"><div class="but">Подобрать</div></a>
			</div>

			<script>
				$(function() {
					$('#autoSelect').on('click', function() {
						document.tyres.submit();
					});
				});
			</script>
			<div class="sel_car">
				<div class="head">Подбор по авто</div>
				<div class="sel_selects">
					<form name="auto" action="<?= $this->createAbsoluteUrl('/auto')?>" method="get">
						<select name="name" class="s1"><option>Марка</option></select><br>
						<select name="name" class="s2"><option>Модель</option></select><br>
						<select name="name" class="s3"><option>Год выпуска</option></select><br>
						<select name="name" class="s4"><option>Двигатель</option></select>
					</form>
				</div>
				<a id="autoSelect" href="#"><div class="but">Подобрать</div></a>
			</div>
		</div>

        <div class="center_block">
            <div class="left">
                <div class="left_menu">
					<?php $this->widget('application.components.LeftMenu', array(
						'linkLabelWrapper' => 'div',
						'linkLabelWrapperHtmlOptions' => array('class' => 'but'),
						'items' => array(
							array('label' => 'Каталог дисков', 'url'=>array('tyres/index')),
							array('label' => 'Подбор дисков', 'url'=>array('tyres/selection')),
							array('label' => 'Каталог шин', 'url'=>array('wheels/index')),
							array('label' => 'Подбор шин', 'url'=>array('wheels/selection')),
							array('label' => 'Подбор под авто', 'url'=>array('auto/index')),
							array('label' => 'Запись на прием', 'url'=>array('tyres/reception')),
							array('label' => 'Контакты', 'url'=>array('default/contacts')),
						)
					)); ?>

<!--					<a href="#" title="Каталог дисков для автомобилей"><div class="but">Каталог дисков</div></a>-->
<!--					<a href="#" title="Подбор дисков для автомобилей по характеристикам"><div class="but2">Подбор дисков</div></a>-->
<!--					<a href="#" title="Каталог шин для автомобилей"><div class="but">Каталог шин</div></a>-->
<!--					<a href="#" title="Подбор шин для автомобилей по характеристикам"><div class="but2">Подбор шин</div></a>-->
<!--					<a href="#" title="Подбор дисков и шип под автомобиль определенной марки и модели"><div class="but">Подбор под авто</div></a>-->
<!--					<a href="#" title="Заявка на шиномонтаж онлайн"><div class="but2">Запись на прием</div></a>-->
<!--					<a href="#" title="Контактная информация"><div class="but">Контакты</div></a>-->

                    <?php $this->widget('application.components.LeftMenu', array(
                        'linkLabelWrapper' => 'div',
                        'linkLabelWrapperHtmlOptions' => array('class' => 'but'),
                        'items' => $this->buildMenu()
                    )); ?>
                </div>
                <div class="banners">
                    <div class="image"><a href="#" alt="Как с нами связаться?"><img src="/images/banner_phone.png" border="0" title="Как с нами связаться?"></a></div>
                </div>
            </div>
            <div class="right">
                <?= $content ?>
            </div>
        </div>
		<div class="special">
			<a href="#" alt="У нас действуют специальные предложения и скидки для Вас!">
				<img src="/images/special.png" border="0" title="У нас действуют специальные предложения и скидки для Вас!">
			</a>
		</div>

		<?php $this->widget('zii.widgets.CListView', array(
			'template' => '{items}',
			'dataProvider' => Vendor::getFatVendorDataProvider(18),
			'itemView' => '//tyres/_viewVendor',
			'itemsCssClass' => 'brends',
		)); ?>

        <footer class="footer">
            <div class="left">
                <div class="text">
                    © 2011 Интернет-проект<span>АвтоЗабота</span><br />Интернет-магазин в Москве
                </div>
            </div>
            <div class="right">
                <div class="text">
                    <span>Магазин-шиномонтаж:</span> г. Москва ул. Римского-Корсакова вл. 19<br>
                    <span>Сервис-шиномонтаж:</span> г. Москва ул. Отрадный проезд д. 4а<br>
                    <span>Телефон:</span> 8 (495) 978-61-93, <span>Мобильный:</span> 8 (916) 91-21-999
                </div>
            </div>
        </footer>
        <div class="empty"></div>
    </body>
</html>