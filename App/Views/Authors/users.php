<?php
use App\Utils\Template\Generator;

Generator::extendLayout('Authors/master');
?>

<div id="content">
	<!-- Side Menu -->

	<?php require_once __DIR__ . '/partials/side-menu.php'; ?>

	<!-- Content Area -->

	<div class="content-area">
		<div class="content-header">
			<div class="inner">
				<button type="button" id="toggle-menu-btn" data-active="true">
					<ion-icon name="menu"></ion-icon>
				</button>

				<h1 class="session-title">Posts</h1>

				<div class="authors-info">
					<div class="info">
						<span>Welcome!</span>
						<a href="#">Adriano Miranda</a>
					</div>

					<img src="<?= $base_url ?>/img/avatar.png" alt="Adriano Miranda" />
				</div>
			</div>
		</div>

		<!-- Search Options -->

		<div class="search-options">
			<div class="inner">
				<form action="#" id="search-by">
					<input type="search" placeholder="Search..." />
					<button type="submit">
						<ion-icon name="search-outline"></ion-icon>
					</button>
				</form>

				<form action="#" id="sort-by">
					<select name="sort" id="sort">
						<option value="last">Last</option>
						<option value="older">Older</option>
						<option value="alphabetical_order">Alphabetical Order</option>
						<option value="most_commented">Most Commented</option>
						<option value="fewer_commented">Fewer Commented</option>
						<option value="visible">Visible</option>
						<option value="hidden">Hidden</option>
					</select>
				</form>
			</div>
		</div>

		<!-- Content Data -->

		<div class="content-data">
			<div class="inner">
				<div class="data">
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Title</th>
								<th>Date</th>
								<!-- <th>Rate</th> -->
								<th>Comments</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>
									<a href="#">My post</a>
								</td>
								<td>October 6th, 1981</td>
								<!-- <td>4.5<ion-icon name="star"></ion-icon></td> -->
								<td>21</td>
								<td>Visible</td>
								<td>
									<ul>
										<li>
											<a href="#" class="edit-btn">
												<ion-icon name="create-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="toggle-visibility-btn">
												<ion-icon name="eye-off-outline"></ion-icon>
											</a>
										</li>
										<li>
											<a href="#" class="remove-btn">
												<ion-icon name="trash-outline"></ion-icon>
											</a>
										</li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>