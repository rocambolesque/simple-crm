<a href="/">Home</a>
<br/>
<br/>

<?php foreach ($persons as $person): ?>
    <table class="table">
        <?php foreach ($person as $key => $value): ?>
        <tr>
            <td><?php echo $key ?></td>
            <?php if ($key === 'id'): ?>
                <td><a href="/persons/<?php echo $value ?>"><?php echo $value ?></a></td>
            <?php else: ?>
                <td><?php echo $value ?></td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="/persons/<?php echo $person['id'] ?>/edit">Edit</a>
    <a href="/companies/<?php echo $person['company_id']?>">Company</a></td>
    <br/>
    <br/>
<?php endforeach; ?>
