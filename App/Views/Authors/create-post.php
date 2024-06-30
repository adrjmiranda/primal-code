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
				<form action="#" id="editor-form">
					<textarea name="post" id="editor">
								Welcome to TinyMCE!
							</textarea>

					<button type="submit" class="btn btn-primary">Create</button>
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
			'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
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