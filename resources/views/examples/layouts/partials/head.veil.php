<?php
/*
 * Partial: Head
 *
 * Places:
 *
 *   - head (optional)
 *
 * Uses:
 *
 *   - None
 *
 * Data:
 *
 *   - locale.current
 *   - page.title
 *
 */
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="{{locale.current}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{page.title}}</title>

    <link rel="icon" href="https://cdn1.onbayfront.com/bfm/brand/favicons/favicon-32x32.png">

    <link href="@route:storage/assets/css/app.css" rel="stylesheet">

    ?@place:head

</head>