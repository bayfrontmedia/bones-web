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

<body class="tu-bg-default tu-text-default">

<div id="content-wrap">

    @use:examples/layouts/partials/header

    <main id="main" class="container xl:max-w-screen-xl mx-auto p-4 tu-bg-content">

        <div class="tu-typo text-center">

            @place:content

        </div>

    </main>

</div>

@use:examples/layouts/partials/footer

<script src="@route:storage/assets/js/app.js"></script>

?@place:end_body

</body>
</html>