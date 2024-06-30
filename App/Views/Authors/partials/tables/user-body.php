<tbody>
  <?php foreach ($data as $user): ?>
    <tr>
      <td><?= $user->id ?></td>
      <td>
        <a href="#"><?= $user->name ?></a>
      </td>
      <td><?= $user->email ?></td>
      <td><?= (new DateTime($user->created_at))->format('F jS, Y') ?></td>
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
  <?php endforeach; ?>
</tbody>