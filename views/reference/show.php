<a href="/">Home</a>
<br/>
<br/>

<table class="table">
    <?php foreach ($resource as $key => $value): ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><?php echo $value ?></td>
        </tr>
    <?php endforeach; ?>
</table>
