<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <article>
        <h1><?=$post->title?></h1>

        <?php //dd($post)?>
        <?=$post->body?>
    </article>

    <a href="/">Go back</a>

</body>
</html>