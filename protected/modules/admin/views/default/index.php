<ul>
	<?php foreach($links as $name => $link){ ?>
		<li>
			<a href='<?= $link; ?>'><?=$name;?></a>
		</li>
	<?php } ?>
</ul>