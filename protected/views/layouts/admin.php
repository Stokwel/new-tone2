<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <!-- Top line begins -->
    <div id="top">
        <div class="wrapper">
            <!-- Right top nav -->
            <div class="topNav">
                <ul class="userNav">
                    <li><a title="" class="search"></a></li>
                    <li><a href="#" title="Перейти на сайт" class="screen"></a></li>
                    <li><a href="#" title="" class="settings"></a></li>
                    <li><a href="#" title="" class="logout"></a></li>
                    <li class="showTabletP"><a href="#" title="" class="sidebar"></a></li>
                </ul>
                <a title="" class="iButton"></a>
                <a title="" class="iTop"></a>
                <div class="topSearch">
                    <div class="topDropArrow"></div>
                    <form action="">
                        <input type="text" placeholder="search..." name="topSearch" />
                        <input type="submit" value="" />
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- Top line ends -->

    <!-- Sidebar begins -->
    <div id="sidebar">
        <div class="mainNav">
            <!-- Main nav -->
            <?php $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array(
                    'class' => 'nav'
                ),
            )); ?>
        </div>
    </div>
    <!-- Sidebar ends -->

    <!-- Content begins -->
    <div id="content">
        <div class="contentTop">
            <span class="pageTitle"><?= $this->pageHeader; ?></span>
        </div>

        <!-- Breadcrumbs line -->
        <div class="breadLine">
            <div class="bc">
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'homeLink' => '<li>'.CHtml::link('Панель управления', '/admin').'</li>',
					'tagName' => 'ul',
					'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
					'inactiveLinkTemplate' => '<li class="current"><a href="#">{label}</a></li>',
					'separator' => '',
					'links'=> $this->breadcrumbs,
					'htmlOptions' => array(
						'id' => 'breadcrumbs',
						'class' => 'breadcrumbs'
					)
				)); ?>
            </div>
        </div>
        <!-- Main content -->
        <div class="wrapper">
           
            <?= $content ?>
        </div>
    </div>

</body>
</html>