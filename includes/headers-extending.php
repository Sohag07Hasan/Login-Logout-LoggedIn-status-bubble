<?php
/* It is for custom button add in headers*/
$add = '';

		$home = get_option('home');
		$login_url = wp_login_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);	
		
		$regi_url = $home.'/wp-login.php?action=register';
		$lost_pass = $home.'/wp-login.php?action=lostpassword';
			
		//getting login and log out button links			
		
		echo '<div class="main-login-logout">';		
		
			
			if(is_user_logged_in()){
				global $current_user;
				get_currentuserinfo();
				$username = $current_user->user_login;
				$userid = $current_user->ID;
				$avatar = get_avatar($userid,16);	
				
				
				$edit = $home.'/wp-admin/profile.php';
				$view = $home.'/author/'.$username;
				$logout_url = wp_logout_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
				
				$rank = cp_module_ranks_getRank($userid);				
				$points = cp_getPoints($userid) ;
				$rankpage = $home.'/cyberkarma/rankings/';
				
				
				$add = 
				"<div class='while-logged-in'>
				
					<div class='c-user-gravatar'> <a href='$view'> $avatar	</a></div>					
					<div class='c-user-name'><span style='font-size:12px !important;'>$username</span></div>
					
					<div class='c-user-logout-button'> 
						<a href='$logout_url' class='c-logout-rollover'>logout</a>
					 </div>
					 
					 <div style='clear:both'></div>
					 
					 <div class='c-profile'> profile:  </div>
					 <div class='c-view-edit'> 
						<a href='$view' >view</a>
						<span style='color:#FFFFFF'>/</span>
						<a href='$edit'>edit</a>
						<span style='color:#FFFFFF; text-align:center'>|</span>
					 </div>
					 
					 <div class='c-rank-points'>
						<a href='$rankpage'>$rank</a>
						<span style='color:#FFFFFF'>($points)</span>
					 </div>
					 <div style='clear:both'></div>
					 
					
				</div>";			
			}
			else{
				
				$add = 
				"<div class='if-user-not-loggedin'>
					<table width='220' cellspacing=3' cellpadding='0'>
						<tr>
						<td>
					<div class='if-user-not-loggedin-array'>
						<a class='show-details-bubble' href='#' > <span class='hide-down-arrow'>Register / Login &gt;</span></a>
					</div>
						</td>
						<td align='right' style='padding-top:8px; padding-left:5px;'>
						<a href='#' class='hide-down-arrow' ><img class='show-arrow-down' src='$arrow_down' /></a>
						</td>
						</tr>
					</table>
				</div>"
				.
				"<div class='login-barextending'>
					
				</div>"
				
				
				
				.
				"<div class='while-logged-out'>
					<table cellspacing='3' cellpadding='0' width='220' style='margin:0px 10px 10px 10px; font-size:11px;'>
						<tr>
							<td style='margin-bottom:-3px;'><b>Username</b></td>
							<td colspan='2' style='margin-bottom:-3px;'><b>Password</b></td>
						</tr>
						<tr>
							<form action='$login_url' method='post' >
							<td><input name='log' size='8'  /></td>
							<td><input type='password' name='pwd' size ='8' /></td>
							<td align='right'>
							<input type='image' src=\"$image2\" onMouseOver='this.src=\"$image1\"' onMouseOut='this.src=\"$image2\"' /></td>	
							</form>
						</tr>
						<tr>
							<td><a href='$regi_url' >Register &gt;</a></td>
							<td><a href='$lost_pass'>Forgot Password?</a></td>
							<td align='right'><a class='show-arrow-up-link' href='#'><img src='$arrow_up' /></a></td>
						</tr>
					</table>";
				 
			}
		
		echo $add;
		
		echo '</div></div>';
		
		
?>
