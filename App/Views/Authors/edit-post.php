<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Authors/edmaster');
?>

<div id="content">
	<!-- Side Menu -->

	<?php require_once __DIR__ . '/partials/side-menu.php'; ?>

	<!-- Content Area -->

	<div class="content-area">

		<!-- Content Header -->

		<?php require_once __DIR__ . '/partials/content-header.php'; ?>

		<!-- Content Data -->

		<div class="content-data" id="post-form">
			<div class="inner">
				<form action="/authors/post/update" id="editor-form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

					<input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">

					<div class="input-field">
						<label for="image">Choose an image:</label>
						<input type="file" name="image" id="image" max="1">

						<p class="form_error"><?= isset($errors['image']) ? $errors['image'] : '' ?></p>
					</div>

					<div class="input-field">
						<label>Select categories:</label>

						<?php foreach ($categories as $category): ?>
							<div class="check-field">
								<label for="category-<?= $category->id ?>">
									<input type="checkbox" name="categories[]" id="category-<?= $category->id ?>" value="<?= $category->id ?>" <?php foreach ($selected_categories as $selectedCategory): ?>
										<?php if ($selectedCategory->category_id == $category->id): ?>
											checked
										<?php break; ?>
										<?php endif; ?>
										<?php endforeach; ?>><?= $category->name ?>
								</label>
							</div>
						<?php endforeach; ?>


						<p class="form_error"><?= isset($errors['categories']) ? $errors['categories'] : '' ?></p>
					</div>

					<div class="input-field">
						<label for="title">Title:</label>
						<input type="text" name="title" id="title" placeholder="Post title"
							value="<?= isset($data['title']) ? $data['title'] : '' ?>">

						<p class="form_error"><?= isset($errors['title']) ? $errors['title'] : '' ?></p>
					</div>

					<div class="input-field">
						<label for="description">Description:</label>
						<textarea name="description" id="description" placeholder="Post description..."
							rows="5"><?= isset($data['description']) ? $data['description'] : '' ?></textarea>

						<p class="form_error"><?= isset($errors['description']) ? $errors['description'] : '' ?></p>
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