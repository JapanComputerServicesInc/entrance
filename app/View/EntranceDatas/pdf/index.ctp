<center>
    <br><br><br><br><br>
<?php echo $this->html->image("img4.png", array("width"=>"200", "alt"=>"×"))."<br /><br /><br /><br /><br />" ?>
<?php echo $this->html->link($this->html->image('img1.gif'),
        array('controller'=>'EntranceDatas/','action'=>'entrance'),array('escape'=>false))."<br /><br /><br />" ?>
<?php echo $this->html->link($this->html->image("img2.gif"),
        array('controller'=>'EntranceDatas/','action'=>'leave'),array('escape'=>false))."<br /><br /><br />" ?>
<?php echo $this->html->link($this->html->image("img3.gif"),
        array('controller'=>'EntranceDatas/','action'=>'adminlist'),array('escape'=>false))."<br /><br /><br />" ?>
    <br><br><br><br><br>
</center>