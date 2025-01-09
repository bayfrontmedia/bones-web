<?php
use Bayfront\BonesService\WebApp\Utilities\VeilData;
/*
 * Partial: Header
 *
 * Sections:
 *
 *   - None
 *
 * Predefined sections:
 *
 *   - None
 *
 * $data array keys:
 *
 *   - locale.all
 *   - locale.current
 *
 */
?>
<header class="container xl:max-w-screen-xl mx-auto p-4 tu-bg-content flex flex-row justify-between items-center h-full">

    <div>
        <img class="h-[40px]" src="https://cdn1.onbayfront.com/bfm/brand/bfm-logo.svg"
             alt="Bayfront Media"/>
    </div>

    <div class="flex items-center gap-x-2">

        <div>
            <button class="hidden dark:inline-flex justify-center items-center hover:tu-bg-default w-10 h-10 inline-flex justify-center items-center rounded-full cursor-pointer" data-theme-toggle="light">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path>
                </svg>
            </button>

            <button class="inline-flex dark:hidden justify-center items-center hover:tu-bg-default w-10 h-10 inline-flex justify-center items-center rounded-full cursor-pointer" data-theme-toggle="dark">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"></path>
                </svg>
            </button>
        </div>

        <div>
            <button type="button" class="text-sm tc-btn tc-style-default"
                    data-popper="popper-lang"
                    data-popper-placement="bottom-end"
                    data-popper-trigger="click"
                    data-popper-offset="0,10">@say:common.locale.{{locale.current}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="w-5 h-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </div>

    </div>

    <div id="popper-lang" class="xp-4 w-[225px] tc-popper tc-style-content tu-border-radius tu-border-width tu-box-shadow overflow-hidden"
         role="menu" tabindex="0">

        <ul class="text-sm">

            <?php

            $current_locale = VeilData::get('locale.current', '');

            foreach (VeilData::get('locale.valid', []) as $locale) {

                $class = '';

                if ($current_locale == $locale) {
                    $class = ' text-theme-primary tu-bg-default';
                }

                echo '<li><a href="?locale=' . $locale . '" title="@say:common.locale.' . $locale . '" class="flex items-center p-2 hover:text-theme-primary' . $class . '">@say:common.locale.' . $locale . '</a></li>';
            }

            ?>

        </ul>

    </div>

</header>