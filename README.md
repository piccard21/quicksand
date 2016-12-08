# quicksand
Quicksand comes with 2 ready-to-use color-schemes, one with rounded, the other one with cornered boxes. Its responsive design is based on Bootstrap4, so your page will always look fine on any device.The theme is highly configurable, so you can easily adjust it to your needs by using the theme-options inside your customizer.  Choose between masonry- and normal-, fullwidth- or boxed-layout, none, one or two sidebars and there were also added better looking archive- & category-widgets.Quicksand also comes with a social icon integration, by using the fantastic Font Awesome image-library. You are able to apply Google-Fonts, galleries can be displayed by the stunning Lightgallery-plugin and if you feel to use a slider on your frontpage, no worries, Flexslider is integrated.  For the nerds of you, there are also sass- and grunt files included.


## Install
```
npm install
```
Afterwards trigger grunt


## Developing
### Concat JS & CSS in realtime
```
grunt watch
```
Your custom sass-files in the scss-folder will be compiled und copied to the css-folder. 

## Production
```
grunt build
```
Same like the watch-task, but a minified-versions will be created in css & js.
Changes also the links in index.html to the minified versions.

