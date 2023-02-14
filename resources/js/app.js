require('./bootstrap');

import './bootstrap';
import Alpine from 'alpinejs';
window.alpine=Alpine;
Alpine.start();
var channel = Echo.private('App.Models.User.${UserID}');
channel.notification( function(data) {
    console.log(data.body);
});