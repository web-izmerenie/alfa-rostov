        <?
            if(defined("TWO_COLS")){?>
                    </main>
                </div><?
            }
            if(defined("SHOW_KRYIM_BLOCK")){?>
            <!--noindex--> 
            <div class="double_zigzag_wrapper">
                <div><?=GetMessage("KRYIM")?></div>
            </div>
            <!--/noindex--><?
            }?>
        </div> <!-- .wrapper -->
        
    </div> <!-- .main_wrapper -->
    <footer>
        <div class="developer">
            <?=GetMessage("DEVELOPER")?>
        </div>
    </footer>
<?$APPLICATION->IncludeFile(
    "inc/counter.php",
    array(),
    array(
        "SHOW_BORDER" => false
     )
);?>
<div class="asessorname" data="Kgxk" style="display:none;">Dku<?php echo md5($_SERVER['HTTP_HOST'])?> -  Dku<?php echo md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?></div>
</body>
</html>
