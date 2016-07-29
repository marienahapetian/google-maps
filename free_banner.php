<?php $path_site2 = plugins_url("./images", __FILE__); ?>
		<style>
		/* banner */
		/* banner */
.free_version_banner {
	position:relative;
	display:block;
	background-image:url(<?php echo $path_site2; ?>/wp_banner_bg.jpg);
	background-position:top left;
	background-repeat:repeat;
	overflow:hidden;
}

.free_version_banner .manual_icon {
	position:absolute;
	display:block;
	top:15px;
	left:15px;
	width: 140px;
}

.free_version_banner .usermanual_text {
	font-weight: bold !important;
	display:block;
	float:left;
	width:270px;
	margin-left:75px;
	font-family:'Open Sans',sans-serif;
	font-size:14px;
	font-style:italic;
	color:#ffffff;
	line-height:10px;
	margin-top: 0;
	padding-top: 15px;
}

.free_version_banner .usermanual_text a,
.free_version_banner .usermanual_text a:link,
.free_version_banner .usermanual_text a:visited {
	display:inline-block;
	font-family:'Open Sans',sans-serif;
	font-size:17px;
	font-weight:600;
	font-style:italic;
	color:#ffffff;
	line-height:30.5px;
	text-decoration:underline;
}

.free_version_banner .usermanual_text a:hover,
.free_version_banner .usermanual_text a:focus,
.free_version_banner .usermanual_text a:active {
	text-decoration:underline;
}

.free_version_banner .get_full_version,
.free_version_banner .get_full_version:link,
.free_version_banner .get_full_version:visited {
	padding-left: 60px;
	padding-right: 4px;
	display: inline-block;
	position: absolute;
	top: 15px;
	right: calc(50% - 167px);
	height: 38px;
	width: 268px;
	border: 1px solid rgba(255,255,255,.6);
	font-family: 'Open Sans',sans-serif;
	font-size: 23px;
	color: #ffffff;
	line-height: 43px;
	text-decoration: none;
	border-radius: 2px;
}

.free_version_banner .get_full_version:hover {
	background:#ffffff;
	color:#bf1e2e;
	text-decoration:none;
	outline:none;
}

.free_version_banner .get_full_version:focus,
.free_version_banner .get_full_version:active {
	
}

.free_version_banner .get_full_version:before {
	content:'';
	display:block;
	position:absolute;
	width:33px;
	height:23px;
	left:25px;
	top:9px;
	background-image:url(<?php echo $path_site2; ?>/wp_shop.png);
	background-position:0px 0px;
	background-repeat;
}

.free_version_banner .get_full_version:hover:before {
	background-position:0px -27px;
}

.free_version_banner .huge_it_logo {
	float:right;
	margin:15px 15px;
}
		.free_version_banner {
			position:relative;
			display:block;
			background-image:url('<?php echo $path_site2; ?>/wp_banner_bg.jpg');
			background-position:top left;
			background-repeat:repeat;
			overflow:hidden;
		}

		.free_version_banner .manual_icon {
			position:absolute;
			display:block;
			top:15px;
			left:15px;
			width: 140px;
		}

		.free_version_banner .usermanual_text {
			font-weight: bold !important;
			display:block;
			float:left;
			width:270px;
			margin-left:75px;
			font-family:'Open Sans',sans-serif;
			font-size:14px;
			font-style:italic;
			color:#ffffff;
			line-height:10px;
			margin-top: 0;
			padding-top: 15px;
		}

		.free_version_banner .usermanual_text a,
		.free_version_banner .usermanual_text a:link,
		.free_version_banner .usermanual_text a:visited {
			display:inline-block;
			font-family:'Open Sans',sans-serif;
			font-size:17px;
			font-weight:600;
			font-style:italic;
			color:#ffffff;
			line-height:30.5px;
			text-decoration:underline;
		}

		.free_version_banner .usermanual_text a:hover,
		.free_version_banner .usermanual_text a:focus,
		.free_version_banner .usermanual_text a:active {
			text-decoration:underline;
		}

		.free_version_banner .get_full_version,
		.free_version_banner .get_full_version:link,
		.free_version_banner .get_full_version:visited {
			padding-left: 60px;
			padding-right: 4px;
			display: inline-block;
			position: absolute;
			top: 15px;
			right: calc(50% - 167px);
			height: 38px;
			width: 268px;
			border: 1px solid rgba(255,255,255,.6);
			font-family: 'Open Sans',sans-serif;
			font-size: 23px;
			color: #ffffff;
			line-height: 43px;
			text-decoration: none;
			border-radius: 2px;
		}

		.free_version_banner .get_full_version:hover {
			background:#ffffff;
			color:#bf1e2e;
			text-decoration:none;
			outline:none;
		}

		.free_version_banner .get_full_version:focus,
		.free_version_banner .get_full_version:active {

		}

		.free_version_banner .get_full_version:before {
			content:'';
			display:block;
			position:absolute;
			width:33px;
			height:23px;
			left:25px;
			top:9px;
			background-image:url('<?php echo $path_site2; ?>/wp_shop.png');
			background-position:0px 0px;
			background-repeat;
		}

		.free_version_banner .get_full_version:hover:before {
			background-position:0px -27px;
		}

		.free_version_banner .huge_it_logo {
			float:right;
			margin:15px 15px;
		}

		.free_version_banner .description_text {
			padding:0 0 13px 0;
			position:relative;
			display:block;
			text-align:center;
			font-family:'Open Sans',sans-serif;
			color:#fffefe;
			line-height:inherit;
			margin: 0 auto;
			width: 52%;
		}
		.free_version_banner .description_text p{
			margin:0;
			padding:0;
			font-size: 14px;
		}
		.free_version_banner .hg_free_banner_bottom a {
			text-decoration: none;
		}
		.free_version_banner .hg_view_plugins_block {
			float: left;
			position: relative;
		}
		.free_version_banner .hg_social_link_buttons {
			float: right;
			width:170px;
			height:36px;
			background:#fff;
			border-radius:30px;
			text-align:center;
			margin-bottom: 20px;
			margin-right: 15px;
		}
		.free_version_banner .hg_social_link_buttons a {
			display: inline-block;
			position:relative;
			margin: 3px 3px;
			width: 30px;
			height: 30px;
			background:url('<?php echo $path_site2; ?>/f.png') no-repeat;
		}

		.free_version_banner .hg_social_link_buttons a:after {
			content: '';
			display:block;
			position:absolute;
			top:0;
			right: 0;
			bottom: 0;
			left: 0;
			background-color: transparent;
			transition: background-color .1s linear;
		}

		.free_version_banner .hg_social_link_buttons a:hover:after {
			background-color: rgba( 255, 255, 255, .3 );
		}

		.free_version_banner .hg_social_link_buttons a.fb {
			background-position: 0 0;
		}

		.free_version_banner .hg_social_link_buttons a.twitter {
			background-position: -40px 0;
		}

		.free_version_banner .hg_social_link_buttons a.gplus {
			background-position: -80px 0;
		}

		.free_version_banner .hg_social_link_buttons a.yt {
			background-position: -121px 0;
		}
.free_version_banner .description_text {
	padding:0 0 13px 0;
	position:relative;
	display:block;
	text-align:center;
	font-family:'Open Sans',sans-serif;
	color:#fffefe;
	line-height:inherit;
	margin: 0 auto;
	width: 52%;
}
.free_version_banner .description_text p{
	margin:0;
	padding:0;
	font-size: 14px;
}
.free_version_banner .hg_free_banner_bottom a {
	text-decoration: none;
}
.free_version_banner .hg_view_plugins_block {
	float: left;
	position: relative;
}
.free_version_banner .hg_social_link_buttons {
	float: right;
	width:170px;
	height:36px;
	background:#fff;
	border-radius:30px;
	text-align:center;
	margin-bottom: 20px;
	margin-right: 15px;
}
.free_version_banner .hg_social_link_buttons a {
	display: inline-block;
	margin: 3px 3px; 			
}
.free_version_banner .hg_social_link_buttons a img {
	width: 30px;
}
.hg_view_plugins_block a {
	color: #fffefe;
	display: inline-block;
	margin-right: 27px;
	text-decoration: none;
	font-size: 16px;
	font-weight: 600;
	box-shadow: none;
}
.hg_view_plugins_block a:nth-child(1) {
	margin-left: 15px;			
}
.hg_view_plugins_block a:hover {
	text-decoration: underline;
}
.close_free_banner {
    float: right;
    color: #fff;
    position: absolute;
    right: 11px;
    font-size: 24px;
    top: 3px;
    cursor: pointer;
    transform: rotate(45deg);
}
.close_free_banner:hover {
	color: #e7e3e3;
}

@media screen and (max-width: 1300px){
    .free_version_banner .usermanual_text {
        width: calc(100% - 210px);
    }

    .free_version_banner .get_full_version,
    .free_version_banner .get_full_version:link,
    .free_version_banner .get_full_version:visited {
        top: 60px;
    }

    .free_version_banner .description_text {
        margin-top: 40px;
    }
}
		</style>
	<div class="free_version_banner" <?php if( isset($_COOKIE['hgSliderFreeBannerShow']) && isset($_COOKIE['hgSliderFreeBannerShow']) == "no" ){ echo 'style="display:none"'; } ?> >
		<a class="close_free_banner">+</a>
		<img class="manual_icon" src="<?php echo $path_site2; ?>/icon-user-manual.png" alt="user manual" />
		<p class="usermanual_text">If you have any difficulties in using the options, Follow the link to <a href="http://huge-it.com/wordpress-video-gallery-user-manual/" target="_blank">User Manual</a></p>
		<a class="get_full_version" href="http://huge-it.com/wordpress-video-gallery/" target="_blank">GET THE FULL VERSION</a>
		<a href="http://huge-it.com" target="_blank"><img class="huge_it_logo" src="<?php echo $path_site2; ?>/Huge-It-logo.png"/></a>
		<div style="clear: both;"></div>
		<div class="hg_social_link_buttons">
			<a target="_blank" class="fb" href="https://twitter.com/HugeITcom"></a>
			<a target="_blank" class="twitter"  href="https://www.youtube.com/channel/UCueCH_ulkgQZhSuc0L5rS5Q"></a>
			<a target="_blank" class="gplus" href="https://www.facebook.com/hugeit/"></a>
			<a target="_blank" class="yt"  href="https://plus.google.com/111845940220835549549"></a>
		</div>
		<div class="hg_view_plugins_block">
			<a target="_blank"  href="https://wordpress.org/support/view/plugin-reviews/google-maps">Rate Us</a>
			<a target="_blank"  href="http://huge-it.com/wordpress-slider-demo-1-mixed-slider/">Full Demo</a>
			<a target="_blank"  href="http://huge-it.com/wordpress-slider-faq/">FAQ</a>
			<a target="_blank"  href="http://huge-it.com/contact-us/">Contact Us</a>
		</div>
		<div  class="description_text"><p>This is the LITE version of the plugin. Click "GET THE FULL VERSION" for more advanced options. We appreciate every customer.</p></div>
		<div style="clear: both;"></div>
	</div>
<script>
	jQuery(".close_free_banner").click(function(){
		jQuery(".free_version_banner").fadeOut();
		hgSliderSetCookie( 'hgSliderFreeBannerShow', 'no', {expires:3600} );
	});
	function hgSliderSetCookie(name, value, options) {
		options = options || {};
		var expires = options.expires;
		if (typeof expires == "number" && expires) {
			var d = new Date();
			d.setTime(d.getTime() + expires * 1000);
			expires = options.expires = d;
		}
		if (expires && expires.toUTCString) {
			options.expires = expires.toUTCString();
		}
		if(typeof value == "object"){
			value = JSON.stringify(value);
		}
		value = encodeURIComponent(value);
		var updatedCookie = name + "=" + value;
		for (var propName in options) {
			updatedCookie += "; " + propName;
			var propValue = options[propName];
			if (propValue !== true) {
				updatedCookie += "=" + propValue;
			}
		}
		document.cookie = updatedCookie;
	}
</script>
