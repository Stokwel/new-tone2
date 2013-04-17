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
    </head>
	<body>
        <?= $content ?>
    </body>
</html>