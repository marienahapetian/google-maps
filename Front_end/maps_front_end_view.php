<?php
function showpublishedmap( $id ) {
	ob_start();
	global $wpdb;
	$sql           = "SELECT * FROM " . $wpdb->prefix . "g_maps WHERE id='" . $id . "'";
	$getMapContent = $wpdb->get_results( $sql );
	if ( $getMapContent ) {
		foreach ( $getMapContent as $map ) {
			$i = rand( 1, 1000000 );
			?>
			<div id="huge_it_google_map<?php echo $i; ?>_container">
				<div id="huge_it_google_map<?php echo $i; ?>"
				     style="position:relative !important;height:<?php echo $map->height; ?>px; width:<?php echo $map->width; ?>%;
					     border-radius:<?php echo $map->border_radius; ?>px !important;
				     <?php if ( $map->align == 'left' ) {
					     ?>
					     float:left !important;
					     margin:0px 0px 0px 0px !important;
					     <?php ;
				     }
				     if ( $map->align == 'right' ) {
					     ?>
					     float:right !important;
					     margin:0px 0px 0px 0px !important;
					     <?php ;
				     }
				     if ( $map->align == 'center' ) {
					     ?>
					     margin:0px auto !important;
					     float:none;
					     <?php ;
				     }
				     ?>">
				</div>
			</div>
			<style>
				#huge_it_google_map<?php echo $i; ?> img {
					max-width: none;
					visibility: visible !important;
				}
			</style>
			<script>
				jQuery(document).ready(function () {
					var marker = [];
					var polygone = [];
					var polyline = [];
					var polylinepoints;
					var newpolylinecoords = [];
					var polygonpoints;
					var polygoncoords = [];
					var newcircle = [];
					var infowindow = [];
					var newcirclemarker = [];
					var circlepoint;
					var width = jQuery("#huge_it_google_map<?php echo $i; ?>").width();
					var height = jQuery("#huge_it_google_map<?php echo $i; ?>").height();

					function bindInfoWindow(marker, map, infowindow, description, info_type) {
						google.maps.event.addListener(marker, 'click', function () {
							infowindow.setContent(description);
							infowindow.open(map, marker);
						});
					}

					jQuery(document).on("click tap drag scroll", function (e) {
						if (window.matchMedia('(max-width:768px)').matches) {
							var container = jQuery("#huge_it_google_map<?php echo $i; ?>");
							if (!container.is(e.target) && container.has(e.target).length === 0) {
								front_end_map.setOptions({
									draggable: false,
									scrollwheel: false,
								});
							} else {
								front_end_map.setOptions({
									draggable: true,
									scrollwheel: true,
								});
							}
						}

					})
					var div = parseInt(width) / parseInt(height);
					jQuery(window).on("resize", function () {
						var newwidth = jQuery("#huge_it_google_map<?php echo $i; ?>").width();
						var newheight = parseInt(newwidth) / parseInt(div) + "px";
						jQuery("#huge_it_google_map<?php echo $i; ?>").height(newheight);
					})

					var center_lat = <?php echo $map->center_lat; ?>;
					var center_lng = <?php echo $map->center_lng; ?>;
					var center_coords = new google.maps.LatLng(center_lat, center_lng);
					var frontEndMapOptions = {
						zoom: parseInt(<?php echo $map->zoom; ?>),
						center: center_coords,
						disableDefaultUI: true,
						panControl: <?php echo $map->pan_controller; ?>,
						zoomControl: <?php echo $map->zoom_controller; ?>,
						mapTypeControl: <?php echo $map->type_controller; ?>,
						scaleControl: <?php echo $map->scale_controller; ?>,
						streetViewControl: <?php echo $map->street_view_controller; ?>,
						overviewMapControl: <?php echo $map->overview_map_controller; ?>,
						mapTypeId: google.maps.MapTypeId.<?php echo $map->type; ?>,
						minZoom:<?php echo $map->min_zoom; ?>,
						maxZoom:<?php echo $map->max_zoom; ?>
					}
					var front_end_map = new google.maps.Map(document.getElementById('huge_it_google_map<?php echo $i; ?>'), frontEndMapOptions)

					if (window.matchMedia('(max-width:768px)').matches) {
						front_end_map.setOptions({
							draggable: false,
							scrollwheel: false,
						});
					} else {
						front_end_map.setOptions({
							draggable: true,
							scrollwheel: true,
						});
					}


					var front_end_data = {
						action: 'g_map_options',
						map_id:<?php echo $id; ?>,
						task: 'ajax'
					}
					jQuery.ajax({
						url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
						dataType: 'json',
						method: 'post',
						data: front_end_data,
						beforeSend: function () {
						}
					}).done(function (response) {
						HGinitializeMap(response);
					}).fail(function () {
						console.log('Failed to load response from database');
					});
					function HGinitializeMap(response) {
						if (response.success) {
							var mapInfo = response.success;
							var markers = mapInfo.markers;
							for (var i = 0; i < markers.length; i++) {
								var name = markers[i].name;
								var address = markers[i].address;
								var anim = markers[i].animation;
								var description = markers[i].description;
								var point = new google.maps.LatLng(
									parseFloat(markers[i].lat),
									parseFloat(markers[i].lng));
								var html = "<b>" + name + "</b> <br/>" + address;
								if (anim == 'DROP') {
									marker[i] = new google.maps.Marker({
										map: front_end_map,
										position: point,
										title: name,
										content: description,
										animation: google.maps.Animation.DROP,
									});
								}
								if (anim == 'BOUNCE') {
									marker[i] = new google.maps.Marker({
										map: front_end_map,
										position: point,
										title: name,
										content: description,
										animation: google.maps.Animation.BOUNCE
									});
								}
								if (anim == 'NONE') {
									marker[i] = new google.maps.Marker({
										map: front_end_map,
										position: point,
										content: description,
										title: name,
									});
								}
								infowindow[i] = new google.maps.InfoWindow;
								bindInfoWindow(marker[i], front_end_map, infowindow[i], description, "<?php echo $map->info_type; ?>");
							}
							var polygones = mapInfo.polygons;
							for (var i = 0; i < polygones.length; i++) {
								var name = polygones[i].name;
								var line_opacity = polygones[i].line_opacity;
								var line_color = "#" + polygones[i].line_color;
								var fill_opacity = polygones[i].fill_opacity;
								var line_width = polygones[i].line_width;
								var fill_color = "#" + polygones[i].fill_color;
								var latlngs = polygones[i].latlng;
								polygoncoords = [];
								for (var j = 0; j < latlngs.length; j++) {
									polygonpoints = new google.maps.LatLng(parseFloat(latlngs[j].lat),
										parseFloat(latlngs[j].lng))
									polygoncoords.push(polygonpoints)
								}
								//alert(polygoncoords);
								polygone[i] = new google.maps.Polygon({
									paths: polygoncoords,
									map: front_end_map,
									strokeOpacity: line_opacity,
									strokeColor: line_color,
									strokeWeight: line_width,
									fillOpacity: fill_opacity,
									fillColor: fill_color,
									draggable: false,
								});
							}
							var polylines = mapInfo.polylines;
							for (var i = 0; i < polylines.length; i++) {
								var name = polylines[i].name;
								var line_opacity = polylines[i].line_opacity;
								var line_color = polylines[i].line_color;
								var line_width = polylines[i].line_width;
								var latlngs = polylines[i].latlng;
								newpolylinecoords = [];
								for (var j = 0; j < latlngs.length; j++) {
									polylinepoints = new google.maps.LatLng(parseFloat(latlngs[j].lat),
										parseFloat(latlngs[j].lng))
									newpolylinecoords.push(polylinepoints)
								}
								polyline[i] = new google.maps.Polyline({
									path: newpolylinecoords,
									map: front_end_map,
									strokeColor: "#" + line_color,
									strokeOpacity: line_opacity,
									strokeWeight: line_width,
								})
							}
							var circles = mapInfo.circles;
							for (var i = 0; i < circles.length; i++) {
								var circle_name = circles[i].name;
								var circle_center_lat = circles[i].center_lat;
								var circle_center_lng = circles[i].center_lng;
								var circle_radius = circles[i].radius;
								var circle_line_width = circles[i].line_width;
								var circle_line_color = circles[i].line_color;
								var circle_line_opacity = circles[i].line_opacity;
								var circle_fill_color = circles[i].fill_color;
								var circle_fill_opacity = circles[i].fill_opacity;
								var circle_show_marker = parseInt(circles[i].show_marker);
								circlepoint = new google.maps.LatLng(parseFloat(circles[i].center_lat),
									parseFloat(circles[i].center_lng));
								newcircle[i] = new google.maps.Circle({
									map: front_end_map,
									center: circlepoint,
									title: name,
									radius: parseInt(circle_radius),
									strokeColor: "#" + circle_line_color,
									strokeOpacity: circle_line_opacity,
									strokeWeight: circle_line_width,
									fillColor: "#" + circle_fill_color,
									fillOpacity: circle_fill_opacity
								})
								if (circle_show_marker == '1') {
									newcirclemarker[i] = new google.maps.Marker({
										position: circlepoint,
										map: front_end_map,
										title: circle_name,
									})
								}
							}

						}
					}

					,
					"json"
					)
				})
			</script>
			<?php ;
		}
	}

	return ob_get_clean();
}

?>
