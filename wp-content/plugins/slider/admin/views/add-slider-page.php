<div>
	<form id="wprls_slider_form" action="<?php echo $save_link ?>" method="POST">

		<?php if ( isset( $_GET['post_id'] ) ): ?>
			<input type="hidden" id="slideridvalue" name="postid" value="<?php echo  esc_attr($_GET['post_id']) ?>" />
			<input type="hidden" id="sliderslidecount" name="sliderslidecount" value="<?php echo wprls_get_slides_count( $_GET['post_id'] ) ?>" />
		<?php else: ?>
			<input type="hidden"  id="slideridvalue" name="postid" value="" />
			<input type="hidden" id="sliderslidecount" name="sliderslidecount" value="1" />
		<?php endif; ?>
		<h1 id="rls_heading">Rocket Layer Slider Settings</h1>
		<hr>
		<label for="rls_slider_name">Slider Name:</label>
		<input id="rls_slider_name" type="text" name="title" value="<?php echo $slider_options['title'] ?>" />
		<span id="rls_help_needed">Help Needed: 
			<a id="rls_docs" href="http://rocketplugins.com/layer-slider-for-wordpress/">Get Premium Layer Slider with 24/7 support</a>
		</span>
		<?php if ( isset( $_GET['post_id'] ) ): ?>
			<p style="margin:5px; font-family:arial;" class="description">Shortcode to display slider : [rlslider id=<?php echo esc_attr($_GET['post_id']); ?>]</p>
		<?php endif; ?>
		<div id="wp_rls_menu_bar">
			<a href="#" class="wp_rls_menubuttons" onClick="sliderTab()">Slider Settings</a>
			<?php if ( isset( $_GET['post_id'] ) ): ?>
			<a href="#" class="wp_rls_menubuttons" onClick="slidesTab()">Slides Settings</a>
			<?php endif; ?>
		</div>
		<div id="wp_rls_slider_settings">
			<div id="wp_rls_layout_settings" class="mediabox">
				<h3>Layout Settings</h3>
				<p><input type="checkbox" id="wp_rls_responsive_checkbox" name="is_responsive" <?php checked( true, $slider_options['is_responsive'] ) ?> /> Responsive</p>
				<p><label for="wp_rls_layout_width">Width:  </label><input tyep="text" id="wp_rls_layout_width" name="width" value="<?php echo $slider_options['width'] ?>" /> px</p>
				<p><label for="wp_rls_layout_height">Height: </label><input tyep="text" id="wp_rls_layout_height" name="height" value="<?php echo $slider_options['height'] ?>"/> px </p> 
				<p><label for="wp_rls_layout_autoplay_delay">AutoPlay Delay: </label><input tyep="text" class="wprls_autoplay_delay" id="wp_rls_layout_autoplay_delay" name="autoplay_delay" value="<?php echo $slider_options['autoplay_delay'] ?>"/> ms  </p>
					</div><p> </p>
					<div id="wp_rls_slideshow_settings" class="mediabox">
						<h3>Slideshow Settings</h3>
						<p><input type="checkbox" id="autostart_checkbox" name="auto_start" <?php checked( true, $slider_options['auto_start'] ) ?> /> Auto Start</p>
						<p><input type="checkbox" id="pause_checkbox" name="pause_on_mouse_over" <?php checked( true, $slider_options['pause_on_mouse_over'] ) ?> /> Pause on Mouse Over </p>
						<p><input type="radio" name="slide_order" <?php checked( 'seq', $slider_options['slide_order'] ) ?> value="seq" /> Sequential Order </p><br>
						<p><input type="radio" name="slide_order" <?php checked( 'rnd', $slider_options['slide_order'] ) ?> value="rnd" /> Random Order  (<em>Layers may not work</em>)  </p>
					</div>
					<p><br> </p>
					<div id="wp_rls_appearance" class="mediabox">
						<h3>Appearance</h3>
						<div>
							Navigation Skins: 
							<select name="nav_skin">
								<option value="1" <?php selected( '1', $slider_options['nav_skin'] ) ?> >Only Arrows</option>
								<option value="2" <?php selected( '2', $slider_options['nav_skin'] ) ?> >No Arrows+No Buttons</option>
								<option value="3" <?php selected( '3', $slider_options['nav_skin'] ) ?> >Arrows+Buttons</option>
								<option value="4" <?php selected( '4', $slider_options['nav_skin'] ) ?> >Only Buttons</option>
							</select>
					
						
						<div style="display: none;">
							Navigation Color:
							<select name="nav_color">
								<option value="1" <?php selected( '1', $slider_options['nav_color'] ) ?> >Skin 1</option>
								<option value="2" <?php selected( '2', $slider_options['nav_color'] ) ?> >Skin 1</option>
								<option value="3" <?php selected( '3', $slider_options['nav_color'] ) ?> >Skin 1</option>
								<option value="4" <?php selected( '4', $slider_options['nav_color'] ) ?> >Skin 1</option>
							</select>
						<p> </p>
						Player Skins:
						<select name="player_skin">
							<option value="1" <?php selected( '1', $slider_options['player_skin'] ) ?> >Skin 1</option>
							<option value="2" <?php selected( '2', $slider_options['player_skin'] ) ?> >Skin 1</option>
							<option value="3" <?php selected( '3', $slider_options['player_skin'] ) ?> >Skin 1</option>
							<option value="4" <?php selected( '4', $slider_options['player_skin'] ) ?> >Skin 1</option>
						</select>
					</div>
				</div>
			</div>
			<div id="wp_rls_videos" class="mediabox">
				<h3>Videos</h3>
				<input type="checkbox" id="wp_rls_autoplay_video_checkbox" name="autoplay_vid" <?php checked( true, $slider_options['autoplay_vid'] ); ?> /> Autoplay videos when slide show up</br>
				<input type="checkbox" id="wp_rls_autoplay_video_checkbox" name="pause_slideshow_vid" <?php checked( true, $slider_options['pause_slideshow_vid'] ); ?> /> Pause slideshow while playing video

			</div>

			<?php if ( ! isset( $_GET['post_id'] ) ): ?>
				<?php submit_button( 'Create Slider' ); ?>
			<?php else: ?>
				<?php submit_button( 'Update Slider' ); ?>
			<?php endif; ?>
			<input type="hidden" value="<?php echo $nonce ?>" name="wprls_nonce" />
		</div>

	</form>
	<?php if ( isset( $_GET['post_id'] ) ): ?>
	<div id="wp_rls_slides_settings">
		<h2 id="wp_rls_slides_options">Slides Options</h2>
		
		<div class="wp_rls_container">
			<a id="btnAddPage" class="wp_rls_add_slide_button" href="javascript:;" id="btnAddPage" role="button">Add Slide</a>  
			<ul id="pageTab" class="nav nav-tabs">
				<?php foreach ( $slides as $index => $slide ): ?>

					<li class="<?php if ( $index == 0) echo "active" ?>"><a id="wp_rls_slide_tab" href="#page<?php echo $index+1 ?>" data-toggle="tab">Slide <?php echo $index+1 ?> <?php if ( ! $index == 0 ) echo '<button class="close" type="button" title="Remove this page">×</button>' ?></a></li>
				<?php endforeach; ?>
			</ul>

			

			<div id="pageTabContent" class="tab-content">
				<?php foreach ( $slides as $index => $slide ): ?>
				<div class="tab-pane <?php if ( $index == 0) echo "active" ?>" id="page<?php echo $index+1 ?>">
				<div class="tab-pane wprls-slide <?php if ( $index == 0) echo "active" ?> slide<?php echo $index+1 ?>" id="page<?php echo $index+1 ?>">

					<table cellspacing="10" id="wp_rls_slides_table" style="text-align:center;">
						<tr>
							<td>
								Background Image
							</td>

							<td class="wprls_slideshow_duration_td">
									Slideshow duration:
							</td>
							<td class="wprls_slideshow_duration_td">
								<input type="text" class="slide_duration" name="slide_duration" id="wp_rls_slideshow_duration_tf" value="<?php echo $slide['slideduration'] ?>" /> (ms)
							</td>

						</tr>
					</tr>
					<tr>
						<td>
							<div id="wp_rls_slide_background">


								<img data-slide="<?php echo $index+1 ?>" class="upload_image_button" id="wp_rls_slide_background_img" src="<?php echo plugins_url( '../img/not_set.png', __FILE__ ) ?>" />
								<input class="media_attach_url" name="slide_bg" type="hidden" value="<?php echo $slide['bgimage'] ?>" />

							</div>
						</td>

						<td>
								&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;Layer Transition duration:
						</td>
						<td>
							<input type="text" class="trans_duration" name="trans_duration" id="wp_rls_transition_duration_tf" value="<?php echo $slide['transduration'] ?>" /> (ms)
						</td>


					</table>	</br>
				</br>
			</br>	
			
			
			<h3 id="rls_wp_slider_preview">Slide Preview</h3>
			<div id="wp_rls_layer_canvas" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px">
				<div class="slider_preview" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px">
				<div class="wprlslayers wprlslayers<?php echo $index+1 ?>">
					<?php foreach( $slide['layers'] as $lindex => $layer ): ?>
						<div data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="wprlslayercontent ui-widget-content parentlayercontent<?php echo $index+1 . $lindex+1; ?>" style="top: <?php echo $layer['top'] ?>px;left: <?php echo $layer['left'] ?>px;">
							
							<div data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="layercontentcont layercontent<?php echo $index+1 . $lindex+1; ?>" style="opacity: 0.7;background-color:<?php echo $layer['bgcolor'] ?>;color: <?php echo $layer['tcolor'] ?>; font-size: <?php echo $layer['tsize'] ?>px;width: <?php echo $layer['width'] ?>px; height: <?php echo $layer['height'] ?>px;">
							<?php echo $layer['tcontent']  ?></div>

						</div>
					<?php endforeach; ?>
				</div>
				<img class="slider_preview_image" src="<?php echo $slide['bgimage'] ?>" style="width: <?php echo $slider_options['width'] ?>px;height:<?php echo $slider_options['height'] ?>px"/>
				</div>
			</div>
			
			

			<h3 id="rls_wp_layer_options">Layer Options</h3>
			
			<div id="wp_rls_layer_positioning">
				
				<div id="wp_rls_panel_group" class="panel-group panelcont">
					<?php  if ( ! empty( $slide['layers'] ) ): ?>
					<div class="panel-group" id="accordion<?php echo $index+1 ?>">
						
						<?php foreach( $slide['layers'] as $lindex => $layer ): ?>
						<div class="panel panel-default" data-slide="<?php echo $index+1 ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-layercount="<?php echo count($slide['layers']) ?>">
							<div class="panel-heading"> <span class="glyphicon glyphicon-remove-circle pull-right "></span>

								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $index+1 ?>" href="#collapseOne<?php echo $index+1 . $lindex+1; ?>">
										Layer <?php echo $lindex+1; ?>
									</a>
								</h4>

							</div>
							<div id="collapseOne<?php echo $index+1 . $lindex+1; ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<textarea style="display: none" class="wprls_textcontent wprlstcontent<?php echo $index+1 . $lindex+1; ?>"><?php echo $layer['tcontent'] ?></textarea>
									<input type="button" id="wp_rls_layer_text" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button triggertextmodal mlayer<?php echo $index+1 . $lindex+1; ?>" value="Text" data-toggle="modal" data-target="#wp_rls_text_box"/>
									<input type="button" id="wp_rls_layer_image"  data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button mlayer<?php echo $index+1 . $lindex+1; ?>" value="Image" data-toggle="modal" data-target="#wp_rls_url_box" />
									<input type="button" id="wp_rls_layer_video" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button mlayer<?php echo $index+1 . $lindex+1; ?>"  value="Video" data-toggle="modal" data-target="#wp_rls_url_box" />
									<input type="button" id="wp_rls_layer_link" data-layerid="<?php echo $index+1 . $lindex+1; ?>" class="button mlayer<?php echo $index+1 . $lindex+1; ?>"  value="Links" data-toggle="modal" data-target="#wp_rls_url_box"/>
									<table id="wp_rls_layers_table">

										<tr>
											<td>Layer Animation</td>

											<td> 

											<select class="input input--dropdown js--animations wp_rls_layer_box_animation  inputlayeranimation inputlayeranimation<?php echo $index+1 . $lindex+1; ?>">
										        <optgroup label="Attention Seekers">
										          <option <?php selected( $layer['animation'], 'bounce' ) ?> value="bounce">bounce</option>
										          <option value="Please Buy Premium Version" disabled >flash (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >pulse (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rubberBand (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >shake (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >swing (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >tada (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >wobble (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >jello (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Bouncing Entrances">
										          <option value="Please Buy Premium Version" disabled >bounceIn (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceInDown (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceInLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceInRight (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceInUp (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Bouncing Exits">
										          <option value="Please Buy Premium Version" disabled >bounceOut (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceOutDown (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceOutLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceOutRight (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >bounceOutUp (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Fading Entrances">
										          <option value="Please Buy Premium Version" disabled >fadeIn (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInDown (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInDownBig (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInLeftBig (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInRight (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInRightBig (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInUp (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >fadeInUpBig (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Flippers">
										          <option value="Please Buy Premium Version" disabled >flip (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >flipInX (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >flipInY (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >flipOutX (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >flipOutY (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Lightspeed">
										          <option value="Please Buy Premium Version" disabled >lightSpeedIn (Paid Only)</option>
										        </optgroup>

										        <optgroup label="Rotating Entrances">
										          <option value="Please Buy Premium Version" disabled >rotateIn (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rotateInDownLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rotateInDownRight (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rotateInUpLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rotateInUpRight (Paid Only)</option>
										        </optgroup>



										        <optgroup label="Sliding Entrances">
										          <option value="Please Buy Premium Version" disabled >slideInUp (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >slideInDown (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >slideInLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >slideInRight (Paid Only)</option>

										        </optgroup>
										       
										        
										        <optgroup label="Zoom Entrances">
										          <option value="Please Buy Premium Version" disabled >zoomIn (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >zoomInDown (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >zoomInLeft (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >zoomInRight (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >zoomInUp (Paid Only)</option>
										        </optgroup>
										        
										       

										        <optgroup label="Specials">
										          <option value="Please Buy Premium Version" disabled >hinge (Paid Only)</option>
										          <option value="Please Buy Premium Version" disabled >rollIn (Paid Only)</option>
										      
										        </optgroup>
										      </select>


											</td>
											<td></td>
											<td></td>
											<td></td>
											
											
										</tr>

										<tr>
											<td>Layer Animation Delay</td>

											<td> <input value="<?php echo $layer['animationdelay']  ?>" id="wp_rls_layer_animation_delay" type="number" placeholder="ms" class="wp_rls_layer_box_animation_delay inputlayerdelay inputlayerdelay<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (ms)</td>

											<td></td>
											<td></td>
											<td></td>
											
										</tr>

										<tr>
											<td>Size & Position:</td>
											<td>Width <input value="<?php echo $layer['width']  ?>" id="wp_rls_layer_image_size_width" type="number" placeholder="px" class="wp_rls_layer_box_width inputlayerwidth inputlayerwidth<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (px)</td>
											<td>Height <input value="<?php echo $layer['height']  ?>" id="wp_rls_layer_image_size_height" type="number" placeholder="px" class="wp_rls_layer_box_width wp_rls_layer_box_height inputlayerheight inputlayerheight<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
											<td>Top <input value="<?php echo $layer['top']  ?>" id="wp_rls_layer_top_position" class="wp_rls_layer_box_width wp_rls_layer_box_top inputlayertop inputlayertop<?php echo $index+1 . $lindex+1; ?>" type="number" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
											<td>Left <input value="<?php echo $layer['left']  ?>" id="wp_rls_layer_left_position" type="number" placeholder="px" class="wp_rls_layer_box_left wp_rls_layer_box_width inputlayerleft inputlayerleft<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
										</tr>
										<tr>
											<td>Text size</td>
											<td><input value="<?php echo $layer['tsize']  ?>" id="wp_rls_layer_text_size" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_text_size inputlayertextsize inputlayertextsize<?php echo $index+1 . $lindex+1; ?>" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>Image size: </td>
											<td>Width <input value="<?php echo $layer['imgwidth']  ?>" id="wp_rls_layer_image_size_width" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_image_width" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/> (px)</td>
											<td>Height <input value="<?php echo $layer['imgheight']  ?>" id="wp_rls_layer_image_size_height" type="number" class="wp_rls_layer_box_width wp_rls_layer_box_image_height" placeholder="px" data-layerid="<?php echo $index+1 . $lindex+1; ?>" /> (px)</td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td>Text color:</td>
											<td><input value="<?php echo $layer['tcolor']  ?>" id="wp_rls_layer_text_color" type="color" class="wp_rls_layer_box_width wp_rls_layer_box_text_color inputlayertextcolor inputlayertextcolor<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>

										<tr>
											<td>Background color:</td>
											<td><input value="<?php echo $layer['bgcolor']  ?>" id="wp_rls_layer_bg_color" type="color" class="wp_rls_layer_box_width wp_rls_layer_box_bg_color inputlayerbgcolor inputlayerbgcolor<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>"/></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>

									</table>
								</div>
							</div>
							
						</div> <?php endforeach; //layers loop ?>

						</div>


					<?php else: ?>

										<div class="panel-group" id="accordion<?php echo $index+1 ?>"></div>

					<?php endif; ?>



						
					
					<button id="wp_rls_add_new_layer" class="btn btn-lg btn-primary btn-add-panel" data-slide="<?php echo $index+1 ?>" data-layercount="<?php echo count($slide['layers']) ?>"> 
						<i class="glyphicon glyphicon-plus"></i> Add new Layer</button>
						
					</div>
					
				</div>
			</div>
			
			
		</div>

		<?php endforeach; ?>
		
<p class="submit"><input type="submit" name="submit" id="submit-slides" class="button button-primary" value="Save"></p>
<?php endif; ?>
					<input type="hidden" value="<?php echo $nonce ?>" name="wprls_nonce" />
		<!-- Modal -->
		<div class="modal fade" id="wp_rls_transitions" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Select Transitions</h4>
					</div>
					<div class="modal-body">
						<p><input type="checkbox"/> Transition 1</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default">Save</button>
					</div>
				</div>

			</div>
		</div>



		<div class="modal fade" id="wp_rls_url_box" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Unlock Content Types</h4>
					</div>
					<div class="modal-body">
						<p>Please purchase the paid version of the plugin to unlock layer content types.</p>
					</div>
					<div class="modal-footer">
						<a href="http://rocketplugins.com/layer-slider-for-wordpress/" class="btn btn-default" >Purchase</a>
					</div>
				</div>

			</div>
		</div>




		<div class="modal fade" id="wp_rls_text_box" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Enter Text</h4>
					</div>
					<div class="modal-body">
						
						<?php wp_editor( '', 'wprlstextcontent', array(
							'media_buttons' => false,
							'quicktags' => false,
							'teeny' => true
 						) ); ?>
						
					</div>
					<div class="modal-footer">
						<button type="button" id="modalbtn-text" class="btn btn-primary btn-lg" >Update layer text</button>
					</div>
				</div>

			</div>
		</div>
		<?php if ( isset( $_GET['tab'] ) ): ?>
			<script>slidesTab();</script>
		<?php endif; ?>