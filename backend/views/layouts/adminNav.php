		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
                <?php
                use yii\web\UrlManager;
                ?>
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut">
						<img src="smartadmin/img/avatars/male.png" alt="me" class="online" /> 
						<span>
							<?= Yii::$app->user->identity->username ?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
				-->

				<ul>
                                    <li>
                                        <a href="#" title="Sites"><i class="fa fa-lg fa-fw fa-magnet"></i> <span class="menu-item-parent">Sites</span></a>
                                        <ul>
                                            <li>
                                                <a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['sites']) ?>" title="Manage Sites">Manage Sites</a>
                                            </li>
                                            <li>
                                                <a href="#" title="Swap Gensets">Swap Gensets</a>
                                            </li>
                                        </ul>
                                    </li>
					<li class="">
                                            <a href="#" title="Manage Gensets"><i class="fa fa-lg fa-fw fa-magnet"></i> <span class="menu-item-parent">Gensets</span></a>
                                            <ul>
                                                <li>
                                                    <a href="<?= (new UrlManager())->createAbsoluteUrl(['genset']) ?>">Manage Gensets</a>
                                                </li>
                                            </ul>
					</li>
					<li>
						<a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['utilitymeter']) ?>">
                                                    <i class="fa fa-lg fa-fw fa-inbox"></i> 
                                                    <span class="menu-item-parent">Utility Meters</span>
                                                </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">MC Reports</span></a>
						<ul>
							<li>
                                                            <a href="#" class="menu-item-parent">Genset Readings</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['gensetreading']) ?>">Current Week</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['gensetreading/historic']) ?>">Historic Readings</a>
                                                                    </li>
                                                                </ul>
							</li>
							<li>
								<a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['fuelling']) ?>">Fueling</a>
							</li>
						</ul>
					</li>
			
				</ul>
			</nav>
			<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->