<!-- File: Template/Articles/index.ctp -->
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        
        <section class="background-fixed background-cover background-center background-blog h-100vh w-100">
            <div class="position-absolute w-100 h-100vh top-0 dark-background"> </div>
            <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                <h1 class="text-center text-uppercase color-white font-h1">B<span class="border-bottom">lo</span>g</h1>
            </div>
        </section>
        <div class="container-fluid"> 
            <div class="row mt-5">
              
                <!-- Here is where we iterate through our $articles query object, printing out article info -->

                <?php foreach ($articles as $article):?>
                <div class="col-md-6 mb-3">

                        <a href="./articles/view/<?php echo $article->slug; ?>">
                            <div class="box-advant box-post position-absolute d-flex align-items-center bg-black">
                                <h2 class="unrotate-text px-lg-4 font-1-05 text-uppercase color-white text-center">
                                    <?php echo mb_strimwidth($article->title, 0, 40, '...'); ?>
                                </h2>
                            </div>
                            <div class="box-text position-absolute bg-black pl-5 py-3 py-lg-5 img-fluid">
                                <p class="color-white float-right w-60 pl-4r pr-3 font-05-05"><?php echo mb_strimwidth($article->body, 0, 100, "..."); ?></p>
                            </div>
                        </a>
                        <?php //echo $article->created->format(DATE_RFC850);?>
                    
                        <?php 
                            if($article->thumbnail):
                                echo $this->Html->image($article->thumbnail, array('class'=>'img-height'));
                            endif;
                        ?>
                   
                    <?php //echo $this->Html->link('Edit', ['action' => 'edit', $article->slug]);?>
                    
                    <?php /*echo $this->Form->postLink(
                                    'Delete',
                                    ['action' => 'delete', $article->slug],
                                    ['confirm' => 'Are you sure?'])
                                    */
                                ?>
                    
                    </div>
                <?php endforeach; ?>
              
                </div>
                    </div>
        
        <script src="" async defer></script>
    </body>
</html>
