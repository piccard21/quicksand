# Quicksand
Quicksand comes with 2 ready-to-use color-schemes, one with rounded, the other one with cornered boxes. Its responsive design is based on Bootstrap4, so your page will always look fine on any device.The theme is highly configurable, so you can easily adjust it to your needs by using the theme-options inside your customizer.  Choose between masonry- and normal-, fullwidth- or boxed-layout, none, one or two sidebars and there were also added two better looking archive- & category-widgets. Quicksand also comes with a social-icon-integration, by using the fantastic FontAwesome image-library. You are able to apply Google-Fonts, galleries can be displayed by the stunning Lightgallery-plugin and if you feel to use a slider on your frontpage, no worries, Flexslider is integrated.  For the nerds of you, there are also sass- and grunt files included.

## Release
###Change line-endings in lightgallery(.min).js via netbeans-plugin
Use the Line-Endings-plugin in Netbeans 'Show and change line-endings' 

#### Adjust line-endings in these files
- js/lightgallery/lightgallery.min.js
- js/lightgallery/lightgallery.js
- js/lightgallery/css/lg-fb-comment-box.css
- js/lg-thumbnail.min.js
- js/lg-thumbnail.js & 


### Copy the quicksan-folder to a new location

```
cp -R themes/quicksand /tmp
```
	
### Delete node_modules-folder
```
rm -Rf .node_modules
```

### Delete all hidden files
- .DS_Store
- .dS_Store
- .a.swp
- .netbeans.xml	

```
find . -iname '.*' -type f -delete
```

### Install node_modules again 
```
npm install
```
```

## Developing
### Trigger grunt 

```
grunt build
grunt
```  


- Your custom sass-files in the scss-folder will be compiled und copied to the css-folder
- Your JS-files will be copied & minified to quicsand/js

## Production
```
grunt build
```
Same like the watch-task, but a minified-versions will be created in css & js.
Changes also the links in index.html to the minified versions.

