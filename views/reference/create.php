<a href="/">Home</a>
<br/>
<br/>

<form action="/<?php echo $resourceName ?>/create" method="post">
    <table class="table">
        <?php foreach ($fields as $value): ?>
            <tr>
                <td><?php echo $value ?></td>
                <td><input name="<?php echo $value ?>" type="text" /></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" />
</form>
