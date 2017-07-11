<?php $title = $firstName . ' ' . $lastName; ?>

<?php ob_start () ?>
    <?php
        $sexTerm = array (
            'M' => 'Mr. ',
            'W' => 'M. ',
            ''  => '',
        );
        
        $hopeStopTerm = array (
                'Y' => 'want to stop smoking as soon as possible',
                //'Y' => 'say no to smoking',
                //'Y' => 'soon will crash this cigarette and continue his life effectivly',
                'N' => ' want to stay smoking for the rest of his life',
        );
        
        $regretTerm = array (
                'Y' => 'regret his first cigarette, if he\'ll return in the time he just will never smoke',
                'YY' => 'regret his first cigarette, if he\'ll return in the time he just will never smoke',
                'YN'=> 'think that even if he will stay smoking for the rest of his life but he regret his first cigarette',
                'N' => 'think that his first cigarette and this period of smoking was a good experience for him',
                'NN' => 'think that his first cigarette and this period of smoking was a good experience for him',
                'NY'=> 'think that this period of smoking make him see things clearly, smoking does not help for anything'
        );
    ?>
    <?php require_once ( $page [ 'view' ] [ 'nav' ] ); ?>

    <a href="<?= $url [ 'myProfile' ] . '&edit'?>">edit your profile</a>
    <br/>
    <img src="<?= $path [ 'profilePhoto'] . $photo .'?' . filemtime($path [ 'profilePhoto'] . $photo)  ?>" width = "160" height = "160">
    <br />
    
    <?= $sexTerm [$sex] . $firstName . ' ' . $lastName ?>
    <br/>
    
    <?php if ( $birthDate && $birthDate !== '0000-00-00' ) { ?>
        birth date : <?= $birthDate ?>
    	<br />
    <?php } ?>
    
    <?php if ( $residence ) { ?>
        residence : <?= $residence ?>
    	<br />
    <?php } ?>
    
    <?php if ( $firstCigarette && $firstCigarette !== '0000-00-00' ) { ?>
        first cigarette : <?= $firstCigarette ?>
        <br />
    <?php } ?>
    
    <?php if ( $hopeStop ) { ?>
    	<?= $firstName . ' ' . $hopeStopTerm [ $hopeStop ] ?> 
    	<br />
    <?php } ?>
    
    <?php if ( $regret ) { ?>
    	<?= $firstName . ' ' . $regretTerm [ $regret . $hopeStop ] ?> 
    	<br />
    <?php } ?>
<?php $contents = ob_get_clean (); ?>

<?php require_once( $page [ 'view' ] [ 'template' ] ); ?>