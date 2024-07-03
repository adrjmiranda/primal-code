<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Authors/master');
?>

<div id="content">
	<!-- Side Menu -->

	<?php require_once __DIR__ . '/partials/side-menu.php'; ?>

	<!-- Content Area -->

	<div class="content-area">

		<!-- Content Header -->

		<?php require_once __DIR__ . '/partials/content-header.php'; ?>

		<!-- Content Data -->

		<div class="content-data">
			<div class="inner">
				<form action="/authors/post/update" id="editor-form" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">

					<p class="form_error"><?= isset($errors['not_found']) ? $errors['not_found'] : '' ?></p>
					<div class="input-field">
						<label for="image">Choose an image:</label>
						<input type="file" name="image" id="image" max="1">

						<p class="form_error"><?= isset($errors['image']) ? $errors['image'] : '' ?></p>
					</div>

					<div class="input-field">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" placeholder="Post title"
							value="<?= isset($data['title']) ? $data['title'] : '' ?>">

						<p class="form_error"><?= isset($errors['title']) ? $errors['title'] : '' ?></p>
					</div>

					<div class="input-field">
						<label for="slug">Slug:</label>
						<input type="text" name="slug" id="slug" placeholder="Choose a unique key"
							value="<?= isset($data['slug']) ? $data['slug'] : '' ?>">

						<p class="form_error"><?= isset($errors['slug']) ? $errors['slug'] : '' ?></p>
					</div>

					<div class="input-field" id="editor-field">
						<label for="editor">Post content:</label>
						<textarea name="content" id="editor"
							placeholder="Post content..."><?= isset($data['content']) ? $data['content'] : '' ?></textarea>

						<p class="form_error"><?= isset($errors['content']) ? $errors['content'] : '' ?></p>
					</div>

					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- TinyMCE -->

<script src="https://cdn.tiny.cloud/1/<?= $tinymce_api_key ?>/tinymce/7/tinymce.min.js"
	referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: 'textarea#editor',
		content_css: '<?= $base_url ?>/css/authors/editor.css',
		height: 'calc(100% - 4rem)',
		plugins:
			'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
		toolbar:
			'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Author name',
		mergetags_list: [
			{ value: 'First.Name', title: 'First Name' },
			{ value: 'Email', title: 'Email' },
		],
		ai_request: (request, respondWith) =>
			respondWith.string(() =>
				Promise.reject('See docs to implement AI Assistant')
			),
	});
</script>