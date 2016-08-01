        <?
        if(defined("ERROR_404")){
            CHTTP::SetStatus("404 Not Found");
        }?>
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
            <nav class="footer_menu">
              <?$APPLICATION->IncludeComponent("bitrix:menu", "top.menu", array(
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
                ),
                false
              );?>
            </nav>
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
<div class="asessorname" data="Kgxk" style="display:none;">Dku<?php echo md5($_SERVER['HTTP_HOST'])?> -  Dku<?php echo md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?><br>
<a href="/scheben/v-taganroge.html"></a><br/>
<a href="/scheben/v-novocherkasske.html"></a><br/>
<a href="/scheben/cena-za-tonnu.html"></a><br/>
</div>
</body>
<?require($_SERVER["DOCUMENT_ROOT"]."/seo.php");?>
</html>
