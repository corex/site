# Site

**_Versioning for this package follows http://semver.org/. Backwards compatibility might break on upgrade to major versions._**

The purpose of this package is to keep it simple and make it possible to quickly setup a site (html, template).
Setting up a site is easy and requires only few steps.


## Templates (Layout / View)
Layouts and views are based on package corex/template (mustache). Look at readme for package corex/template to see syntax.
- Standard template (standard.html) is based on Bootstrap and has 2 variables "title" and "body".
- It is possible to override templates by setting a new path and use the same name.
- A layout contains main template for a page. It is possible to override standard template by setting a new location for layout templates. It is also possible to specify a new template name.
- A view is a simple template i.e. the body.
- A view can be used inside a view. It is automatically rendered.


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
