<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="background-fixed background-cover background-center h-100vh w-100" style="background:url('/proj1/img/<?php echo h($article->thumbnail); ?>')">
        <div class="position-absolute w-100 h-100vh top-0 dark-background"> </div>
            <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                <div class="box-advant box-advant-post-single box-post position-absolute d-flex align-items-center bg-black justify-content-center">
                    <h2 class="unrotate-text px-lg-4 font-1-05 text-uppercase color-white text-center font-2-3">
                        B
                    </h2>
                </div>
                <div class="box-text-post position-absolute bg-black pl-5 py-3 py-lg-5 img-fluid">
                    <p class="color-white float-right pl-4r pr-3 w-90 font-05-05 text-right"><?php echo h($article->body); ?></p>

                    <p class="color-white float-right pl-4r pr-3 font-05-05"><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
                </div>
                </div>
            </div>
    </section>
    
    
</body>
</html>