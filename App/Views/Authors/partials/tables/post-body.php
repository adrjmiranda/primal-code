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
            <a href="/authors/post/visibility/<?= $post->id ?>" class="toggle-visibility-btn">
              <?php if ($post->status === 'hidden'): ?>
                <ion-icon name="eye-outline"></ion-icon>
              <?php endif; ?>

              <?php if ($post->status === 'visible'): ?>
                <ion-icon name="eye-off-outline"></ion-icon>
              <?php endif; ?>
            </a>
          </li>
          <li>
            <a href="/authors/post/remove/<?= $post->id ?>" class="remove-btn">
              <ion-icon name="trash-outline"></ion-icon>
            </a>
          </li>
        </ul>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>