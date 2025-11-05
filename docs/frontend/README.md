# Frontend

The styles are built using [Tailwind CSS](https://tailwindcss.com/).
The Tailwind library [Skin](https://github.com/bayfrontmedia/skin) is included with this app.

JavaScript is built using [Webpack](https://webpack.js.org/).

## npm 

This app utilizes the following npm scripts:

- `npm run app:update` - Update dependencies
- `npm run watch:styles` - Watch styles
- `npm run build:styles` - Build styles (unminified)
- `npm run build:styles:prod` - Build styles (minified)
- `npm run watch:webpack` - Watch scripts (development mode)
- `npm run build:webpack` - Build scripts (unminified, development mode)
- `npm run build:webpack:prod` - Build scripts (minified, production mode)
- `npm run build:prod` - Update dependencies and build minified scripts and styles

## JavaScript

This app utilizes Webpack to bundle the JavaScript file(s).

### app.js

This is the default JavaScript file to be used with this app.

To initialize the app, use:

```html
<script>
    const version = '{{app.version}}';
    const debug = Boolean('{{app.debug||0}}');

    App.init({
        version: version,
        debug: debug
    });
</script>
```

This will enable changing the locale.