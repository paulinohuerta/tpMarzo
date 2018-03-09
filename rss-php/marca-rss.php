<?php
header('Content-Type: text/html; charset=utf-8');

if (!ini_get('date.timezone')) {
	date_default_timezone_set('Europe/Prague');
}

require_once 'src/Feed.php';

$rss = Feed::loadRss('http://estaticos.marca.com/rss/portada.xml');

?>

<h1><?php echo htmlSpecialChars($rss->title) ?></h1>

<p><i><?php echo htmlSpecialChars($rss->description) ?></i></p>

<?php foreach ($rss->item as $item): ?>
	<h2><a href="<?php echo htmlSpecialChars($item->link) ?>"><?php echo htmlSpecialChars($item->title) ?></a>
	<small><?php echo date("j.n.Y H:i", (int) $item->timestamp) ?></small></h2>
	<p><?php echo htmlSpecialChars($item->category) ?></p>
<?php endforeach ?>

