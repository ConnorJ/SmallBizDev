How to install `phonegap-googlemaps-plugin` for Ionic framework?
----
```bash
$> ionic start myApp tabs
$> cd myApp
$> ionic platform add ios android
$> cordova plugin add plugin.google.maps --variable API_KEY_FOR_ANDROID=<YOUR KEY> --variable API_KEY_FOR_IOS=<YOUR KEY>

$> vim www/templates/tab-dash.html 
```

```html
<ion-view title="Dashboard">
  <ion-content class="has-header padding">
    <h1>Dash</h1>
    <div style="width:90%;margin-left:10%;height:500px" id="map_canvas"></div>
  </ion-content>
</ion-view>
```

```bash
$> vim www/js/app.js
```
```js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
    var div = document.getElementById("map_canvas");
    var map = plugin.google.maps.Map.getMap(div);
  });
})
```

```bash
$> ionic run android
```
