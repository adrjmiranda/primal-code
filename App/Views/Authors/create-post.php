<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon" />
		<title>Primal Code | Authors</title>

		<!-- Styles -->

		<link rel="stylesheet" href="<?= $base_url ?>/css/authors/master.css" />

		<!-- TinyMCE -->

		<script
			src="https://cdn.tiny.cloud/1/TINYMCE_API_KEY/tinymce/7/tinymce.min.js"
			referrerpolicy="origin"
		></script>

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

		<!-- Scripts -->

		<script defer src="<?= $base_url ?>/js/authors.js"></script>
	</head>
	<body>
		<div id="content">
			<!-- Side Menu -->

			<div class="side-menu">
				<div class="inner">
					<button type="button" id="close-mobile-menu">
						<ion-icon name="arrow-undo"></ion-icon>
					</button>

					<div class="menu-header">
						<img src="<?= $base_url ?>/img/code.png" alt="Primal Code Logo" loading="eager" />
						<h3>Primal Code</h3>
					</div>

					<ul class="menu">
						<li>
							<a href="#" class="active"
								><ion-icon name="book"></ion-icon>Posts</a
							>
						</li>

						<li>
							<a href="#"><ion-icon name="people"></ion-icon>Users</a>
						</li>

						<li>
							<a href="#"
								><ion-icon name="people-circle"></ion-icon>Authors</a
							>
						</li>

						<li>
							<a href="#"><ion-icon name="add-circle"></ion-icon>New post</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Content Area -->

			<div class="content-area">
				<div class="content-header">
					<div class="inner">
						<button type="button" id="toggle-menu-btn" data-active="true">
							<ion-icon name="menu"></ion-icon>
						</button>

						<h1 class="session-title">Create Post</h1>

						<div class="authors-info">
							<div class="info">
								<span>Welcome!</span>
								<a href="#">Adriano Miranda</a>
							</div>

							<img src="<?= $base_url ?>/img/avatar.png" alt="Adriano Miranda" />
						</div>
					</div>
				</div>

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

		<!-- Ion Icons -->

		<script
			type="module"
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
		></script>
		<script
			nomodule
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
		></script>
	</body>
</html>
