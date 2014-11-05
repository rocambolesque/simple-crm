<tr><td colspan="2"><b>Addresses</b></td></tr>
<?php foreach ($addresses as $address ): ?>
    <?php foreach ($address as $key => $value): ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $value ?></td>
        </tr>
    <?php endforeach; ?>
<?php endforeach; ?>
