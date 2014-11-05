<?php foreach ($addresses as $index => $address ): ?>
    <tr><td colspan="2"><b>Address <?php echo $index+1 ?></b></td></tr>
    <?php foreach ($address as $key => $value): ?>
        <?php if (in_array($key, ['id', 'company_id'])): ?>
            <input name="addresses[<?php echo $index ?>][<?php echo $key ?>]" value="<?php echo $value ?>" type="hidden" />
        <?php else: ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><input name="addresses[<?php echo $index ?>][<?php echo $key ?>]" value="<?php echo $value ?>" type="text" /></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
