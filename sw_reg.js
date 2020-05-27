window.addEventListener('load', () => {
    registerSW();
});
let installPromptEvent;

window.addEventListener('beforeinstallprompt', (event) => {
  // Prevent Chrome <= 67 from automatically showing the prompt
  event.preventDefault();
  // Stash the event so it can be triggered later.
  installPromptEvent = event;
  // Update the install UI to notify the user app can be installed
  document.querySelector('#install-button').disabled = false;
});

var btnInstall;
btnInstall.addEventListener('click', () => {
  // Update the install UI to remove the install button
  document.querySelector('#install-button').disabled = true;
  // Show the modal add to home screen dialog
  installPromptEvent.prompt();
  // Wait for the user to respond to the prompt
  installPromptEvent.userChoice.then((choice) => {
    if (choice.outcome === 'accepted') {
      console.log('User accepted the A2HS prompt');
    } else {
      console.log('User dismissed the A2HS prompt');
    }
    // Clear the saved prompt since it can't be used again
    installPromptEvent = null;
  });
});

window.addEventListener('appinstalled', (evt) => {
  console.log('تم تنصيب التطبيق');
});

//@media all and (display-mode: standalone) {
//  body {
//    background-color: yellow;
//  }
//}
if (window.matchMedia('(display-mode: standalone)').matches) {
  console.log('display-mode is standalone');
}
if (window.navigator.standalone === true) {
  console.log('display-mode is standalone');
}
async function registerSW() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/driver/sw.js', {
            scope: '/driver/'
        }).then(function (reg) {
            if (reg.installing) {
                console.log('Service worker installing');
            } else if (reg.waiting) {
                console.log('Service worker installed');
            } else if (reg.active) {
                console.log('Service worker active');
            }
        }).catch(function (error) {
            // registration failed
            console.log('Registration failed with  ' + error);
        });
    }
}