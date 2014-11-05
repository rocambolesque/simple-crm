<a href="/">Home</a>
<br/>
<br/>

<form action="/persons/<?php echo $parameters['id'] ?>/edit" method="post">
    <table class="table">
        <?php foreach ($person as $key => $value): ?>
            <?php if (strstr('id', $key)): ?>
                <input name="<?php echo $key ?>" value="<?php echo $value ?>" type="hidden" />
            <?php else: ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <td><input name="<?php echo $key ?>" value="<?php echo $value ?>" type="text" /></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <input type="submit" />
</form>
