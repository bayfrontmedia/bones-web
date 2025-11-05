import {getProp} from "@bayfrontmedia/skin/src/js/modules/utils/object-utils";

/**
 * Get config object key, or return value if not existing
 *
 * @param key
 * @param defaultValue
 * @returns {*}
 */
export function getConfig(key, defaultValue) {
    return getProp(appConfig, key, defaultValue);
}

let appConfig = {};

export function init(config) {

    appConfig = config;

    let selectLocale = document.getElementById('select-locale');

    selectLocale.addEventListener("change", () => {

        let locale = selectLocale.value;

        if (locale !== '') {
            window.location.href = '?locale=' + locale;
        }

    });

    if (getConfig('debug', false) === true) {
        console.log('✅ App initialized (v' + getConfig('version', '1.0') + ')');
    }

}

window.App = {
    init
}