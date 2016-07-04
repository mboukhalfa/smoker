
<?php $title = $firstName . ' ' . $lastName; ?>

<?php ob_start () ?>

    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>
    
    <?php $select = array (
            'M' => '',
            'W' => '',
            'Y' => '',
            'N' => '',
            '01'=> '',
            '02'=> '',
            '07'=> '',
            
    );

    ?>
    
    <?= $saveChangesAlert ?>
    <br/>
    <img src="<?= $path [ 'profilePhoto'] . $photo .'?' . filemtime($path [ 'profilePhoto'] . $photo) ?>" width="160" height="160">
    <form action="<?php $url [ 'myProfile' ] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" accept="image/*"> <?= $photoE ?>
        <br/>
       <input type="text" name = "firstName" value="<?= $firstName ?>" /> <?= $firstNameE ?>
        <input type="text" name = "lastName" value="<?= $lastName ?>" /> <?= $lastNameE ?>
        
        <br/>
        
        <select name="gender" >
        	<?php $select [ $sex ]='selected'; ?>
            <option value="NULL" selected>Gender</option>
            <option value="M" <?= $select['M'] ?> >Male</option>
            <option value="W" <?= $select['W'] ?> >Female</option>
            <?php $select [ $sex ]=''; ?>
        </select>
        
        <br/>
        <div>
             <select name="birthDateMonth" >
             	<?php  explode( "-", $birthDate )[1] != '00'? $select [explode( "-", $birthDate )[1]]='selected' : ''; ?>
                <option value="">Month</option>
                <option value="01" <?= $select['01'] ?> >January</option>
                <option value="02" <?= $select['02'] ?> >February</option>
                <option value="07" <?= $select['07'] ?> >Jul</option>
                 <?php $select [explode( "-", $birthDate ) [ 1 ] ] = ''; ?>
            </select>
            
            <input type="text" name="birthDateDay" maxlength="2" placeholder="Day" value="<?php echo explode( "-", $birthDate )[2] != '00'? explode( "-", $birthDate )[2] : ''; ?>" />
            <input type="text" name="birthDateYear" maxlength="4" placeholder="Year" value="<?php echo explode( "-", $birthDate )[0] != '0000'? explode( "-", $birthDate )[0] : ''; ?>"/>
            <?= $birthDateE ?>
        </div>
        
        <input type="text" name="residence" placeholder="Your region, country" value="<?= $residence ?>" > <?= $residenceE ?>
        <br/>
          <div>
             <select name="firstCigaretteMonth" >
            	 <?php  explode( "-", $firstCigarette )[1] != '00'? $select [explode( "-", $firstCigarette )[1]]='selected' : ''; ?>
                <option value = "" >Month</option>
                <option value = "01" <?= $select['01'] ?> > January </option>
                <option value = "02" <?= $select['02'] ?> > February </option>
                <?php $select [explode( "-", $firstCigarette ) [ 1 ] ] = ''; ?>
            </select>
            
            <input type="text" name="firstCigaretteDay" maxlength="2" placeholder="Day" value="<?php echo explode( "-", $firstCigarette )[2] != '00'? explode( "-", $firstCigarette )[2] : ''; ?>" />
            <input type="text" name="firstCigaretteYear" maxlength="4" placeholder="Year" value="<?php echo explode( "-", $firstCigarette )[0] != '0000'? explode( "-", $firstCigarette )[0] : ''; ?>" />
        <?= $firstCigaretteE ?>
        </div>
        <fieldset>
        <legend>Do you think to stop?</legend>
        <?php $select [ $hopeStop ]='checked'; ?>
        <input type="radio" name="hopeStop" value="Y" id="hopeStopY" <?= $select [ 'Y' ] ?> > <label for="hopeStopY">I want to stop smoking</label>
        <br />
        <input type="radio" name="hopeStop" value="N" id="hopeStopN" <?= $select [ 'N' ] ?> > <label for="hopeStopN" >I want to stay smoking</label>
        <?php $select [ $hopeStop ]=''; ?>
        </fieldset>
        <fieldset>
        <legend>Do you regret?</legend>
        <?php $select [$regret ]='checked'; ?>
        <input type="radio" name="regret" value="Y" id="regretY" <?= $select [ 'Y' ] ?> > <label for="regretY">Yes, i regret my first cigarette</label>
        <br />
        <input type="radio" name="regret" value="N" id="regretN" <?= $select [ 'N' ] ?>> <label for="regretN">No, i think it was a good experience for me</label>
        <?php $select [$regret ]=''; ?>
        </fieldset>
        <br/>
        <input type="submit" name="save" value="Save" />
    </form>

<?php $contents = ob_get_clean (); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>