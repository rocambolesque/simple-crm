<a href="/">Home</a>
<br/>
<br/>

<?php foreach ($companies as $company): ?>
    <b><?php echo $company['name'] ?></b>
    <table class="table">
        <?php foreach ($company as $key => $value): ?>
            <?php if ($key === 'addresses'): ?>
                <?php $addresses = $value; require(__DIR__.'/../address/show.php') ?>
            <?php else: ?>
                <tr>
                    <td><?php echo $key ?></td>
                    <?php if ($key === 'id'): ?>
                        <td><a href="/companies/<?php echo $value ?>"><?php echo $value ?></a></td>
                    <?php else: ?>
                        <td><?php echo $value ?></td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <a href="/companies/<?php echo $company['id'] ?>/edit">Edit</a>
    <a href="/companies/<?php echo $company['id'] ?>/persons">Persons</a>
    <br/>
    <br/>
<?php endforeach; ?>
