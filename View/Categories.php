<div class="adt adt-left"> <!--Categories.php-->
        <div class="adt-left__name">
            <h3 class="font-default u-center-text adt-left-title">Sản phẩm</h3>
        </div>
        <?php 
            include_once './Model/DMSP.php';
            $DMSP_Obj = new DMSP();
            $DMSP = $DMSP_Obj->GetDMSP();
            $HMTDM = $DMSP_Obj->GetHMTDM();
        ?>
        <?php 
            foreach($DMSP as $DMSPs) {
        ?>
                <h3 class ='font-p adt-left-title'><?php echo $DMSPs['DMSP'] ;?></h1>
                <ul class="adt-left-title">
        <?php 
                //Loop into child of DMSP
                    foreach($HMTDM as $HMTDMs) {
                        if($HMTDMs['DMSP_Id'] == $DMSPs['DMSP_Id']) {
        ?>
                        <li class="adt-left__group"><a href="?Action=<?php echo $HMTDMs['TenHMTDM'];?>" class="adt-left__link"><?php echo $HMTDMs['TenHMTDM'];?></a></li>
        <?php
                        }
                    }
        ?>
                </ul>
        <?php
            }
        ?>
    </div>
    <div class="adt-img adt-img-left">
    </div>
    <div class="adt adt-right ">
    </div>
    </div>