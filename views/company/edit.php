<a href="/">Home</a>
<br/>
<br/>

<form action="/companies/<?php echo $parameters['id'] ?>/edit" method="post">
    <table class="table">
        <?php foreach ($company as $key => $value): ?>
            <?php if (in_array($key, ['id'])): ?>
                <input name="<?php echo $key ?>" value="<?php echo $value ?>" type="hidden" />
            <?php else: ?>
                <?php if ($key === 'addresses'): ?>
                    <?php $addresses = $value; require(__DIR__.'/../address/edit.php') ?>
                <?php else: ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><input name="<?php echo $key ?>" value="<?php echo $value ?>" type="text" /></td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <input type="submit" />
</form>
