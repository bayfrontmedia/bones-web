<?php
/*
 * Layout: Page
 *
 * Sections:
 *
 *   - content (required)
 *
 *   - head (optional)
 *   - end_body (optional)
 *
 * Predefined sections:
 *
 *   - examples/layouts/partials/head
 *   - examples/layouts/partials/header
 *   - examples/layouts/partials/footer
 *
 * $data array keys:
 *
 *   - locale.all
 *   - locale.current
 *   - page.title
 *   - page.description
 *   - year
 *
 */
?>
<!DOCTYPE html>
<html lang="{{locale.current}}">

@use:examples/layouts/partials/head

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">

<div id="content-wrap">

    @use:examples/layouts/partials/header

    <main id="main" class="container xl:max-w-screen-xl mx-auto rounded-md p-4 bg-white dark:bg-gray-800 shadow">

        <div class="text-center">

            @place:content

        </div>

    </main>

</div>

@use:examples/layouts/partials/footer

<script src="@route:storage/assets/js/app.js"></script>

<script>
    let version = '{{app.version}}';
    App.init(version);
</script>

?@place:end_body

</body>
</html>