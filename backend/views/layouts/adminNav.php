		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
                <?php
                use yii\helpers\Url;
                ?>
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut">
                                            <span class="fa fa-lg fa-fw fa-user menu-item-parent"></span> 
						<span>
							<?= Yii::$app->user->identity->company ?>
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
                                    <?php if(Yii::$app->user->identity->role < 6): ?>
                                    <li>
                                            <a href="<?= Url::to(['dashboard/index']) ?>">
                                                    <i class="fa fa-lg fa-fw fa-coffee"></i> 
                                                    <span class="menu-item-parent"> Dashboard</span>
                                                </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Sites"><i class="fa fa-lg fa-fw fa-th"></i> <span class="menu-item-parent">Sites</span></a>
                                        <ul>
                                            <li>
                                                <a href="<?= Url::to(['sites/index']) ?>" title="Manage Sites">Manage Sites</a>
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
                                                    <a href="<?= Url::to(['genset/index']) ?>">Manage Gensets</a>
                                                </li>
                                            </ul>
					</li>
					<li>
                                            <a href="<?= Url::to(['utilitymeter/index']) ?>">
                                                    <i class="fa fa-lg fa-fw fa-inbox"></i> 
                                                    <span class="menu-item-parent">Utility Meters</span>
                                                </a>
					</li>
                                        <?php endif; ?>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">MC Reports</span></a>
						<ul>
							<li>
                                                            <a href="#" class="menu-item-parent"><i class="fa fa-lg fa-fw fa-calendar"></i><span class="menu-item-parent">FGU Readings</span></a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= Url::to(['gensetreading/index']) ?>">Current Week</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?= Url::to(['gensetreading/historic']) ?>">Historic Readings</a>
                                                                    </li>
                                                                </ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-lg fa-fw fa-tachometer"></i> <span class="menu-item-parent">Fueling</span></a>
                                                                <ul>
                                                                    <li><a href="<?= Url::to(['fuelling/index']) ?>">Current Week</a></li>
                                                                    <li><a href="<?= Url::to(['fuelling/historic']) ?>">Historic</a></li>
                                                                </ul>
							</li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-lg fa-fw fa-usd"></i> <span class="menu-item-parent">Prepaid Reload</span></a>
                                                            <ul>
                                                                <li><a href="<?= Url::to(['prepaid-reload/index']) ?>">Current Week</a></li>
                                                                <li><a href="<?= Url::to(['prepaid-reload/historic']) ?>">Historic</a></li>
                                                            </ul>
                                                        </li>
						</ul>
					</li>
			
				</ul>
			</nav>
			<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->