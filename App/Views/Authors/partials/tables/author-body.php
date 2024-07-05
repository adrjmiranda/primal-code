<tbody>
  <?php foreach ($data as $author): ?>
    <tr>
      <td><?= $author->id ?></td>
      <td>
        <a href="#"><?= $author->name ?></a>
      </td>
      <td><?= $author->email ?></td>
      <td><?= (new DateTime($author->created_at))->format('F jS, Y') ?></td>
      <td>
        <ul>
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