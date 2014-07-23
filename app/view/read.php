<?php defined ('TATARUANG') or exit ( 'Forbidden Access' ); ?>


<article class="article" href="http://www.teguhsantoso.com/2011/01/biodiversitas-definisi-dan-batasan.html">
	<div>
		page read article
	</div>
	<?php
	if (isset($news)){
		foreach ($news as $val){
			?>
			<a href="<?=$basedomain?>news/read/<?=$val['encodeUri']?>"><?=$val['title']?></a>
			<?php
		}
	}
	
	if (isset($read)){
		echo "<p>{$read['title']}</p>";
		echo "<p>{$read['desc']}</p>";
	}
	
	?>
</article>
