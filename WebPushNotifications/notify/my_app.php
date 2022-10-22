<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Shinerweb.come web push notification</title>
  </head>
  <body>
    <h2>
      Firebase Web Push Notification by
      <a href="https://shinerweb.com/">shinerweb.com</a>
    </h2>

    <p id="token"></p>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
    <script>
      var firebaseConfig = {
        apiKey: "AIzaSyDHXl4S1s-PBlU2uj_MXfmbUNGBGFxfr7I",
        authDomain: "web-push-notifications-1557a.firebaseapp.com",
        projectId: "web-push-notifications-1557a",
        storageBucket: "web-push-notifications-1557a.appspot.com",
        messagingSenderId: "327272552152",
        appId: "1:327272552152:web:d39f21b028448923f2e9ad",
        measurementId: "G-VL4JSYBM3T",
      };
      firebase.initializeApp(firebaseConfig);
      const messaging = firebase.messaging();

      function IntitalizeFireBaseMessaging() {
        messaging
          .requestPermission()
          .then(function () {
            console.log("Notification Permission");
            return messaging.getToken();
          })
          .then(function (token) {
            console.log("Token : " + token);
            document.getElementById("token").innerHTML = token;
          })
          .catch(function (reason) {
            console.log(reason);
          });
      }

      messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption = {
          body: payload.notification.body,
          icon: payload.notification.icon,
        };

        if (Notification.permission === "granted") {
          var notification = new Notification(
            payload.notification.title,
            notificationOption
          );

          notification.onclick = function (ev) {
            ev.preventDefault();
            window.open(payload.notification.click_action, "_blank");
            notification.close();
          };
        }
      });
      messaging.onTokenRefresh(function () {
        messaging
          .getToken()
          .then(function (newtoken) {
            console.log("New Token : " + newtoken);
          })
          .catch(function (reason) {
            console.log(reason);
            //alert(reason);
          });
      });
      IntitalizeFireBaseMessaging();
    </script>
  </body>
</html>
