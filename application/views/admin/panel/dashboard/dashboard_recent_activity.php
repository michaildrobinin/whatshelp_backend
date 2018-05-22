<?php
/**
 * Created by PhpStorm.
 * User: rock
 * Date: 24/10/2017
 * Time: 9:28 AM
 */?>
<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
    <ul class="feeds">
        <?php foreach ($toBeDisplayed as $dispItem){?>
            <li>

                <div class="col1">
                    <div class="cont">
                        <div class="cont-col1">
                            <div class="<?php echo $dispItem['icon_color'];?>">
                                <i class="<?php echo $dispItem['icon'];?>"></i>
                            </div>
                        </div>
                        <div class="cont-col2">
                            <div class="desc">
                                <?php echo $dispItem['message'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col2">
                    <div class="date"> <?php echo date('F j, Y', intval($dispItem['time']));?></div>
                </div>
            </li>
        <?php }?>
    </ul>
</div>
