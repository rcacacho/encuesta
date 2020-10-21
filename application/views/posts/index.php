<!DOCTYPE html>
<html lang="en">

<head>
	<title>Generate SEO Friendly URL in CodeIgniter</title>
</head>

<body>
	<div class="container">
		<h1>Post List</h1>
		<div class="row">
			<ul class="post-list">
				<?php if (!empty($posts)) : foreach ($posts as $post) : ?>
						<li><a href="<?php echo base_url('post/' . $post['url_slug']); ?>"><?php echo $post['title']; ?></a></li>
					<?php endforeach;
				else : ?>
					<p>Post(s) not available.</p>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</body>

</html>
