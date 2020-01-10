<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 20/01/10
 * Time: 09:36 AM
 */
?>
<?php foreach ($clubs as $c) { ?>
    <option value="<?=$c['club_id']?>"><?=$c['name']?></option>
<?php } ?>
