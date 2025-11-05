<?php
/*
 * Layout: Page
 *
 * Places:
 *
 *  - content
 *  - end_body (optional)
 *
 * Uses:
 *
 *   - examples/layouts/partials/head
 *   - examples/layouts/partials/header
 *   - examples/layouts/partials/footer
 *
 * Data:
 *
 *   - app.version
 *   - webapp.locale.current
 *
 */


?>
<!DOCTYPE html>
<html lang="{{webapp.locale.current}}">

@use:examples/layouts/partials/head

<body class="tu-bg-default tu-text-default print:bg-white">

<div id="content-wrap">

    @use:examples/layouts/partials/header

    <main id="main" class="container xl:max-w-screen-xl mx-auto rounded-md p-4 shadow tu-bg-content">

        <div class="text-center">

            @place:content

        </div>

    </main>

</div>

@use:examples/layouts/partials/footer

<script src="@route:storage/assets/js/app.js?v={{app.cache_bust}}"></script>
<script src="@route:storage/assets/js/skin.js?v={{app.cache_bust}}"></script>

<script>

    const version = '{{app.version}}';
    const debug = Boolean('{{app.debug||0}}');

    App.init({
        version: version,
        debug: debug
    });

    document.addEventListener('DOMContentLoaded', () => {

        Skin.init({
            debug: debug,
            themeParam: {
                enabled: true,
                name: "theme"
            }
        });

    });

</script>

?@place:end_body

</body>
</html>