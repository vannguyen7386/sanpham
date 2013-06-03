<div id="SidebarRight">
    <div class="wrap">
            <div class="Online">
				<?php include'Application/Controllers/OnlineControl.php'?>
            </div>
            <div class="Statistics">
                <?php include'Application/Controllers/StatisticControl.php'?>
            </div>
            <div class="Advertisment">
                <?php include'Application/Controllers/AdvControl.php' ?>
            </div>
     </div>
</div>	
<div class="AdvBot">
    <?php include'Application/Controllers/ControlAdvBot.php'?>
</div>	
	</div><!--end #Container-->
<div id="Footer">
		<p class="Copyright">Design by &copy; <a href="#">huyvan73</a> - Hà Nội 07/03/2011</p>
		<p class="MenuBoth">
            <?php include'Application/Controllers/ControlMenubot.php'?>
        </p>
	</div><!--end #Footer-->	
</div><!--end #Wrapper-->
</body>
</html>