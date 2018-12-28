
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('bootstrap-sass');

window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.Pusher = require('pusher-js');
import Echo from "laravel-echo";
window.Vue = require('vue');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '227bb60553d4fa6fefbe',
    cluster: 'ap3',
    encrypted: true
});

var notifications = [];

const NOTIFICATION_TYPES = {
    follow: 'App\\Notifications\\UserFollowed',
    newPost: 'App\\Notifications\\NewPost',
};

$(document).ready(function() {
    // check if there's logged in user
    if (Laravel.userId) {
        $.get('/notifications', function(data) {
            addNotifications(data, "#notifications");
        });

        window.Echo.private(`App.User.${Laravel.userId}`)
            .notification((notification) => {
                addNotifications([notification], '#notifications');
            });
    }
});

function addNotifications(newNotifications, target) {
    notifications = _.concat(notifications, newNotifications);
    // show only last 5 notifications
    notifications.slice(0, 5);
    showNotifications(notifications, target);
}

function showNotifications(notifications, target) {
    if (notifications.length) {
        var htmlElements = notifications.map(function (notification) {
            return makeNotification(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications')
    } else {
        $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
        $(target).removeClass('has-notifications');
    }
};

function makeNotification(notification) {
    var to = routeNotification(notification);
    var notificationText = makeNotificationText(notification);
    return '<li><a href=" ' + to + ' ">' + notificationText + '</a></li>';
}

function routeNotification(notification) {
    var to = `?read=${notification.id}`;
    if(notification.type === NOTIFICATION_TYPES.follow) {
        to = 'users' + to;
    } else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const postId = notification.data.post_id;
        to = `posts/${postId}` + to;
    }
    return '/' + to;
}

function makeNotificationText(notification) {
    var text = '';
    if(notification.type === NOTIFICATION_TYPES.follow) {
        const name = notification.data.follower_name;
        text += `<strong>${name}</strong> followed you`;
    } else if(notification.type === NOTIFICATION_TYPES.newPost) {
        const name = notification.data.following_name;
        text += `<strong>${name}</strong> published a post`;
    }
    return text;
}
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
