<!DOCTYPE HTML>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="João Goya">
        <meta name="reply-to" content="contato@joaogoya.com.br">
        <meta name="generator" content="Vscode">
        <meta name="rating" content="general" />
        <!-- <link rel="stylesheet" type="text/css" media="all" href="<?php //bloginfo( 'stylesheet_url' ); ?>" /> -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_url'); ?>/css/main.css"> -->
        <link rel="icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png"> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
        <!-- <title>Pipeline Digital</title> -->
        <?php wp_head(); ?>
    </head>
        
    <body>
        <a href="#main" aria-label="Skip to content" id="skiplink">Skip to content</a>
        <nav class="navbar navbar-expand-lg navbar-dark rounded">
            <div class="container">
                <a class="navbar-brand" href="<?php bloginfo('home');?>">
                    Pipeline
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                        <?php 
                            $main_menu = get_custom_menu('main-menu');
                            foreach ($main_menu as $m) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#<?php echo sanitize_title($m['title']); ?>">
                                        <?php echo $m['title']; ?>
                                    </a>
                                </li>
                            <?php endforeach; 
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    <main>    