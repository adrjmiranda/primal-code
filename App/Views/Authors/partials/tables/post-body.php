<tbody>
  <?php foreach ($data as $post): ?>
    <tr>
      <td><?= $post->id ?></td>
      <td>
        <a href="#"><?= $post->title ?></a>
      </td>
      <td><?= $post->updated_at ?></td>
      <td><?= $post->number_of_comments ?></td>
      <td><?= $post->status ?></td>
      <td>
        <ul>
          <li>
            <a href="/authors/post/edit/<?= $post->id ?>" class="edit-btn">
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
  <?php endforeach; ?>
</tbody>