<table>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>
<?php
	foreach ($sth as $value) {
		?>	
		<tr>
		  <td><?= $value['name'] ?></td>
		  <td><?= $value['author'] ?></td>
		  <td><?= $value['year'] ?></td>
		  <td><?= $value['genre'] ?></td>
		  <td><?= $value['isbn'] ?></td>
		</tr>
		<?php		
	}
	?>
	</table>