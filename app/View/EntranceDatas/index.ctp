<?php 

    echo"<div style='text-align:center;margin-top:78px;margin-bottom:40px;'>";

    echo $this->html->image("img4.png", array("align"=>"center","width"=>"100px", "alt"=>"×"));

    echo'</div>';

    echo $this->Session->flash();    

    echo '<div class="alert alert-info" role="alert" style="margin:20px 30px;">';
    echo '<span class="glyphicon glyphicon-tags"></span><strong>　'.$office.'</strong>';
    echo '</div>';

    echo'<p style="margin:20px 30px;">';
    echo $this->Html->link(
        $this->Html->tag('span', ' 出社情報登録'),
        array('controller' => 'EntranceDatas', 'action' => 'entrance'),
        array('escape' => false, 'class' => 'btn btn-primary btn-lg btn-block', 'role' => 'button')
    );
    echo'</p>';

    echo'<p style="margin:20px 30px;">';
    echo $this->Html->link(
        $this->Html->tag('span', ' 退社情報登録'),
        array('controller' => 'EntranceDatas', 'action' => 'leave'),
        array('escape' => false, 'class' => 'btn btn-primary btn-lg btn-block', 'role' => 'button')
    );
    echo'</p>';

    echo'<p style="margin:20px 30px;">';
    echo $this->Html->link(
        $this->Html->tag('span', ' 出退情報確認（管理者専用）'),
        array('controller' => 'EntranceDatas', 'action' => 'adminlist'),
        array('escape' => false, 'class' => 'btn btn-success btn-lg btn-block', 'role' => 'button')
    );
    echo'</p>';

?>