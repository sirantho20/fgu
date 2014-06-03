		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut">
						<img src="img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
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
					<li class="">
                                            <a href="#" title="Manage Gensets"><i class="fa fa-lg fa-fw fa-magnet"></i> <span class="menu-item-parent">Gensets</span></a>
                                            <ul>
                                                <li>
                                                    <a href="<?= (new \yii\web\UrlManager())->createAbsoluteUrl(['genset']) ?>">Manage Gensets</a>
                                                </li>
                                                <li>
                                                    <a href="#">Genset Swap</a>
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
						<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Graphs</span></a>
						<ul>
							<li>
								<a href="flot.html">Flot Chart</a>
							</li>
							<li>
								<a href="morris.html">Morris Charts</a>
							</li>
							<li>
								<a href="inline-charts.html">Inline Charts</a>
							</li>
						</ul>
					</li>
			
				</ul>
			</nav>
			<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->