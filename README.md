# Site

![License](https://img.shields.io/packagist/l/corex/site.svg)
![Build Status](https://travis-ci.org/corex/site.svg?branch=master)
![codecov](https://codecov.io/gh/corex/site/branch/master/graph/badge.svg)


The purpose of this package is to keep it simple and make it possible to quickly setup a site (html, template).
Setting up a site is easy and requires only few steps.


## Templates (Layout / View)
Layouts and views are based on package corex/template (mustache). Look at readme for package corex/template to see syntax.
- Standard template (standard.html) is a simple html template and is default.
- If bootstrap theme is specified, a bootstrap template (bootstrap-x.y.z.html) is used instead of simple html template.
- It is possible to set specific Bootstrap version by calling Bootstrap::setVersion(Bootstrap::VX_Y_Z);. If not specified, latest version is chosen.
- It is possible to override templates by setting a new path and use the same name.
- A layout contains main template for a page. It is possible to override standard template by setting a new location for layout templates. It is also possible to specify a new template name.
- A view is a simple template i.e. the body.
- A view can be used inside a view. It is automatically rendered.

Following variables are supported
- title - Ttle of page.
- body - Body og page.
- error - Error message placed on top of page.

Bootstrap versions supported: 4.3.1, 4.1.3


## Config
```php
// Set/add a path where to load layout templates from.
Config::setLayoutPath($path);

// Set/add a path where to load view templates from.
Config::setViewPath($path);

// Set theme for layout. Default is 'bootstrap'. See Theme::* for constants.
Config::setTheme(Theme::UNITED);
```


## Examples

### Theme "slate", inject view with some text into a layout.
```php
Config::setTheme(Theme::SLATE);
$view = View::load('test')->variable('message', 'Some text');
$layout = Layout::load()->variables([
    'body' => $view
]);
print($layout);
```
