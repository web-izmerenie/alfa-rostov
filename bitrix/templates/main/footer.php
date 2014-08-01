        <?
            if(defined("TWO_COLS")){?>
                    </main>
                </div><?
            }
            if(defined("SHOW_KRYIM_BLOCK")){?>
            <div class="double_zigzag_wrapper">
                <div><?=GetMessage("KRYIM")?></div>
            </div><?
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
</body>
</html>
