<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title><?php bloginfo( 'name' ) ?></title>
	<?php wp_head(); ?>
</head>
<body>

<div class="ui inverted menu border-bottom">
    <div class="ui container">
        <a href="./index.html" class="header item">
            xeon :: kdb
        </a>
        <!--        <a href="#" class="item">Home</a>
				<a href="#" class="item">Add post</a>
				<a href="#" class="item">Contacts</a>
				<div class="ui simple dropdown item inverted">
					Account <i class="dropdown icon"></i>
					<div class="menu">
						<a class="item" href="#">Log in</a>
						<a class="item" href="#">Sign up</a>
						<div class="divider"></div>
						<div class="header">Recover</div>
						<a class="item" href="#">Username</a>
						<a class="item" href="#">Password</a>
					</div>
				</div>-->
        <div class="right menu">
            <div class="item">
                <div class="ui transparent inverted icon input">
                    <i class="search icon"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
        </div>
    </div>
</div>