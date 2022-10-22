<script>
    importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
    importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

    var firebaseConfig = {
        apiKey: "AIzaSyDHXl4S1s-PBlU2uj_MXfmbUNGBGFxfr7I",
        authDomain: "web-push-notifications-1557a.firebaseapp.com",
        projectId: "web-push-notifications-1557a",
        storageBucket: "web-push-notifications-1557a.appspot.com",
        messagingSenderId: "327272552152",
        appId: "1:327272552152:web:d39f21b028448923f2e9ad",
        measurementId: "G-VL4JSYBM3T"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    messaging.setBackgroundMessageHandler(function(payload) {
        console.log(payload);
        const notification = JSON.parse(payload);
        const notificationOption = {
            body: notification.body,
            icon: notification.icon
        };
        return self.registration.showNotification(payload.notification.title, notificationOption);
    });
</script>