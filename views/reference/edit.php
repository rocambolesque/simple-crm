<a href="/">Home</a>
<br/>
<br/>

<form action="/<?php echo $parameters['resource'] ?>/<?php echo $parameters['id'] ?>/edit" method="post">
    <table class="table">
        <?php foreach ($resource as $key => $value): ?>
            <tr>
                <td><?php echo $key ?></td>
                <td><input name="<?php echo $key ?>" value="<?php echo $value ?>" type="text" /></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" />
</form>
