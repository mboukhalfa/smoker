<?php $title = $firstName . ' ' . $lastName; ?>

<?php ob_start () ?>

    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>
    
    <?php $select = array ('M' => '','W' => ''); $select [$sex]='selected';?>
    <?= $saveChangesAlert ?>
    <br/>
    <img src="<?= 'test/' . $photo ?>" style="max-width: 160px;">
    <form action="<?php $url [ 'myProfile' ] ?>" method="post" enctype="multipart/form-data">
       <input type="text" name = "firstName" value="<?= $firstName ?>" /> <?= $firstNameE ?>
        <input type="text" name = "lastName" value="<?= $lastName ?>" /> <?= $lastNameE ?>
        
        <br/>
        
        <select name="sex" >
            <option value="NULL" selected>sex</option>
            <option value="M" <?= $select['M'] ?> >man</option>
            <option value="W" <?= $select['W'] ?> >woman</option>
        </select>
        
        <br/>
        
        <input type="date" name="birthDate" placeholder="Your birth date">
        <br/>
        <input type="text" name="birthPlace" placeholder="Your birth place">
        <br/>
        <input type="text" name="residence" placeholder="Your residence">
        <br/>
        <input type="file" name="photo" accept="image/*"> <?= $photoE ?>
        <br/>
        <input type="date" name="firstCigarette" placeholder="Your first cigarette">
        <br/>
        <input type="checkbox" name="regret" id="regret"> <label for="regret">I regret my first cigarette</label>
        <br/>
        <input type="checkbox" name="hopeStop" id="hopeStop"> <label for="hopeStop">I hope stop smoking</label>
        <br/>
        <input type="checkbox" name="loveSmoking" id="loveSmoking"> <label for="loveSmoking">I love smoking</label>

        <br/>
        <input type="submit" name="save" value="Save" />
    </form>

<?php $contents = ob_get_clean (); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>